<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Domain;
use App\Http\Helpers\Constants;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DemandeController extends Controller
{
    public function index($type)
    {

        if ($type != 'me') {
            $demandes = Demande::where('type', $type)->get();
        } else $demandes = Demande::where('user_id', Auth::user()->id)->get();

        //dd($demandes);
        return view('dashboard.demand.index')->with(['demandes' => $demandes, 'type' => $type]);
    }

    public function edit($id)
    {
        return view('dashboard.demand.edit', [
            'demande' => Demande::findOrFail($id),
        ]);
    }

    public function update(Request $request)
    {

        $domain = Demande::find($request->input('id'));
        //dd($request->boolean('status'));
        $domain->status = $request->input('status');
        $domain->update($request->all());
        $domain->save();
        Session::flash('message', 'Demande modifiée avec succès!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('dashboard');
    }

    public function new()
    {
        $domains=Domain::where('user_id',Auth::user()->id)->get();
       // dd($domains);
        return view('dashboard.demand.new')->with(['domains'=>$domains]);
    }

    public function create(Request $request)
    {
        $demande = new Demande();
        //dd($request->boolean('status'));
        $demande->type = $request->input('type');
        $demande->status = Constants::STATUS_IS_CREATING;
        $demande->user_id=Auth::user()->id;
        $demande->domain_id=$request->input('domaine');
        $demande->save();
        Session::flash('message', 'Demande modifiée avec succès!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('dashboard');
    }

}
