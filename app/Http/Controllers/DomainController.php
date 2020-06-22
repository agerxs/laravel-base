<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Http\Helpers\AuthHelper;
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
        $user=Auth::user();
        $role=$user->role->id;
        if(2==$role)
        {
        $domains=Domain::all();
        
    }else {
        $domains = Auth::user()->domains()->get();
    }
        //dd($domains);
        return view('dashboard.domain.index',['domains'=>$domains, 'user'=>$user, 'is_admin'=>AuthHelper::isAdmin($user)]);
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
        return view('dashboard.domain.edit', ['domain'=>Domain::findOrFail($id)]);
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
            $domain->expires_at= date_add(new DateTime(),date_interval_create_from_date_string($domain->package->duration.' months'));
        }
        $domain->save();
        Session::flash('message', 'Domaine '.$domain->name.' modifié avec succès!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('dashboard');
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
