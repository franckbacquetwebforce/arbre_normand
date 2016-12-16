<?php

namespace Controller;

use \CategoriesModel;
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
    $listcategory = $category->findAll();
    $this->show('admin/categories/list');
  }


  public function addNew()
  {
    $this->show('admin/categories/add')
  }

  public function addNewAction()
  {
    $errors = [];
		// protection
		$name = trim(strip_tags($_POST['name']));
    $status = trim(strip_tags($_POST['status']))

    // Référencement des erreurs
    $errors['name'] = $this->valid->textValid($name,'nom de catégorie');

    $slugname = Tools::slugify($name);

		// Vérifie si les 2 mots de passe sont identiques
		$errors['password'] = $this->valid->correspondancePassword($password,$password2);




		if($this->valid->isValid($errors)){
					$data = array(
						'slug' => $slugname,
						'category_name' => $name,
						'created_at' => $this->date->format('Y-m-d H:i:s'),
            'status' => '$status'
					);
					$this->category->insert($data);
					$this->redirectToRoute('');
		} else {
			$this->show('admin/newadmin/admin_inscription', array(
				'errors' => $errors
			));

		}
  }


  public function update($id)
  {
    
  }

  public function updateAction($id)
  {

  }

  public function delete($id)
  {

  }

}
