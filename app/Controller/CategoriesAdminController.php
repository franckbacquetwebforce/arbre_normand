<?php

//fann_create_train_from_callback
//non terminé
//Slugify ne fonctionne pas dans addNewAction
namespace Controller;

use \Model\CategoriesModel;
use \Controller\AppController;
use \Service\ValidationTools;
use \Service\Tools;
use \DateTime;


class CategoriesAdminController extends AppController
{

  public function __construct()
  {

    $this->valid = new ValidationTools();
    $this->category = new CategoriesModel();
    $this->date = new DateTime();
  }
  /**
   *index
   *Récupère toutes le catégories et les affiche
   */
  public function index()
  {
    /* On affiche uniquement si l'utilisateur a le role d'admin allowTo viens d
    du controleur de W */
    if($this->allowTo('admin')){
      $categories = $this->category->findAll();
      $this->show('admin/categories/list', array(
        'categories' => $categories
      ));

    }
  }

  /**
   *getAllCat
   *Récupère toutes le catégories sous forme d'array
   *@return array
   */
  public function getAllCat()
  {
    if($this->allowTo('admin')){
      $categories = $this->category->findAll();
      return $categories;
    }
  }
  /**
   *getOneCat
   * @param identifiant d'une catégorie
   *Récupère toutes les données d'une catégorie
   */
  // public function getOneCat($id)
  // {
  //   if($this->allowTo('admin')){
  //     $oneCategory = $this->category->find($id);
  //     return $oneCategory;
  //   }
  // }

  /**
   *addNew
   *Affiche le formulaire d'ajout d'une catégorie
   */
  public function addNew()
  {
    if($this->allowTo('admin')){
      $this->show('admin/categories/add');
    }
  }
  /**
   *addNewAction
   *Ajoute une catégorie
   */
  public function addNewAction()
  {
    if($this->allowTo('admin')){
      $errors = [];
      // protection
      $name = trim(strip_tags($_POST['name']));
      $status = trim(strip_tags($_POST['status']));

      $slugname = Tools::slugify($name);
      // Référencement des erreurs
      $errors['name'] = $this->valid->textValid($name,'nom de catégorie');
      if($this->valid->isValid($errors)){
        $data = array(
          'slug' => $slugname,
          'category_name' => $name,
          'created_at' => $this->date->format('Y-m-d H:i:s'),
          'status' => $status
        );
        $this->category->insert($data);
        $this->redirectToRoute('default_home');
      } else {
        $this->show('admin/categories/add', array(
          'errors' => $errors
        ));
      }
    }
  }

  /**
   *update
   *Affiche le formulaire de modification d'une catégorie
   *@param id de la catégorie
   */
  public function update($id)
  {
    if($this->allowTo('admin')){
      $cat = $this->category->find($id);
      if(!empty($cat)){
        $this->show('admin/categories/update', array('cat' => $cat));
      } else {
        $this->showNotFound();
      }
    }
  }
  /**
   *updateAction
   *Modifie une catégorie
   *@param id de la catégorie
   */
  public function updateAction($id)
  {
    if($this->allowTo('admin')){
      $errors = [];
      $cat = $this->category->find($id);

      // protection
      $name = trim(strip_tags($_POST['name']));
      $status = trim(strip_tags($_POST['status']));
      $slugname = Tools::slugify($name);
      // Référencement des erreurs
      $errors['name'] = $this->valid->textValid($name,'nom de catégorie');
      if($this->valid->isValid($errors)){
        $data = array(
          'slug' => $slugname,
          'category_name' => $name,
          'modified_at' => $this->date->format('Y-m-d H:i:s'),
          'status' => $status
        );


        $this->category->update($data,$id);

        $this->redirectToRoute('admin_categories');
      } else {
        $this->show('admin/categories/update', array(
          'cat' => $cat,
          'errors' => $errors
        ));
      }
    }
  }
  /**
   *deleteAction
   *Supprime une catégorie
   *@param id de la catégorie
   */
  public function deleteAction($id)
  {
    if($this->allowTo('admin')){
      if(!empty($id)){
        $this->category->delete($id);
        $this->redirectToRoute('admin_categories');
      } else {
        $this->showNotFound();
      }
    }
  }
  /**
   *getOneCat
   * @param identifiant d'une catégorie
   *Récupère toutes les données d'une catégorie
   */
  public function single($id)
  {
    if($this->allowTo('admin')){
      $cat = $this->category->find($id);
      $this->show('admin/categories/single', array(
        'cat' => $cat
      ));
    }
  }
}
