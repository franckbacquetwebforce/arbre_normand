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
    $categories = $this->category->findAll();
    $this->show('admin/categories/list', array(
                        'categories' => $categories
    ));
  }

  /**
   *addNew
   *Affiche le formulaire d'ajout d'une catégorie
   */
  public function addNew()
  {
    $this->show('admin/categories/add');
  }
  /**
   *addNewAction
   *Ajoute une catégorie
   */
  public function addNewAction()
  {
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

  /**
   *update
   *Affiche le formulaire de modification d'une catégorie
   *@param id de la catégorie
   */
  public function update($id)
  {
      $cat = $this->category->find($id);
      if(!empty($cat)){
        $this->show('admin/categories/update', array('cat' => $cat));
      } else {
       $this->showNotFound();
      }
  }
  /**
   *updateAction
   *Modifie une catégorie
   *@param id de la catégorie
   */
  public function updateAction($id)
  {
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

  public function deleteAction($id)
  {
    if(!empty($id)){
      $this->category->delete($id);
      $this->redirectToRoute('admin_categories');
    } else {
      $this->showNotFound();
    }
  }


  public function single($id)
  {

    $cat = $this->category->find($id);
    $this->show('admin/categories/single', array(
      'cat' => $cat
    ));
  }


}
