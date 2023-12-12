<?php  include 'views/includes/header.php'; ?>
<main>
	<div class="container">
		<h1 class="mb-3 secondary-font text-center">Admin Dashboard</h1>
		<div class="dashboard-users mb-5">
			<h2 class="text-start mb-3 text-secondary secondary-font fs-3">Users</h2>
			<!-- <table> -->
			<table class="table table-striped table-hover plain">
				<thead>
					<tr>
						<th scope="col">User ID</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Type</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user):?>
						<tr>
							<td><?php echo $user["user_id"]; ?></td>
							<td><?php echo $user["first_name"]; ?></td>
							<td><?php echo $user["last_name"]; ?></td>
							<td><?php echo $user["email"]; ?></td>
							<td><?php echo $user["type"]; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="dashboard-categories mb-5 pt-5">
			<h2 class="text-start mb-3 text-secondary secondary-font fs-3">Categories</h2>
			<!-- <table> -->
			<table class="table table-striped table-hover plain">
				<thead>
					<tr>
						<th>Category ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($categories as $category):?>
						<tr>
							<td></a><?php echo $category["category_id"]; ?></td>
							<td><?php echo $category["category_name"]; ?></td>
							<td><?php echo $category["description"]; ?></td>
							<td><a href="<?php echo URL; ?>category/<?php echo $category["category_id"];?>/edit">Edit</a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="dashboard-books mb-5 pt-5">
			<h2 class="text-start mb-3 text-secondary secondary-font fs-3">Books</h2>
			<div id="books-chart" class="chart-display"></div>
			<!-- <table> -->
			<table class="table table-striped table-hover" id="books-table">
				<thead>
					<tr>
						<th>Book ID</th>
						<th>Title</th>
						<th>Author</th>
						<th>Description</th>
						<th>Categories</th>
						<th>Owner (User ID)</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($books as $book):?>
						<tr>
							<td><?php echo $book["book_id"]; ?></td>
							<td><?php echo $book["title"]; ?></td>
							<td><?php echo $book["author"]; ?></td>
							<td><?php echo substr($book["description"], 0, 120); ?>...</td>
							<td><?php echo $book["categories"]; ?></td>
							<td><?php echo $book["user_id"]; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="<?php echo URL; ?>public/scripts/dashboard.js"></script>











<?php include 'views/includes/footer.php'; ?>