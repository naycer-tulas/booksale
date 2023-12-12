<?php include 'views/includes/header.php'; ?>

<main>
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-4">
		

			<h1 class="primary-font text-center my-4 primary-color">Add a Book</h1>

			<form method="POST" action="<?php echo URL; ?>book/insert" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>
			<div class="mb-3">
				<label for="author" class="form-label">Author</label>
				<input type="text" class="form-control" id="author" name="author" required>
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Description</label>
				<textarea class="form-control" id="description" rows="5" name="description" required></textarea>
			</div>
			<div class="mb-3">
				<label for="book-image" class="form-label">Image</label>
				<input class="form-control" type="file" id="book-image" name="image" required>
			</div>
			<div class="mb-3">
				<label for="">Categories</label>
				<?php foreach($categories as $category): ?>
				<div class="form-check mt-2"> 
					<input class="form-check-input" type="checkbox" value="<?php echo $category['category_id'];?>" id="cat-<?php echo $category['category_id'];?>" name="category[]">
					<label class="form-check-label" for="cat-<?php echo $category['category_id'];?>">
					<?php echo $category['category_name'];?>
					</label>
					
				</div>
				<?php endforeach; ?>
			</div>
			<div class="text-center pt-3">
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
			</form>
		</div>
	 </div>
</div>
</main>

<?php include 'views/includes/footer.php'; ?>
