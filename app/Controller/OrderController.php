<?php

namespace Controller;

use \Controller\AppController;
use \Model\OrderModel;

class OrderController extends AppController
{

  public function __construct()
  {
    $this->ordermodel = new OrderModel();
  }

  public function index()
  {
    $orders = $this->ordermodel->findOrders();
    $inters = $this->ordermodel->orderProducts();
    $products = $this->ordermodel->getProducts();
    debug($products);
    die();
    $this->show('order/list', array(
                        'orders' => $orders,
                        'inters' => $inters,
                        'products' => $products
    ));
  }


}
