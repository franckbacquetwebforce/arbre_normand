<?php
namespace Controller;

use \Controller\AppController;
use \Model\OrderModel;
use \Model\UserAdressModel;
use \W\Security\AuthentificationModel;


class OrderAdminController extends AppController
{
  public function __construct()
  {
    $this->orders = new OrderModel();
    $this->adress = new UserAdressModel();
    $this->authentification = new AuthentificationModel();
  }
  /**
  *index
  *Affiche toutes les commandes
  */
  public function index()
  {
    if($this->allowTo('admin')){
      // Fonction venant de OrderModel, qui permet de récupérer les information de toutes les commandes
      $adminorders = $this->orders->indexOrders();
      // debug($adminorders);

      $this->show('admin/orders/list', array(
        'adminorders' => $adminorders
      ));
    }
  }
  /**
  *validatingOrders
  *méthode permettant d'afficher les commande en attente de validation
  */
  public function validatingOrders()
  {
    if($this->allowTo('admin')){
      $orders = $this->orders->findAllWaitingOrders();
      $this->show('admin/orders/waitinglist', array(
        'orders' => $orders
      ));
    }

  }
  /**
  *validOrders
  *méthode utilisant OrderModel permettant d'afficher les commande validées
  */
  public function validOrders()
  {
    if($this->allowTo('admin')){
      $orders = $this->orders->validOrders();
      // debug($products);
      $this->show('admin/orders/valid', array(
        'orders' => $orders
      ));
    }
  }
  /**
  *single
  *@param int $id identifiant de la commande
  *méthode permettant d'afficher le détail d'une commande
  */
  public function single($id)
  {
    if($this->allowTo('admin')) {
      $oneOrder = $this->orders->singleOrder($id);
      $this->show('admin/orders/single', array(
        'oneOrder' => $oneOrder,
        'id'=> $id
      ));
    }
  }
  /**
  *deleteAction
  *@param int $id identifiant de la commande
  *méthode permettant de supprimer une commande
  */
  public function deleteAction($id)
  {
    if($this->allowTo('admin')) {
      if(!empty($id)){
        $this->orders->delete($id);
        $this->orders->deleteOrderProd($id);
        $this->redirectToRoute('admin_order');
      } else {
        $this->showNotFound();
      }
    }
  }
  /**
  *updateAction
  *@param int $id identifiant de la commande
  *méthode permettant de valider une commande
  */
  public function updateAction($id)
  {
      if($this->allowTo('admin')) {
        if(!empty($id)){
          $this->orders->find($id);
          $valide = 'valide';

          $data = array(
            'status' => $valide
          );

          $this->orders->update($data,$id);
          $this->redirectToroute('admin_order');
        }else{
          $this->showNotFound();
        }
      }
  }



}
