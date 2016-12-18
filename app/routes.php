<?php

	$w_routes = array(
		// Default
		['GET', '/', 'Default#home', 'default_home'],
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
		['GET', '/admin/order', 'OrderAdmin#index', 'admin_order'],
		['GET', '/admin/order/new', 'OrderAdmin#addNew', 'admin_order_new'],
		['POST', '/admin/order/new', 'OrderAdmin#addNewAction', 'admin_order_new_action'],
		['GET', '/admin/order/update/[i:id]', 'OrderAdmin#update', 'admin_order_update'],
		['POST', '/admin/order/update/[i:id]', 'OrderAdmin#updateAction', 'admin_order_update_action'],
		['GET', '/admin/order/delete/[i:id]', 'OrderAdmin#deleteAction', 'admin_order_delete_action'],

		// Admin User
		['GET', '/admin/user', 'UserAdmin#index', 'admin_user'],
		['GET', '/admin/user/new', 'UserAdmin#addNew', 'admin_user_new'],
		['POST', '/admin/user/new', 'UserAdmin#addNewAction', 'admin_user_new_action'],
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
		['GET', '/user/cart', 'Cart#panier', 'user_cart'],
		['GET', '/user/cart/order', 'Cart#panierAction', 'user_cart_action'],
		['POST', '/user/cart', 'Cart#addProductInCart', 'user_cart_add'],
		['POST', '/user/cart', 'Cart#removeProductInCart', 'user_cart_remove'],

		// User
		['GET', '/register', 'User#register', 'register'],
		['POST', '/register', 'User#registerAction', 'register_action'],
		['GET', '/login', 'User#login', 'login'],
		['POST', '/login', 'User#loginAction', 'login_action'],
		['GET', '/logout', 'User#logoutAction', 'logout_action'],

		['GET', '/forgetpassword', 'User#forgetPassword', 'forgetpassword'],
		['POST', '/forgetpassword', 'User#forgetPasswordAction', 'forgetpassword_action'],
		['GET', '/modifpassword', 'User#modifPassword', 'modifpassword'],
		['GET|POST', '/treatmodifpassword', 'User#modifPasswordAction', 'modifpassword_action'],



		// UserProfile
		['GET', '/user/profile/monprofil/[i:id]', 'UserProfile#monprofil', 'user_profile_monprofil'],
		['GET', '/user/adresses/new', 'UserProfile#addAddress', 'add_new_address'],
		['POST', '/admin/categories/new', 'UserProfile#addAddressAction', 'add_new_address_action'],



		// Order
		// Vide pour le moment

		// Product
		['GET', '/products', 'Product#showProducts', 'listproducts'],

		// Vide pour le moment




	);
