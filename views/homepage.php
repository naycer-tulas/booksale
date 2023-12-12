<?php include "views/includes/header.php"; ?>
<main>
	<?php  include "views/includes/banner.php"; ?>
	
	<div class="featured mt-5">
		<div class="container">
			<div class="row gx-5">
				<div class="col-8">
					<h2 class="primary-font secondary-font primary-color mb-4"><img src="<?php echo URL; ?>public/images/ribbon.png" alt="ribbon" class="me-3" width="80">Featured Book</h2>
					<div class="book-info">
						<div class="d-flex justify-content-between align-items-center">
							<h3 class="primary-font fs-1 mb-4">Angels & Demons</h3>
							<p class="secondary-font primary-color"><span class="text-dark">Author:</span> Dan Brown</p>
						</div>
						
						<p class="lh-lg">
							When Harvard symbologist Robert Langdon discovers the resurgence of an ancient brotherhood known as the Illuminati, he flies to Rome to warn the Vatican, the Illuminati's most hated enemy. Joining forces with beautiful Italian scientist Vittoria Vetra (Ayelet Zurer), Langdon follows a centuries-old trail of ancient symbols in the hope of preventing the Illuminati's deadly plot against the Roman Catholic Church from coming to fruition.
						</p>
					</div>
				</div>
				<div class="col-3 offset-1 text-end">
					<img src="<?php echo URL; ?>public/images/featured-img.jpg" alt="Featured Img" class="w-100" >
				</div>
			</div>
		</div>
	</div>

	<div class="testimonials position-relative">
		<div class="container">
			<div class="text-center text-white">
				<img src="<?php echo URL; ?>public/images/person.jpg" alt="" class="border rounded-circle border-5 border-white position-absolute top-0 start-50 translate-middle" width="240">
				<p>They are always so courteous! Looking forward to buying from them again</p>
				<h3 class="primary-font">Rowena G. Tello</h3>
				<img src="<?php echo URL; ?>public/images/stars.png" alt="stars" width="120">
			</div>
		</div>
	</div>
	<div class="books my-5">
		<div class="container">
			<?php if(isset($_SESSION["user"])): ?>
				<div class="row justify-content-end my-5">
					<div class="col-3 text-end">
						<a href="<?php echo URL; ?>book/add" class="btn btn-primary"><i class="bi bi-book-half me-1"></i> Add a Book</a>
					</div>
				</div>
			<?php endif; ?>
			<div class="row gx-5 justify-content-around">
				<?php foreach($books as $book) {
					include 'views/includes/book-item.php';
				} ?>
			</div>
		</div>
	</div>

	<div class="categories-section py-5" id="categories">
		<div class="container">
			<div class="row justify-content-start">
				<div class="col-5">
					<h2 class="primary-font text-white mb-4 text-shadow fs-1">Categories</h2>
					<div class="accordion" id="accordionExample">
						<?php foreach($categories as $category):?>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $category['category_id']; ?>" aria-expanded="true" aria-controls="collapseOne">
										<?php echo $category["category_name"]; ?>
									</button>
								</h2>
								<div id="collapse-<?php echo $category['category_id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<?php echo $category["description"]; ?>


										<?php if(isset($_SESSION["user"]) && $_SESSION["user"]["type"] == "administrator"): ?>
											<div class="ctg-btns d-flex align-items-center justify-content-end">
												<a  href="category/<?php echo $category['category_id']; ?>/edit" class="link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Update</a>
												
												<button type="button" class="link-danger link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover btn btn-link" data-bs-toggle="modal" data-bs-target="#cat-del-<?php echo $category['category_id']; ?>">Delete</buttton>
													
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div> 

								<!-- Categories Delete Modal -->
								<div class="modal fade" id="cat-del-<?php echo $category['category_id']; ?>" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header  custom-bg-primary text-white">
												<h1 class="modal-title fs-5">Confirmation</h1>
												<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												Delete category <?php echo $category["category_name"]; ?>?
												<form action="<?php echo URL;?>category/delete" method="POST" class="d-inline-block" id="cat-del-form-<?php echo $category['category_id']; ?>">
													<input type="hidden" name="category_id" value="<?php echo $category['category_id'];?>">
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" form="cat-del-form-<?php echo $category['category_id']; ?>">Delete</button>
											</div>
										</div>
									</div>
								</div>
								<!-- End Categories Delete Modal -->

							<?php endforeach; ?>
						</div>

						<?php if(isset($_SESSION["user"]) && $_SESSION["user"]["type"] == "administrator"): ?>
							<div class="text-center">
								<a href="<?php echo URL; ?>category/add" class="btn btn-warning btn mt-3"><i class="bi bi-tags-fill" class="me-1"></i> Add a Category</a>
							</div>
						<?php endif; ?>
					</div>

				</div>
				

				
			</div>
		</div>
	</div>

	<div class="contact-us my-5">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-6">
					<h2 class="primary-font text-center text-secondary fs-1">
						Contact Us
					</h2>
					<form class="">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Subject</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="mb-3">
							<label for="exampleFormControlTextarea1" class="form-label">Inquiry</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>



<?php
include 'views/includes/footer.php';
?>
