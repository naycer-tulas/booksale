<?php include "views/includes/header.php"; ?>
<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-4">
			<h1 class="primary-font text-center my-4 primary-color">Edit <?php echo $category["category_name"];?></h1>

			<form method="POST" action="<?php echo URL; ?>category/update">
				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<input type="text" class="form-control" id="title" name="category_name" value="<?php echo $category["category_name"];?>" required>
				</div>
				<div class="mb-3">
					<label for="description" class="form-label">Description</label>
					<textarea class="form-control" id="description" rows="5" name="description" required><?php echo $category["description"];?></textarea>
				</div>
				<input type="hidden" name="id" value="<?php echo $category['category_id']; ?>">
				<div class="text-center py-3">
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</form>

		</div>
	</div>

	</div>
</main>
<?php include 'views/includes/footer.php'; ?>