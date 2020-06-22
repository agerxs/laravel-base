<?php

namespace App\Http\Helpers;

class DomainHelper 
{
    public function connect()
    {
        return mysqli_connect("localhost", "root", "","africaweb", "3308");
    }

    public function reponse($str)
    {
    $long=strlen($str);
    $pos_dep=strpos($str,":");
    $pos_fin=strrpos($str,"Execution");
    $taille_rep=$long-$pos_dep-$pos_fin;

    $long_rep = $pos_fin-4-$pos_dep-2;
    $reponse  = substr($str,$pos_dep+2,$long_rep);

    return $reponse;
    }

    static function statut_domaine($domaine,$ext)
    {
        $fulldomaine=$domaine.$ext;
        $len=strlen($fulldomaine);
        $domainecheck=file_get_contents("https://www.francedns.com/bin/das-web.php?login=SD61&password=5htv1yntnt43fgu&domain=".$fulldomaine); 


        $long=strlen($domainecheck);
        $pos_dep=strpos($domainecheck,":");
        $pos_fin=strrpos($domainecheck,"Execution");
        $taille_rep=$long-$pos_dep-$pos_fin;

        $long_rep=$pos_fin-4-$pos_dep-3;
        $reponse=substr($domainecheck,$pos_dep+2,$long_rep);
        //$statutdomaine= reponse($domainecheck); 
        return $reponse;
    }


    public function prix_domaine($ext)
    {
        $link=$this->connect();
    $resultat = mysqli_query($link, "SELECT `prixVente_tld` FROM `tld` where `extension_tld`='$ext'");
    while($tld = mysqli_fetch_array($resultat))
    {   
        $prix=$tld['prixVente_tld'];
    }
    return $prix;
    }
}
