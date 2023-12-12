<div class="col-md-4 mb-5">
	<div class="book-item h-100 d-flex flex-column">
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
		<div class="text-body pb-5 d-flex flex-column flex-grow-1">
			<h4 class="primary-font fs-2 primary-color">
				<a class="text-reset text-decoration-none" href="<?php echo URL; ?>book/<?php echo $book['book_id'];?>">
					<?php echo $book["title"]; ?>
				</a>
			</h4>
			<h5 class="secondary-font fs-6 mb-4" >
				<a class="text-reset text-decoration-none" href="<?php echo URL; ?>search?query=<?php echo $book["author"]; ?>">
					<?php echo $book["author"]; ?>	
				</a>
			</h5>
			<div class="description mb-3 border-top pt-4 flex-grow-1">
				<p class="lh-lg">
					<?php echo $book["description"]; ?>
				</p>
			</div> 
			<div class="book-ctgs">
				Categories :
				<?php 
				$bk_cats = explode(",",$book["categories"]);
				foreach($bk_cats as $bk_cat):
					?>
					<span>
						<a class="btn btn-outline-secondary btn-sm mb-2" href="<?php echo URL; ?>search?query=<?php echo $bk_cat; ?>">
								<?php echo $bk_cat; ?>	
						</a>
					</span>
				<?php endforeach; ?>
			</div>								
		</div>
	</div>
</div>