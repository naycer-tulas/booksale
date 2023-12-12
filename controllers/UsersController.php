<?php
class UsersController{

	private $userModel,$booksModel,$categoriesModel;

	// LOAD THE MODEL
	function __construct(){
		require_once 'models/UsersModel.php';
		require_once 'models/BooksModel.php';
		require_once 'models/CategoriesModel.php';
		$this->usersModel = new Users();
		$this->booksModel = new Books();
		$this->categoriesModel = new Categories();
	}

	// ADD A USER
	function store(){
		if(!empty($_POST)) {
			$result = $this->usersModel->addUser($_POST);
			if($result) {
				$_SESSION["success"]["user"] = "insert";
				header("Location:" . URL);
			}
		} 
	}

	// LOG THE USER IN
	function login(){
		if(!empty($_POST)){
			$user = $this->usersModel->loginUser($_POST);
			if(!is_null($user)){
				$_SESSION["user"]["name"] = $user["name"];
				$_SESSION["user"]["type"] = $user["type"];
				$_SESSION["user"]["id"] = $user["user_id"];
				$_SESSION["success"]["user"] = "login";
				
			} else {
				$_SESSION["error"]["user"] = "login";
			}

			header("Location:" . URL);
		}
	}

	// AUTHENTICATE THE USER
	function authUser($user){
		if($user == "regular") {
			if(!isset($_SESSION["user"])) {
				header("Location:" . URL);
				exit();
			}
		} else if ($user == "administrator" ){
			if(!isset($_SESSION["user"]) || !($_SESSION["user"]["type"] == "administrator")) {
				header("Location:" . URL);
				exit();
			}
		}
	}

	// LOG USER OUT
	function logout(){
		unset($_SESSION["user"]);
		$_SESSION["success"]["user"] = "logout";
		header("Location:" . URL);

	}

	// SHOW ADMIN DASHBOARD
	function adminDashboard(){
		$users = $this->usersModel->getAllUsers();
		$books = $this->booksModel->getAllBooks();
		$categories = $this->categoriesModel->getAllCategories();

		include 'views/admin/dashboard.php';
	}



}