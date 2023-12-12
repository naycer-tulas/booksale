<!doctype html>
<html lang="en" class="h-100">
<head>
	<title>Booksale | Books for Sale</title>
	<link rel="icon" type="image/x-icon" href="<?php echo URL; ?>public/images/logo.png">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo URL;?>public/styles/bootstrap.css">
	<link rel="stylesheet" href="<?php echo URL;?>public/styles/bootstrap-icons.css">
	<link rel="stylesheet" href="<?php echo URL;?>public/styles/custom.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="//code.highcharts.com/css/highcharts.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto+Slab:wght@400;700&family=Satisfy&display=swap" rel="stylesheet">

	<script src="<?php echo URL;?>public/scripts/jquery.js"></script>
</head>

<body class="d-flex flex-column h-100 justify-content-between">
	<header>
		<div class="navigation">
			<div class="container">
				<div class="row">
					<nav class="navbar navbar-expand-lg">
						<div class="container-fluid">
							<a class="navbar-brand" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/images/logo.png" alt="Booksale ni Tulas" width="120"></a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
										<a class="nav-link" href="<?php echo URL; ?>about-us">About Us</a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Categories
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="#">Hard Bound</a></li>
											<li><a class="dropdown-item" href="#">Soft Bound</a></li>
										</ul>
									</li>
								</ul>
								<div>
									<div class="d-flex justify-content-end mb-3">
										<?php if(isset($_SESSION["user"])):?>
											<p>Hello <?php echo $_SESSION["user"]["name"];?> ! 	

											<?php if($_SESSION["user"]["type"] == "administrator"): ?>								<a href="<?php echo URL; ?>admin" class="text-reset text-decoration-none d-inline-block mx-3"><i class="bi bi-speedometer"></i>  Dashboard</a>
											<?php endif; ?>
												<a href="<?php echo URL; ?>user/logout" class="text-reset text-decoration-none d-inline-block mx-3"><i class="bi bi-box-arrow-right"></i> Log Out</a>
											</p>
										<?php else: ?>
											<a href="#" class="text-reset text-decoration-none d-inline-block mx-3" data-bs-toggle="modal" data-bs-target="#login-modal">Log In</a>
											<a href="#" class="text-reset text-decoration-none d-inline-block" data-bs-toggle="modal" data-bs-target="#sign-up-modal">Sign Up</a>
										<?php endif; ?>
									</div>
									<form class="d-flex" role="search" method="GET" action="<?php echo URL; ?>search">
										<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query" required>
										<button class="btn btn-primary" type="submit">Search</button>
									</form>
								</div>

								<!-- Sign up Modal -->
								<div class="modal fade" id="sign-up-modal" tabindex="-1" aria-labelledby="sign-up-modal-label" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-2 primary-color primary-font" id="sign-up-modal-label">Sign up</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="container">
													<form action="<?php echo URL; ?>user/add" id="sign-up-form" method="POST">
														<div class="personal-information mt-2">
															<div class="row">
																<p class="border-bottom pb-1 primary-color">Personal Information</p>
															</div>
															<div class="row">
																<div class="col-6 mb-3">
																	<label for="first-name" class="form-label text-secondary">First Name</label>
																	<input type="text" class="form-control" id="first-name" name="first-name" >
																</div>
																<div class="col-6 mb-3">
																	<label for="last-name" class="form-label text-secondary">Last Name</label>
																	<input type="text" class="form-control" id="last-name" name="last-name">
																</div>
															</div>
														</div>

														<div class="account-information mt-3">
															<div class="row">
																<p class="border-bottom pb-1 primary-color">Account Information</p>
															</div>
															<div class="row">
																<div class="col mb-3">
																	<label for="user-email" class="form-label text-secondary">Email</label>
																	<input type="email" class="form-control" id="user-email" name="user-email">
																</div>
															</div>
															<div class="row">
																<div class="col mb-3">
																	<label for="user-password" class="form-label text-secondary">Password</label>
																	<input type="password" class="form-control" id="user-password" name="user-password">
																</div>

															</div>
														</div>
														<div class="mt-4">
															<p>Already have an account? <a href="#" data-bs-target="#login-modal" data-bs-toggle="modal">Log in</a></p>
														</div>
													</form>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" form="sign-up-form">Sign Up</button>
											</div>
										</div>
									</div>
								</div>
								<!-- End Sign up modal -->

								<!-- Login modal -->
								<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="sign-up-modal-label" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-2 primary-color primary-font" id="sign-up-modal-label">Login</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="container">
													<?php if(isset($_SESSION["error"]["user"]) && $_SESSION["error"]["user"] == "login"): ?>
														<div class="alert alert-danger" role="alert">
															Username or password not found.
														</div>
														<script>
															$(document).ready(function(){
																$("#login-modal").modal("show");
															});

														</script>	
														<?php 
														unset($_SESSION["error"]["user"]);
													endif;
													?>

													<form action="<?php echo URL;?>user/login" method="POST" id="login-form">
														<div class="mb-3">
															<label for="login-user-email" class="form-label text-secondary">Email</label>
															<input type="email" class="form-control" id="login-user-email" name="login-user-email">
														</div>
														<div class="mb-3">
															<label for="login-user-password" class="form-label text-secondary">Password</label>
															<input type="password" class="form-control" id="login-user-password" name="login-user-password">
														</div>
														<div class="mt-4">
															<p>Don't have an account? <a href="#" data-bs-target="#sign-up-modal" data-bs-toggle="modal">Sign Up</a></p>
														</div>
													</form>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" form="login-form">Login</button>
											</div>
										</div>
									</div>
								</div>
								<!-- End Login Modal -->
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>

	</header>