<?php


namespace App\Http\Helpers;


class Constants
{
    public const STATUS_ACTIVE='status_active';
    public const STATUS_CREATED='status_created';
    public const STATUS_IS_CREATING='status_is_creating';
    public const STATUS_EXPIRED='status_expired';
    public const STATUS_GRACE='status_grace';
    public const STATUS_LOST='status_lost';

    PUBLIC const DEMANDE_CREATION_DOMAINE='create_domaine';
    PUBLIC const DEMANDE_CREATION_HEBERGEMENT='create_hebergement';
    PUBLIC const DEMANDE_CREATION_CERTIFICAT_SSL='create_certificat_ssl';
    PUBLIC const DEMANDE_MODIFICATION_DNS='modification_dns';
    PUBLIC const DEMANDE_VERROUILLAGE_DOMAINE='verrouillage_domaine';
    PUBLIC const DEMANDE_RENOUVELLEMENT='renouvellement';
    PUBLIC const DEMANDE_TRANSFERT_DOMAINE='transfert_domaine';

    public const VALEURS=[
      self::DEMANDE_CREATION_DOMAINE=>'Création de domaine',
      self::DEMANDE_VERROUILLAGE_DOMAINE=>'Vérrouillage de domaine',
      self::DEMANDE_CREATION_HEBERGEMENT=>'Création hébergement',
      self::DEMANDE_CREATION_CERTIFICAT_SSL=>'Certificat SSL',
      self::DEMANDE_MODIFICATION_DNS=>'Modification DNS',
      self::DEMANDE_RENOUVELLEMENT=>'Renouvellement de domaines',
      self::DEMANDE_TRANSFERT_DOMAINE=>'Transfert de domaines',
      self::STATUS_IS_CREATING=>'En cours de création',
      self::STATUS_CREATED=>'Créé',
      self::STATUS_ACTIVE=>'Actif',
      self::STATUS_EXPIRED=>'Expiré',
      self::STATUS_GRACE=>'En période de grâce',
      self::STATUS_LOST=>'Perdu',

    ];
}
