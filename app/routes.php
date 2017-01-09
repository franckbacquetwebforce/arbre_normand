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
		// Admin Order
		['GET', '/admin/order/list', 'OrderAdmin#index', 'admin_order'],
		['GET', '/admin/order/single/[i:id]', 'OrderAdmin#single', 'order_single'],
		['GET', '/admin/order/waiting', 'OrderAdmin#validatingOrders', 'waiting_orders'],
		['GET', '/admin/order/valid', 'OrderAdmin#validOrders', 'valid_orders'],
		['GET', '/admin/order/new', 'OrderAdmin#addNew', 'admin_order_new'],
		['POST', '/admin/order/new', 'OrderAdmin#addNewAction', 'admin_order_new_action'],

		['GET|POST', '/admin/order/update/[i:id]', 'OrderAdmin#updateAction', 'admin_order_update_action'],
		['GET|POST', '/admin/order/delete/[i:id]', 'OrderAdmin#deleteAction', 'admin_order_delete_action'],
		// Admin User
		['GET', '/admin/user', 'UserAdmin#index', 'admin_user'],
		['GET', '/admin/dashboard', 'UserAdmin#statistics', 'site_statistics'],
		['GET', '/admin/user/new', 'UserAdmin#addNew', 'admin_user_new'],
		['POST', '/admin/user/new', 'UserAdmin#addNewAction', 'admin_user_new_action'],
		['GET|POST', '/admin/user/update_status/[i:id]', 'UserAdmin#updateStatus', 'admin_user_status_update'],

		['GET', '/admin/user/update/[i:id]', 'UserAdmin#update', 'admin_user_update'],
		['POST', '/admin/user/update/[i:id]', 'UserAdmin#updateAction', 'admin_user_update_action'],
		['GET', '/admin/user/delete/[i:id]', 'UserAdmin#deleteAction', 'admin_user_delete_action'],
		// Admin Categories
		['GET', '/admin/categories', 'CategoriesAdmin#index', 'admin_categories'],
		['GET', '/admin/categories/new', 'CategoriesAdmin#addNew', 'admin_categories_new'],
		['POST', '/admin/categories/new', 'CategoriesAdmin#addNewAction', 'admin_categories_new_action'],
		['GET', '/admin/categories/single/[i:id]', 'CategoriesAdmin#single', 'category_single'],
		['GET', '/admin/categories/update/[i:id]', 'CategoriesAdmin#update', 'admin_categories_update'],
		['POST', '/admin/categories/update/[i:id]', 'CategoriesAdmin#updateAction', 'admin_categories_update_action'],
		['GET', '/admin/categories/delete/[i:id]', 'CategoriesAdmin#deleteAction', 'admin_categories_delete_action'],
//======================================= FRONT =====================================
		// Cart Her: A VERIFIER
		['GET', '/user/cart', 'Cart#afficherPanier', 'user_cart'],
		['GET', '/user/cart/[i:l]/[i:q]/[i:p]', 'Cart#ajouterArticle', 'user_cart_add'],
		['GET', '/user/cart/add/[i:l]/[i:q]/[i:p]', 'Cart#ajouterNouvelArticle', 'user_cart_add_new'],
		['GET', '/user/cart/[i:l]/[i:q]', 'Cart#retrancherArticle', 'user_cart_substrat'],
		['GET', '/user/cart/[i:l]', 'Cart#supprimerArticle', 'user_cart_remove'],
		// ['POST', '/user/cart', 'Cart#removeProductInCart', 'user_cart_remove'],
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
		// UserProfile
		['GET', '/user/profile/monprofil/[i:id]', 'UserProfile#monprofil', 'user_profile_monprofil'],
		['GET', '/user/adresses/new', 'UserProfile#addAddress', 'add_new_address'],
		['POST', '/user/adresses/new', 'UserProfile#addAddressAction', 'add_new_address_action'],
		['GET', '/user/orders/list', 'UserProfile#mesCommandes', 'user_orders'],
		// Order

		// ['GET', '/orders', 'Order#index', 'listorders'],
		['GET', '/user/confirm', 'Order#confirmOrder', 'confirm_order'],
		['POST', '/user/confirm', 'Order#confirmOrderAction', 'confirm_order_action'],
		// Product
		// Route pour afficher la page "products/listproducts"
		['GET', '/products', 'Product#index', 'listproducts'],
		// Route pour afficher la page "products/productsingle"
		['GET', '/products/detail/[i:id]', 'Product#showSingleProduct', 'singleproduct'],
		// Route pour afficher la page "products/listproducts par catégorie"
		['GET', '/category', 'Product#indexCategory', 'categoryproduct'],
		// Vide pour le moment
	);
