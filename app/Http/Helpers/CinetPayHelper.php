<?php

namespace App\Http\Helpers;

use App\Payment;
use CinetPay\CinetPay;

class CinetPayHelper
{


    static function paiementForm($prix, $user, $trans_id)
    {
        $cinetpay_apikey = "109829211056ba119cb91885.44904578";
        $cinetpay_site_id = "112820";
        //dd('one');
        /*
 * Preparation des elements constituant le panier
 */
        $apiKey = $cinetpay_apikey; // Remplacez ce champs par votre APIKEY
        $site_id = $cinetpay_site_id; // Remplacez ce champs par votre SiteID
        $id_transaction = $trans_id; // Identifiant du Paiement
        $description_du_paiement = sprintf('Hébergement AfricaWeb %s', $id_transaction); // Description du Payment
        $date_transaction = date("Y-m-d H:i:s"); // Date Paiement dans votre système
        $montant_a_payer = $prix; // Montant à Payer : minimun est de 100 francs sur CinetPay
        //$montant_a_payer = mt_rand(100, 200); // Montant à Payer : minimun est de 100 francs sur CinetPay
        $identifiant_du_payeur = $user; // Mettez ici une information qui vous permettra d'identifier de façon unique le payeur
        $formName = "Paiement CinetPay"; // nom du formulaire CinetPay
        $notify_url = 'https://africaweb/paiement/notify'; // Lien de notification CallBack CinetPay (IPN Link)
        $return_url = 'https://africaweb/paiement/back'; // Lien de retour CallBack CinetPay
        $cancel_url = 'https://africaweb.ci/paiement/cancel'; // Lien d'annulation CinetPay
        // Configuration du bouton
        $btnType = 4; //1-5xwxxw
        $btnSize = 'large'; // 'small' pour reduire la taille du bouton, 'large' pour une taille moyenne ou 'larger' pour  une taille plus grande

        // Paramétrage du panier CinetPay et affichage du formulaire
        $cp = new CinetPay($site_id, $apiKey);
        try {
            return $cp->setTransId($id_transaction)
                ->setDesignation($description_du_paiement)
                ->setTransDate($date_transaction)
                ->setAmount($montant_a_payer)
                ->setDebug(false) // Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
                ->setCustom($identifiant_du_payeur) // optional
                ->setNotifyUrl($notify_url) // optional
                ->setReturnUrl($return_url) // optional
                ->setCancelUrl($cancel_url) // optional
            ;
            //->displayPayButton($formName, $btnType, $btnSize);
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    static function notifIPN($value)
    {
        $id_transaction = $value;
        if (!empty($id_transaction)) {
            try {
                $apiKey = "109829211056ba119cb91885.44904578"; //Veuillez entrer votre apiKey
                $site_id = "112820"; //Veuillez entrer votre siteId

                $cp = new CinetPay($site_id, $apiKey);

                // Reprise exacte des bonnes données chez CinetPay
                $cp->setTransId($id_transaction)->getPayStatus();
                $paymentData = [
                    "cpm_site_id" => $cp->_cpm_site_id,
                    "signature" => $cp->_signature,
                    "amount" => $cp->_cpm_amount,
                    "transaction_id" => $cp->_cpm_trans_id,
                    "cpm_custom" => $cp->_cpm_custom,
                    "cpm_currency" => $cp->_cpm_currency,
                    "cpm_payid" => $cp->_cpm_payid,
                    "cpm_payment_date" => $cp->_cpm_payment_date,
                    "cpm_payment_time" => $cp->_cpm_payment_time,
                    "cpm_error_message" => $cp->_cpm_error_message,
                    "payment_method" => $cp->_payment_method,
                    "cpm_phone_prefixe" => $cp->_cpm_phone_prefixe,
                    "cel_phone_num" => $cp->_cel_phone_num,
                    "cpm_ipn_ack" => $cp->_cpm_ipn_ack,
                    "created_at" => $cp->_created_at,
                    "updated_at" => $cp->_updated_at,
                    "cpm_result" => $cp->_cpm_result,
                    "cpm_trans_status" => $cp->_cpm_trans_status,
                    "cpm_designation" => $cp->_cpm_designation,
                    "buyer_name" => $cp->_buyer_name,
                    "status" => $cp->isValidPayment()
                ];

                Payment::where('transaction_id', $id_transaction)
                    ->update($paymentData);
                // Recuperation de la ligne de la transaction dans votre base de données

                // Verification de l'etat du traitement de la commande

                // Si le paiement est bon alors ne traitez plus cette transaction : die();

                // On verifie que le montant payé chez CinetPay correspond à notre montant en base de données pour cette transaction

                // On verifie que le paiement est valide
                if ($cp->isValidPayment()) {
                    return 'Felicitation, votre paiement a été effectué avec succès';
                    //die();
                } else {
                    return 'Echec, votre paiement a échoué pour cause : ' . $cp->_cpm_error_message;
                    //die();
                }
            } catch (Exception $e) {
                // Une erreur s'est produite
                return "Erreur :" . $e->getMessage();
            }
        } else {
            // redirection vers la page d'accueil
            return 'bad';
            //die();
        }
    }
}
