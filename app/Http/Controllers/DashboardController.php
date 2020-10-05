<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Http\Helpers\AuthHelper;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(AuthHelper::isAdmin(Auth::user()))
        {
            $nbDomains=Domain::count();
            $nbDomains_wait=Domain::where('status', 0)->count();
            $payments=Payment::where('status', 1)->sum('amount');
        return view('dashboard.index', [
            'nbdomains'=>$nbDomains,
            'nbdomains_wait'=>$nbDomains_wait,
            'payments_sum'=>$payments,
            'is_admin'=>AuthHelper::isAdmin(Auth::user())]);   
    }
    else return redirect()->route('domains.index');
    }


}
