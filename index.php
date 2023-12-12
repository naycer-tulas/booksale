<?php

session_start();

define("URL", "http://localhost/booksale/");

if (isset($_GET['url'])){
	$url = explode("/", $_GET['url']);
} else {
	$url = "home";
}

require_once "controllers/BooksController.php";
require_once "controllers/CategoriesController.php";
require_once "controllers/usersController.php";
$booksController = new BooksController();
$categoriesController = new CategoriesController();
$usersController = new UsersController();

if ($url == "home") {
	$booksController->index();
} else if ($url[0] == "book" && ctype_digit($url[1]) && !isset($url[2])) {
	$booksController->show($url[1]);
} else if ($url[0] == "book" && $url[1] == "add") {
	$usersController->authUser("regular");
	$booksController->create();
} else if ($url[0] == "book" && $url[1] == "insert"){
	$usersController->authUser("regular");
	$booksController->store();
} else if ($url[0] == "book" && $url[1] == "delete"){
	$usersController->authUser("regular");
	$booksController->delete();
} else if ($url[0] == "book" && ctype_digit($url[1]) && $url[2] == "edit"){
	$usersController->authUser("regular");
	$booksController->edit($url[1]);
} else if ($url[0] == "book" && $url[1] == "update") {
	$usersController->authUser("regular");
	$booksController->update();
} else if ($url[0] == "search"){
	$booksController->showBooksByQuery($_GET['query']);
} else if ($url[0] == "category" && $url[1] == "add") {
	$usersController->authUser("administrator");
	$categoriesController->create();
} else if ($url[0] == "category" && $url[1] == "insert") {
	$usersController->authUser("administrator");
	$categoriesController->store();
} else if ($url[0] == "category" && ctype_digit($url[1]) && $url[2] == "edit"){
	$usersController->authUser("administrator");
	$categoriesController->edit($url[1]);
} else if ($url[0] == "category" && $url[1] == "update") {
	$usersController->authUser("administrator");
	$categoriesController->update();
} else if ($url[0] == "category" && $url[1] == "delete"){
	$usersController->authUser("administrator");
	$categoriesController->delete();
} else if ($url[0] == "user" && $url[1] == "add"){
	$usersController->store();
} else if ($url[0] == "user" && $url[1] == "login"){
	$usersController->login();
}  else if ($url[0] == "user" && $url[1] == "logout"){
	$usersController->authUser("regular");
	$usersController->logout();
}  else if ($url[0] == "admin" && !isset($url[1])) {
	$usersController->authUser("administrator");
	$usersController->adminDashboard();
} else if ($url[0] == "about-us") {
	include 'views/about.php';
} else if ($url[0] == "contact-us"){
	include 'views/contact-us.php';
} else {
	include 'views/404.php';
}

?>