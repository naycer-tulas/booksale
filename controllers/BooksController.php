<?php
class BooksController{

	private $booksModel,$categoriesModel;

	// LOAD THE MODEL
	function __construct(){
		require_once 'models/BooksModel.php';
		require_once 'models/CategoriesModel.php';
		$this->booksModel = new Books();
		$this->categoriesModel = new Categories();
	}

	// INDEX - SHOW HOMEPAGE
	function index(){
		$books = $this->booksModel->getAllBooks();
		$categories = $this->categoriesModel->getAllCategories();
		include 'views/homepage.php';
	}
	
	// SHOW ADD A BOOK PAGE
	function create(){
		$categories = $this->categoriesModel->getAllCategories();
		include 'views/books/add-book.php';
	}

	// ADD A BOOK
	function store(){
		if(!empty($_POST) && $_FILES['image']['size'] != 0) {
			
			if($_FILES['image']['type'] != "image/jpeg"){
				$_SESSION["errors"]["image"]["type"] = false;
				header("Location:" . URL . 'book/add');
				exit();
			}

			if (move_uploaded_file($_FILES['image']['tmp_name'], 'public/images/' . $_FILES['image']['name'] ) ) {
				$args = $_POST;
				$args['image'] = $_FILES['image']['name'];
				$args['user_id'] = $_SESSION['user']['id'];
				$result = $this->booksModel->addBook($args);
				if($result) {
					$_SESSION["success"]["book"] = "insert";
					header("Location:" . URL);
				}
			}
		}
	}

	// SHOW EDIT PAGE
	function edit($id){
		$book = $this->booksModel->getBook($id);
		$categories = $this->categoriesModel->getAllCategories();
		include 'views/books/edit-book.php';
	}

	// PERFORM THE ACTUAL UPDATE
	function update(){
		$book = $this->booksModel->getBook($_POST['id']);
		if(!empty($_POST)){
			if($_FILES['image']['size'] == 0) {
				$image = $book['image'];
			} else {
				move_uploaded_file($_FILES['image']['tmp_name'], 'public/images/' . $_FILES['image']['name']);
				$image = $_FILES['image']['name'];
			}

			$args = $_POST;
			$args['image'] = $image;
			$result_update = $this->booksModel->updateBook($_POST['id'],$args);

			if($result_update) {
				$_SESSION["success"]["book"] = "update";
				header("Location:" . URL . "book/" . $book['book_id']);
			}
		}
	}

	// SHOW ONE BOOK
	function show($id){
		$book = $this->booksModel->getBook($id);
		include 'views/books/book.php';
	}

	// DELETE ONE BOOK
	function delete(){
		if(!empty($_POST)){
			if($this->booksModel->deleteBook($_POST['book_id'])) {
				$_SESSION["success"]["book"] = "delete";
				header("Location:" . URL);
			}
		}
	}

	// SHOW BOOKS BY QUERY
	function showBooksByQuery($query){
		$books = $this->booksModel->getBooksByQuery($query);
		include 'views/search-results.php';
	}

}