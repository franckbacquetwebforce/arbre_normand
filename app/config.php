<?php

$w_config = [
   	//information de connexion à la bdd
	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
    'db_user' => 'root',							//nom d'utilisateur pour la bdd
<<<<<<< HEAD
    'db_pass' => '',								//mot de passe de la bdd
=======
    'db_pass' => 'aoss2XdNtxKQ7bXXpJZ674v3LZcbcWea',								//mot de passe de la bdd
>>>>>>> a132769d412ee563294c899ce92f9b3bf7d2382e
    'db_name' => 'arbre_normand',								//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'users',				//nom de la table contenant les infos des utilisateurs
	'security_id_property' => 'id',					//nom de la colonne pour la clef primaire
	'security_username_property' => 'username',		//nom de la colonne pour le "pseudo"
	'security_email_property' => 'email',			//nom de la colonne pour l'"email"
	'security_password_property' => 'password',		//nom de la colonne pour le "mot de passe"
	'security_role_property' => 'role',				//nom de la colonne pour le "role"

	'security_login_route_name' => 'login',			//nom de la route affichant le formulaire de connexion

	// configuration globale
	'site_name'	=> '', 								// contiendra le nom du site
  'tva' => 0.2,
];

require('routes.php');
