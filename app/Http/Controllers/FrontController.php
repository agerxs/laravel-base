<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Domain;
use App\Http\Helpers\CinetPayHelper;
use App\Http\Helpers\Constants;
use App\Http\Helpers\DomainHelper;
use App\Package;
use App\Payment;
use Illuminate\Http\Request;
use CinetPay\CinetPay;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    private $link;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->link = mysqli_connect("localhost", "root", "", "africaweb", "3308");
    }


    public function index()
    {
        return view('welcome');
    }

    public function hebergement()
    {
        return view('hebergement');
    }

    public function resultatDomain(Request $request)
    {
        $pack=null;
        if(isset($request->pack))
        {
            $pack=$request->pack;
        }
        $fulldomaine = $request->domaine;

        $domaine = str_replace("www.", "", $fulldomaine);

        $extension = strstr($domaine, '.');
        $racine_domaine = str_replace($extension, "", $domaine);

        $extension = urlencode($extension);
        $racine_domaine = urlencode($racine_domaine);

        $date = date('Y-m-d H:i:s');
        
        mysqli_query($this->link, "INSERT INTO `search_log` (`ref_search_log`, `item_search_log`, `created_search_log`) 
        VALUES (NULL, '$fulldomaine', '$date');
        ");
        $status_domaine = DomainHelper::statut_domaine($racine_domaine, $extension);
        //statut_domaine($racine_domaine,$extension) == "AVAILABLE";

        return view('resultat_domain')
            ->with('fulldomaine', $fulldomaine)
            ->with('domaine', $domaine)
            ->with('statut_domaine', $status_domaine)
            ->with('racine_domaine', $racine_domaine)
            ->with('extension', $extension)
            ->with('pack', $pack);
    }

    public function resultatDomainExtension(Request $request)
    {
        $pack=null;
        if(isset($request->pack))
        {
            $pack=$request->pack;
        }
        $fulldomaine = $request->domaine.$request->tld;
       

        $domaine = str_replace("www.", "", $fulldomaine);

        $extension = strstr($domaine, '.');
        $extension = $request->tld;
        $racine_domaine = str_replace($extension, "", $domaine);

        $extension = urlencode($extension);
        $racine_domaine = urlencode($racine_domaine);

        $date = date('Y-m-d H:i:s');
        
        mysqli_query($this->link, "INSERT INTO `search_log` (`ref_search_log`, `item_search_log`, `created_search_log`) 
        VALUES (NULL, '$fulldomaine', '$date');
        ");
        
        $status_domaine = DomainHelper::statut_domaine($racine_domaine, $extension);
        //statut_domaine($racine_domaine,$extension) == "AVAILABLE";

        return view('resultat_domain')
            ->with('fulldomaine', $fulldomaine)
            ->with('domaine', $domaine)
            ->with('statut_domaine', $status_domaine)
            ->with('racine_domaine', $racine_domaine)
            ->with('extension', $extension)
            ->with('pack', $pack);
    }

    public function tarifs()
    {
        $result = mysqli_query(
            $this->link,
            "SELECT `ref_tld`,`extension_tld`,`prixAchatEuro_tld`,`prixAchatCfa_tld`,(`prixVente_tld`*1) 
            AS `prixVente_tld`,`tld_populaire` 
            FROM `tld` 
            ORDER BY `extension_tld` ASC,  tld_populaire desc"
        );
        $results = $result->fetch_all(MYSQLI_ASSOC);
        //dd($results);
        return view('tarifs')->with('results', $results);
    }

    public function connect()
    {
        return mysqli_connect("localhost", "root", "", "africaweb", "3308");
    }

    public function enregistrement()
    {
        //`ref_tld`,`extension_tld`,`prixAchatEuro_tld`,`prixAchatCfa_tld`,(`prixVente_tld`*1) AS `prixVente_tld`,`tld_populaire`
        $tld = DB::table('tld')
            ->select([
                'extension_tld',
                'ref_tld',
                'prixAchatEuro_tld',
                'prixAchatCfa_tld',
                'prixVente_tld AS prixVente_tld',
                'tld_populaire'
            ])
            ->where('tld_populaire', 'oui')
            ->orderBy('extension_tld')
            ->get();

        return view('enregistrement')->with('tlds', $tld);
    }

    public function enregistrementByExtension(Request $request)
    {
        //`ref_tld`,`extension_tld`,`prixAchatEuro_tld`,`prixAchatCfa_tld`,(`prixVente_tld`*1) AS `prixVente_tld`,`tld_populaire`
        $tld = DB::table('tld')
            ->select([
                'extension_tld',
                'ref_tld',
                'prixAchatEuro_tld',
                'prixAchatCfa_tld',
                'prixVente_tld AS prixVente_tld',
                'tld_populaire'
            ])
            ->where('extension_tld', $request->tld)
            ->orderBy('extension_tld')
            ->get();
                
        return view('enregistrementbyextension',['tlds'=>$tld, 'pack'=>$request->pack]);
    }

    public function choix_formule(Request $request)
    {
        if($request->pack){
            return view('recap_formule', ['formule'=>$request->pack]);
        }
        return view('choix_formule');
    }

    public function dns(Request $request)
    {
        
        return view('dns', ['domaine'=>$request->domaine]);
    }

    public function recap_formule()
    {
        return view('recap_formule');
    }

    public function paiement(Request $request)
    {
        $package_id=null;
        $package_duration=12;
        //dd($request->prix_domain);
        $package_amount=0;
        $prix = $request->duree;
        if(isset($prix) && $prix!=null)
        {
        $package = Package::where('name', $prix)->first();
        //dd($package);
        $package_id=$package->id;
    
        
        $package_duration=$package->duration;

        $package_amount+=$package->total_amount;
        //dd($package->amount);
        if(strpos($prix,'starter')){
            //dd('lk');
            $package_amount+=($request->prix_domain*($package->duration/12));
            $package_duration=$package->duration;
        }
    }
    else{
        $package_amount+=$request->prix_domain;
    }
        //Génération d'un ID de transaction
        $trans_id = CinetPay::generateTransId();
        $date = new \DateTime();
        //dd($request->dns1);
        $domain = Domain::create([
            'name' => $request->domain,
            'status' => 0,
            'dns1'=>$request->dns1,
            'dns2'=>$request->dns2,
            'dns3'=>$request->dns3,
            'dns4'=>$request->dns4,
            'package_id' => $package_id,   
            'user_id' => Auth::user()->id,
            'expires_at'=>date_add($date,date_interval_create_from_date_string($package_duration.' months'))
        ]);
        //dd($domain);
        $payment=Payment::create([
            'transaction_id' => $trans_id,
            'amount' => $package_amount,
            'status' => 0,
            'domain_id' => $domain->id,
            'domain' => $domain->name,
            'user_id' => Auth::user()->id,
        ]);

        session(['domain'=>$domain]);
        session(['payment'=>$payment]);
//dd($package_amount);
        $cp = CinetPayHelper::paiementForm($package_amount, Auth::user()->email, $trans_id);

        return view('paiement')->with('cp', $cp);
    }

    //Url d'annulation
    public function cancelPayment(Request $request)
    {
        $notification='<div class="alert alert-danger" role="alert">Votre paiement a été annulé</div>';

                if ($request->session()->has('domain')) {
                    //$notification= CinetPayHelper::notifIPN(session('payment')->transaction_id);
                    $domain=session('domain');
                    Domain::destroy($domain->id);
                    Payment::destroy(session('payment')->id);
                }
        
        session()->forget('domain');
        session()->forget('payment');
        return view('validation', ['notification'=>$notification]);
    }

    public function prepostNotifyPayment()
    {
        return redirect()->route('back_paiement');
    }
    //Url de retour
    public function postNotifyPayment()
    {
        $notification='<div class="alert alert-success" role="alert">
        Votre paiement a été enregistré avec succès
        </div>';
            session()->flash('status', 'Retour!');
            //$domain=session('domain');
            //Domain::destroy($domain->id);
        $domain=session('domain');
            $notification= CinetPayHelper::notifIPN(session('payment')->transaction_id);
                    $demand=Demande::create([
                        'user_id'=> Auth::user()->id,
                        'domain_id'=>$domain,
                        'status'=>Constants::STATUS_IS_CREATING,
                        'type'=>Constants::DEMANDE_CREATION_DOMAINE
                    ]);
        session()->forget('domain');
        
        return view('validation', ['notification'=>$notification]);
    }





}
