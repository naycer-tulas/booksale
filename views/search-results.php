<?php  include 'views/includes/header.php'; ?>
<main>

	<div class="books my-5">
		<div class="container">
			<h1 class="mb-5 text-secondary fs-4">Search results for : <span class="secondary-font"> <?php echo $_GET["query"]; ?></span></h1>
			<div class="row gx-5 justify-content-around">
				<?php 

				if(!empty($books)): 
					foreach($books as $book):
						include 'views/includes/book-item.php';
					endforeach;
				else: ?>
					<p>No results found.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php include 'views/includes/footer.php'; ?>