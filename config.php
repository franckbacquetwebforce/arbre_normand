<?php

$w_config = [
   	//information de connexion à la bdd
		'db_host' => '192.168.1.20',						//hôte (ip, domaine) de la bdd
    'db_user' => 'TeamFranck',							//nom d'utilisateur pour la bdd
    'db_pass' => 'Franck',								//mot de passe de la bdd
    'db_name' => 'arbre_normand',								//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'users',				//nom de la table contenant les infos des utilisateurs
	'security_id_property' => 'id',					//nom de la colonne pour la clef primaire
	'security_username_property' => 'username',		//nom de la colonne pour le "pseudo"
	'security_email_property' => 'email',			//nom de la colonne pour l'"email"
	'security_password_property' => 'password',		//nom de la colonne pour le "mot de passe"
	'security_role_property' => 'role',				//nom de la colonne pour le "role"
	'security_token_property' => 'token',     //nom de la colonne pour le "token"
	'security_login_route_name' => 'login',			//nom de la route affichant le formulaire de connexion
	'url_base' => 'http://localhost',    // base de l'url du site

	// configuration globale
	'site_name'	=> '', 								// contiendra le nom du site
  'tva' => 0.2,
];

require('routes.php');
