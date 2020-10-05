<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Domain;
use App\DomainTransfert;
use App\Http\Helpers\AuthHelper;
use App\Http\Helpers\Constants;
use App\Payment;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thedomains=[];
        $user=Auth::user();
        $role=$user->role->id;
        if(2==$role)
        {
        $domains=Domain::all();        
    }else {
        
        $domains = Domain::where('user_id', Auth::user()->id)
        ->get();
        
        //dd($domains);
    }

    foreach ($domains as $domain)
        {
            if(Payment::where('domain_id',$domain->id)
            ->where('status',1)
            ->first() !=null)
            {
                //dd('right');
                $thedomains[]=$domain;
            }
        }
        //dd($domains);
        return view('dashboard.domain.index',['domains'=>$thedomains, 'user'=>$user, 'is_admin'=>AuthHelper::isAdmin($user)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.domain.edit', [
            'domain'=>Domain::findOrFail($id),
            'transfert'=>DomainTransfert::where('domain_id',$id)->first(),
            'is_admin'=>AuthHelper::isAdmin(Auth::user())
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $domain=Domain::find($id);
        //dd($request->boolean('status'));
        $domain->status=$request->boolean('status');
        if($domain->isDirty('status') && $domain->status==1)
        {
            if($domain->package_id==null)
            {
                $duration=12;
            }
            else $duration=$domain->package->duration;
            $domain->expires_at= date_add(new DateTime(),date_interval_create_from_date_string($duration.' months'));
        }
        $domain->update($request->all());
        $domain->save();
        Session::flash('message', 'Domaine '.$domain->name.' modifié avec succès!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('dashboard');
    }

    public function updateState(Request $request)
    {
        Session::flash('message', 'Aucune action effectuée. Veuillez reessayer svp!'); 
        Session::flash('alert-class', 'alert-success');
        $id=$request->domain_id;
        //dd($request->all());
        $domain=Domain::find($id);
        
       // dd($request->all());
        if($request->has('ask_code')){
            //dd("homme");
            $transfert=DomainTransfert::where('domain_id',$id)->get();
            if($transfert->isEmpty()){
                
            $demande=Demande::create([
                'domain_id'=>$id,
                'status'=>Constants::STATUS_IS_CREATING,
                'type'=>Constants::DEMANDE_TRANSFERT_DOMAINE
            ]); 
            Session::flash('message', 'Demande de code de transfert effectuée avec succès!'); 
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Une demande de code de transfert a déja été initialisée pour ce domaine!'); 
            Session::flash('alert-class', 'alert-warning');
             return redirect()->route('domains.edit', ['domain'=>$domain]);
            }

        }
        else if($request->has('lock_domain'))
        {
            $domain->verrou=$request->lock_domain;
            $domain->save();
            Session::flash('message', 'Domaine modifié avec succès!'); 
            Session::flash('alert-class', 'alert-success');

            $demande=Demande::create([
                'domain_id'=>$id,
                'status'=>Constants::STATUS_IS_CREATING,
                'type'=>Constants::DEMANDE_VERROUILLAGE_DOMAINE
            ]);
        }
        else if($request->has('renew'))
        {
            $domain->renewable=$request->renew;
            $domain->save();
            Session::flash('message', 'Renouvellement automatique activé/désactivé avec succès!'); 
            Session::flash('alert-class', 'alert-success');
            $demande=Demande::create([
                'domain_id'=>$id,
                'status'=>Constants::STATUS_IS_CREATING,
                'type'=>Constants::DEMANDE_RENOUVELLEMENT
            ]);
        }
        
        
        return redirect()->route('domains.edit', ['domain'=>$domain]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
