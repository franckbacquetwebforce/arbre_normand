<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],




		// Admin Products

		// hermelen  php   =>  presque probleme un truc   , michelle ccs html 
		['GET', '/admin/product', 'ProductAdmin#index', 'admin_product'],
		['GET', '/admin/product/new', 'ProductAdmin#new', 'admin_product_new'],
		['POST', '/admin/product/new', 'ProductAdmin#newAction', 'admin_product_new_action'],
		['GET', '/admin/product/update/[i:id]', 'ProductAdmin#update', 'admin_product_update'],
		['POST', '/admin/product/update/[i:id]', 'ProductAdmin#updateAction', 'admin_product_update_action'],
		['GET', '/admin/product/delete/[i:id]', 'ProductAdmin#deleteAction', 'admin_product_delete_action'],

		// Admin Order
		['GET', '/admin/order', 'OrderAdmin#index', 'admin_order'],
		['GET', '/admin/order/new', 'OrderAdmin#new', 'admin_order_new'],
		['POST', '/admin/order/new', 'OrderAdmin#newAction', 'admin_order_new_action'],
		['GET', '/admin/order/update/[i:id]', 'OrderAdmin#update', 'admin_order_update'],
		['POST', '/admin/order/update/[i:id]', 'OrderAdmin#updateAction', 'admin_order_update_action'],
		['GET', '/admin/order/delete/[i:id]', 'OrderAdmin#deleteAction', 'admin_order_delete_action'],

	);
