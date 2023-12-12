<?php  include "views/includes/header.php"; ?>
<main>
	<div class="featured mt-5">
		<div class="container">
			<div class="row gx-5">
				<div class="col-8">
					<div class="d-flex flex-column justify-content-between h-100">
						<div class="book-info">
							<div class="d-flex justify-content-between align-items-center">
								<h3 class="primary-font fs-1 mb-4"><?php echo $book["title"];?></h3>
								<p class="secondary-font primary-color"><span class="text-dark">Author:</span> <?php echo $book["author"];?></p>
							</div>

							<p class="lh-lg">
								<?php echo $book["description"];?>
							</p>
							<div class="book-ctgs pb-4">
								Categories :
								<?php 
								$bk_cats = explode(",",$book["categories"]);
								foreach($bk_cats as $bk_cat):
									?>
									<span>
										<a class="btn btn-outline-secondary btn-sm" href="<?php echo URL; ?>search?query=<?php echo $bk_cat; ?>">
											<?php echo $bk_cat; ?>	
										</a>
									</span>
								<?php endforeach; ?>
							</div>		
							
						</div>

						<?php 
						if(isset($_SESSION["user"])) :
							if($_SESSION["user"]["type"] == "administrator" || $_SESSION["user"]["id"] == $book["user_id"] ): ?>
								<div class="text-center mt-5">
									<div class="row">
										<div class="col-6">
											<a  href="<?php echo URL; ?>book/<?php echo $book['book_id']; ?>/edit" class="btn-primary btn d-block">Edit</a>
										</div>
										<div class="col-6">
											<button class="btn btn-secondary d-block w-100" data-bs-toggle="modal" data-bs-target="#delete-book-modal">Delete</button>
										</div>
									</div>
								</div>
						<?php 
							endif;
						endif;
						?>

					</div>
				</div>
				<div class="col-3 offset-1 text-end">
					<?php 
					$src = "";
					if(!is_null($book["image"])){
						$src = $book["image"];
					} else {
						$src = "no-image.png";
					}
					?>
					<img src="<?php echo URL; ?>public/images/<?php echo $src;?>" alt="Featured Img" class="w-100" >
				</div>
			</div>
		</div>
	</div>
</main>
<!-- Modal -->
<div class="modal fade" id="delete-book-modal" tabindex="-1" aria-labelledby="delete-modal-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header custom-bg-primary text-white">
				<h1 class="modal-title fs-5" id="delete-modal-label">Confirm Delete</h1>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Do you really want to delete the book?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" form="delete-form" class="btn btn-primary">Delete</button>
			</div>
		</div>
	</div>
</div>

<form action="<?php echo URL;?>book/delete" method="POST" id="delete-form">
	<input type="hidden" name="book_id" value="<?php echo $book['book_id'];?>">
</form>

<?php
include 'views/includes/footer.php';
?>
