<?php require('partials/head.php')?>

	<h1>login</h1>

	<div class="jumbotron">
			
		<form action="/login" role="form" method="POST">
		   <div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Input username" required>
		  </div>
		  <div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Input Password" required>
		  </div>
		  
		  <button class="btn btn-default btn-warning" type="submit">Login</button>
		</form>
     </div>

<?php require('partials/footer.php')?>