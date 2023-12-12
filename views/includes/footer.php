<footer>
	<div class="container py-3">
		<div class="row">
			<div class="d-flex justify-content-between">
				
			</div>
			<div class="col text-white secondary-font justify-content-end align-items-center text-end">
				<span class="me-2 d-inline-block"> Booksale ni Tulas. All rights reserved. 2023. </span><img src="<?php echo URL; ?>public/images/footer-logo.png" alt="Footer Logo" width="30">
			</div>
		</div>
	</div>
</footer>

<?php 
if(isset($_SESSION["success"])):
	if(isset($_SESSION["success"]["category"])){
		switch ($_SESSION["success"]["category"]) {
			case 'insert':
			$message = "Successfully added category!";
			break;
			case 'delete':
			$message = "Successfully deleted category!";
			break;
			case 'update':
			$message = "Successfully updated category!";
			break;

			default:
					// code...
			break;
		}
	}

	if(isset($_SESSION["success"]["book"])){
		switch ($_SESSION["success"]["book"]) {
			case 'insert':
			$message = "Successfully added book!";
			break;
			case 'delete':
			$message = "Successfully deleted book!";
			break;
			case 'update':
			$message = "Successfully updated book!";
			break;

			default:
					// code...
			break;
		}
	}

	if(isset($_SESSION["success"]["user"])){
		switch ($_SESSION["success"]["user"]) {
			case 'insert':
			$message = "Successfully signed up user!";
			break;
			case 'login':
			$message = "Successfully logged in " . $_SESSION["user"]["name"] . " !";
			break;
			case 'logout':
			$message = "Successfully logged user out.";
			break;

			default:
					// code...
			break;
		}
	}
	?>
	<div class="toast-container position-fixed bottom-0 end-0 p-3">
		<div class="toast bg-solid-white" role="alert" aria-live="assertive" aria-atomic="true" id="toast" data-bs-delay="3000" data-bs-autohide="true">
			<div class="toast-header text-bg-success">
				<strong class="me-auto">Success!</strong>
				<small class="text-body-secondary-white">just now</small>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				<?php echo $message; ?>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$("#toast").toast();
			$("#toast").toast("show");
		});
	</script>

	<?php 
	unset($_SESSION["success"]);
endif;
?>
<script src="<?php echo URL; ?>public/scripts/bootstrap.js"></script>
</body>

</html>