<?php
	$w_routes = array(
		// Default
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/conditions_generales_utilisation', 'User#cgu', 'cgu'],
		//hermelen routes
//======================================= ADMIN =====================================
		// Admin Products

		['GET', '/admin/product', 'ProductAdmin#index', 'admin_product'],
		['GET', '/admin/product/new', 'ProductAdmin#addNew', 'admin_product_new'],
		['POST', '/admin/product/new', 'ProductAdmin#addNewAction', 'admin_product_new_action'],
		['GET', '/admin/product/update/[i:id]', 'ProductAdmin#update', 'admin_product_update'],
		['POST', '/admin/product/update/[i:id]', 'ProductAdmin#updateAction', 'admin_product_update_action'],
		['GET', '/admin/product/delete/[i:id]', 'ProductAdmin#deleteAction', 'admin_product_delete_action'],
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Admin Order
		// Route pour afficher la liste des commandes dans le back-office
		['GET', '/admin/order/list', 'OrderAdmin#index', 'admin_order'],
		// Route permettant d'afficher les informations d'une commande en particulier dans le back-office
		['GET', '/admin/order/single/[i:id]', 'OrderAdmin#single', 'order_single'],

		// ['GET', '/admin/order/waiting', 'OrderAdmin#validatingOrders', 'waiting_orders'],
		// ['GET', '/admin/order/valid', 'OrderAdmin#validOrders', 'valid_orders'],

		// ['GET', '/admin/order/new', 'OrderAdmin#addNew', 'admin_order_new'],
		// ['POST', '/admin/order/new', 'OrderAdmin#addNewAction', 'admin_order_new_action'],

		// Route permettant de valider une commande en back-office
		['GET|POST', '/admin/order/update/[i:id]', 'OrderAdmin#updateAction', 'admin_order_update_action'],
		// Route permettant de supprimer une commande en back-office
		['GET|POST', '/admin/order/delete/[i:id]', 'OrderAdmin#deleteAction', 'admin_order_delete_action'],
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Admin User
		// Route permettant d'afficher
		['GET', '/admin/user', 'UserAdmin#index', 'admin_user'],
		// Route affichant le dashboard dans lequel se trouve plusieurs statistiques
		['GET', '/admin/dashboard', 'UserAdmin#statistics', 'site_statistics'],
		// Route menant au formulaire permettant de créer un nouvel admin
		['GET', '/admin/user/new', 'UserAdmin#addNew', 'admin_user_new'],
		// Route traitant le formulaire d'ajout d'un admin
		['POST', '/admin/user/new', 'UserAdmin#addNewAction', 'admin_user_new_action'],
		// Route permettant de passer un utilisateur en admin et inversement
		['GET|POST', '/admin/user/update_status/[i:id]', 'UserAdmin#updateStatus', 'admin_user_status_update'],

		// ['GET', '/admin/user/update/[i:id]', 'UserAdmin#update', 'admin_user_update'],
		// ['POST', '/admin/user/update/[i:id]', 'UserAdmin#updateAction', 'admin_user_update_action'],

		// Route permettant de supprimer un utilisateur
		['GET', '/admin/user/delete/[i:id]', 'UserAdmin#deleteAction', 'admin_user_delete_action'],

		///////////////////////////////////////////////////////////////////////////////////////////////////
		// Admin Categories
		// Route permettant d'afficher la liste des catégories en back-office
		['GET', '/admin/categories', 'CategoriesAdmin#index', 'admin_categories'],
		// Route affichant le formulaire pour ajouter une catégorie
		['GET', '/admin/categories/new', 'CategoriesAdmin#addNew', 'admin_categories_new'],
		// Route permettant de traiter le formulaire d'ajout d'une catégorie
		['POST', '/admin/categories/new', 'CategoriesAdmin#addNewAction', 'admin_categories_new_action'],
		// Route affichant le formulaire de modification d'une catégorie
		['GET', '/admin/categories/update/[i:id]', 'CategoriesAdmin#update', 'admin_categories_update'],
		// Route permettant de traiter le formulaire de modification d'une catégorie
		['POST', '/admin/categories/update/[i:id]', 'CategoriesAdmin#updateAction', 'admin_categories_update_action'],
		// Route permettant de supprimer une catégorie
		['GET', '/admin/categories/delete/[i:id]', 'CategoriesAdmin#deleteAction', 'admin_categories_delete_action'],
//======================================= FRONT =====================================
		// Cart Her: A VERIFIER
		['GET', '/user/cart', 'Cart#afficherPanier', 'user_cart'],
		['GET', '/user/cart/[i:l]/[i:q]/[i:p]', 'Cart#ajouterArticle', 'user_cart_add'],
		['GET', '/user/cart/add/[i:l]/[i:q]/[i:p]', 'Cart#ajouterNouvelArticle', 'user_cart_add_new'],
		['GET', '/user/cart/[i:l]/[i:q]', 'Cart#retrancherArticle', 'user_cart_substrat'],
		['GET', '/user/cart/[i:l]', 'Cart#supprimerArticle', 'user_cart_remove'],
		// ['POST', '/user/cart', 'Cart#removeProductInCart', 'user_cart_remove'],
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// User
		// Route pour afficher le formulaire d'inscription
		['GET', '/register', 'User#register', 'register'],
		// Route pour inscrire les données du formulaire en BDD
		['POST', '/register', 'User#registerAction', 'register_action'],
		// Route pour afficher le formulaire de connexion
		['GET', '/login', 'User#login', 'login'],
		// Route pour ouvrir une session utilisateur
		['POST', '/login', 'User#loginAction', 'login_action'],
		// Route pour fermer une session utilisateur
		['GET', '/logout', 'User#logoutAction', 'logout_action'],
		// Route pour afficher le formulaire de mot de passe oublié
		['GET', '/forgetpassword', 'User#forgetPassword', 'forgetpassword'],
		// Route pour envoyer un mail PHPMailer avec lien de modification de password
		['POST', '/forgetpassword', 'User#forgetPasswordAction', 'forgetpassword_action'],
		// Route pour afficher le formulaire de réinitialisation du password
		['GET', '/modifpassword', 'User#modifPassword', 'modifpassword'],
		// Route pour envoyer en BDD l'update du password
		['GET|POST', '/treatmodifpassword', 'User#modifPasswordAction', 'modifpassword_action'],
		// Route pour afficher le formulaire de Contact
		['GET', '/contact', 'User#contact', 'contact'],
		// Route pour valider l'envoi du mail de contact
		['POST', '/contact', 'User#contactAction', 'contact_action'],
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// UserProfile
		// Route affichant le profil de l'utilisateur
		['GET', '/user/profile/monprofil/[i:id]', 'UserProfile#monprofil', 'user_profile_monprofil'],
		// Route affichant le formulaire d'ajout d'une adresse liée a un compte
		['GET', '/user/adresses/new', 'UserProfile#addAddress', 'add_new_address'],
		// Route permettant de traiter le formulaire d'ajout d'une adresse
		['POST', '/user/adresses/new', 'UserProfile#addAddressAction', 'add_new_address_action'],
		// Route affichant les commandes du compte connecté
		['GET', '/user/orders/list', 'UserProfile#mesCommandes', 'user_orders'],
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Order
		// ['GET', '/orders', 'Order#index', 'listorders'],
		// Route affichant le recapitulatif de la commande avant validation
		['GET', '/user/confirm', 'Order#confirmOrder', 'confirm_order'],
		// Route permettant de valider la commande
		['POST', '/user/confirm', 'Order#confirmOrderAction', 'confirm_order_action'],
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Product
		// Route pour afficher la page "products/listproducts"
		['GET', '/products', 'Product#index', 'listproducts'],
		// Route pour afficher la page "products/productsingle"
		['GET', '/products/detail/[i:id]', 'Product#showSingleProduct', 'singleproduct'],
		// Route pour afficher la page "products/listproducts par catégorie"
		['GET', '/category', 'Product#indexCategory', 'categoryproduct'],
		// Vide pour le moment
	);
