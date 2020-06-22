<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Http\Helpers\CinetPayHelper;
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
        $link = mysqli_connect("localhost", "root", "", "africaweb", "3308");
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
        $fulldomaine = $request->domaine;

        $domaine = str_replace("www.", "", $fulldomaine);

        $extension = strstr($domaine, '.');
        $racine_domaine = str_replace($extension, "", $domaine);

        $extension = urlencode($extension);
        $racine_domaine = urlencode($racine_domaine);

        $date = date('Y-m-d H:i:s');
        //TODO : Traiter cette requête
        //mysqli_query($this->link, "INSERT INTO `africawe_hostmngr`.`search_log` (`ref_search_log`, `item_search_log`, `created_search_log`) 
        //VALUES (NULL, '$fulldomaine', '$date');
        //");
        $status_domaine = DomainHelper::statut_domaine($racine_domaine, $extension);
        //statut_domaine($racine_domaine,$extension) == "AVAILABLE";

        return view('resultat_domain')
            ->with('fulldomaine', $fulldomaine)
            ->with('domaine', $domaine)
            ->with('statut_domaine', $status_domaine)
            ->with('racine_domaine', $racine_domaine)
            ->with('extension', $extension);
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

    public function choix_formule()
    {
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

        $prix = $request->duree;
        $package = Package::where('name', $prix)->first();

        //Génération d'un ID de transaction
        $trans_id = CinetPay::generateTransId();
        $date = new DateTime();
        $domain = Domain::create([
            'name' => $request->domain,
            'status' => 0,
            'package_id' => $package->id,   
            'user_id' => Auth::user()->id,
            'expires_at'=>date_add($date,date_interval_create_from_date_string($package->duration.' months'))
        ]);
        $payment=Payment::create([
            'transaction_id' => $trans_id,
            'amount' => $package->total_amount,
            'status' => 0,
            'domain_id' => $domain->id,
            'domain' => $domain->name,
            'user_id' => Auth::user()->id,
        ]);
        session(['domain'=>$domain]);
        session(['payment'=>$payment]);

        $cp = CinetPayHelper::paiementForm($package->total_amount, Auth::user()->email, $trans_id);

        return view('paiement')->with('cp', $cp);
    }

    //Url de notification
    public function notifCinetPay(Request $request){
        $postdatas=$request->all();
        dd($postdatas['cpm_trans_id']);
        $notification= CinetPayHelper::notifIPN($postdatas['cpm_trans_id']);
        session()->flash('notification', $notification);
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

    //Url de retour
    public function postNotifyPayment()
    {
        $notification='<div class="alert alert-success" role="alert">
        Votre paiement a été enregistré avec succès
        </div>';
            session()->flash('status', 'Retour!');
            //$domain=session('domain');
            //Domain::destroy($domain->id);
            //$notification= CinetPayHelper::notifIPN(session('payment')->transaction_id);
                    
        session()->forget('domain');
        session()->forget('payment');
        return view('validation', ['notification'=>$notification]);
    }
}
