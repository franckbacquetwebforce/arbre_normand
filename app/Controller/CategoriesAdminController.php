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
  public function index()
  {
    $categories = $category->findAll();
    $this->show('admin/categories/list', array(
                        'categories' => $categories
    ));
  }


  public function addNew()
  {
    $this->show('admin/categories/add');
  }

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
			$this->show('admin/newadmin/admin_inscription', array(
				'errors' => $errors
			));

		}
  }


  public function update($id)
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
          $this->category->update($data,$id);
          $this->redirectToRoute('default_home');
    } else {
      $this->show('admin/newadmin/admin_inscription', array(
        'errors' => $errors
      ));

    }
  }

  public function updateAction($id)
  {

  }

  public function delete($id)
  {

  }

}
