<?php require('partials/head.php')?>
	<div class="jumbotron">
		<h3><?=$title?></h3>	
		<form action="<?=$action?>" role="form" method="POST">
		   <div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Input username" value="<?=$employee->username?>" required>
		  </div>
		  <div class="form-group">
			<label for="password">Add/Change Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Input Password" value="">
		  </div>
		  <div class="form-group">
			<label for="firstname">Firstname</label>
			<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Input firstname" value="<?=$employee->firstname?>" required>
		  </div>
		  <div class="form-group">
			<label for="lastname">Lastname</label>
			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Input lastname" value="<?=$employee->lastname?>" required>
		  </div>
		  <div class="form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address" name="address" placeholder="Input address" value="<?=$employee->address?>" required>
		  </div>
		  <div class="form-group">
			<label for="contact">Contact</label>
			<input type="text" class="form-control" id="contact" name="contact" placeholder="Input contact" value="<?=$employee->contact?>" required>
		  </div>
		  <?php if(isset($_SESSION['username']) && $_SESSION['username']=="manager"){?>
		  <div class="form-group">
			<label for="salary">Salary</label>
			<input type="text" class="form-control" id="salary" name="salary" placeholder="Input salary" value="<?=$employee->salary?>" required>
		  </div>
		  <div class="form-group">
			<label for="position">Position</label>
			<input type="text" class="form-control" id="position" name="position" placeholder="Input position" value="<?=$employee->position?>" required>
		  </div>
		  <?php }?>
		  <button class="btn btn-default btn-warning" type="submit">Save</button>
		</form>
     </div>
<?php require('partials/footer.php')?>