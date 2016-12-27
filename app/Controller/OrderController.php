<?php

namespace Controller;

use \Controller\AppController;
use \Controller\CartController;
use \Model\OrderModel;

class OrderController extends AppController
{

  public function __construct()
  {
    $this->ordermodel = new OrderModel();
    $this->cart = new CartController();
  }

  public function index()
  {

    $products = $this->ordermodel->getProducts();
    // debug($products);
    // die();
    $this->show('order/list', array(
                        'products' => $products
    ));
  }
  public function confirmOrder()
  {
    $orders = $this->cart->infoProduitPanier();

    $this->show('order/confirmorder', array(
                    'orders' => $orders,
    ));
  }
  public function confirmOrderAction()
  {
    $orders = $this->cart->infoProduitPanier();
    
    $this->ordermodel->insert
  }


}
