<?php include 'views/includes/header.php'; ?>

<main>
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-4">
				<h1 class="primary-font text-center my-4 primary-color">Update a Book</h1>

				<div class="img-container text-center mb-5 d-flex align-items-center justify-content-center">
					<?php 

					$src = "";
					if(!is_null($book["image"])){
						$src = $book["image"];
					} else {
						$src = "no-image.png";
					}

					?>
					<div>
						<a href="<?php echo URL; ?>book/<?php echo $book['book_id'];?>">
							<img class="img-fluid w-50" src="<?php echo URL; ?>public/images/<?php echo $src; ?>" alt="<?php echo $book['title']; ?>">
						</a>
					</div>
				</div>
				<form method="POST" action="<?php echo URL; ?>book/update" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="title" class="form-label">Title</label>
						<input type="text" class="form-control" id="title" name="title" value="<?php echo $book["title"]; ?>" required>
					</div>
					<div class="mb-3">
						<label for="author" class="form-label">Author</label>
						<input type="text" class="form-control" id="author" name="author" value="<?php echo $book["author"]; ?>" required>
					</div>
					<div class="mb-3">
						<label for="description" class="form-label">Description</label>
						<textarea class="form-control" id="description" rows="5" name="description" required><?php echo $book["description"]; ?></textarea>
					</div>
					<div class="mb-3">
						<label for="book-image" class="form-label">Image</label>
						<input class="form-control" type="file" id="book-image" name="image">
					</div>
					<div class="mb-3">
						<label for="">Categories</label>
						<?php 
						$book_categories = explode(",",$book["categories"]);
						foreach($categories as $category): ?>
							<div class="form-check mt-2"> 
								<input 
								<?php if(in_array($category["category_name"],$book_categories)):?> checked <?php endif; ?>
								class="form-check-input" type="checkbox" value="<?php echo $category['category_id'];?>" id="cat-<?php echo $category['category_id'];?>" name="category[]">
								<label class="form-check-label" for="cat-<?php echo $category['category_id'];?>">
									<?php echo $category['category_name'];?>
								</label>
							</div>
						<?php endforeach; ?>
						<div class="text-center pt-3">
							<input type="hidden" name="id" value="<?php echo $book['book_id']; ?>">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>

	<?php include 'views/includes/footer.php'; ?>
