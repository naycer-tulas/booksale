<?php
class CategoriesController{

	private $model;

	// LOAD THE MODEL
	function __construct(){
		require_once 'models/CategoriesModel.php';
		$this->model = new Categories();
	}

	// SHOW ADD A CATEGORY PAGE
	function create(){
		include 'views/categories/add-category.php';
	}

	// ADD A CATEGORY
	function store(){
		if(!empty($_POST)) {
			$result = $this->model->addCategory($_POST);
			if($result) {
				$_SESSION["success"]["category"] = "insert";
				header("Location:" . URL . "#categories");
			}
		} 
	}

	// SHOW EDIT CATEGORY PAGE
	function edit($id){
		$category = $this->model->getCategory($id);
		include 'views/categories/edit-category.php';
	}

	// PERFORM THE ACTUAL UPDATE
	function update(){
		$result_update = $this->model->updateCategory($_POST);
		if($result_update) {
			$_SESSION["success"]["category"] = "update";
			header("Location:" . URL . "#categories");
		}
		
	}

	// DELETE CATEGORY
	function delete(){
		if(!empty($_POST)){
			if($this->model->deleteCategory($_POST['category_id'])) {
				$_SESSION["success"]["category"] = "delete";
				header("Location:" . URL . "#categories");
			} 
		}
	}

}