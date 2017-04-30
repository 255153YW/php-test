<?php require('partials/head.php')?>
 		<?php if(isset($_SESSION['username']) && $_SESSION['username']!="anonymous"){?>
				
		<div class="jumbotron">
			
			<h2><b>Welcome, <?=$_SESSION['username']?></b></h2>
			<h5>Test B.V. Employee Website</h5>
			__________________________________________________<br>

			<center>
				<a href="/employees" class="btn btn-default btn-info input btn-block">List of All Employee</a>
				<!-- <a href="/overtime" class="btn btn-default btn-info btn-block">List of All Overtime Schedule</a> -->
				<?php
				if ($_SESSION['username'] == "manager") {?>
				<!-- <a href="/add/overtime" class="btn btn-default btn-danger btn-block">Assign Employee's Overtime Schedule</a> -->
				<a href="/add/employee" class="btn btn-default btn-danger btn-block">Add a New Employee</a>
				<?php
				}?>
				<a href="update/self" class="btn btn-default btn-danger btn-block">Edit your profile</a>
					
			</center>
      </div>
      <?php }
      else{?>
      <div class="jumbotron">
			<h2><b>Welcome to our website</b></h2>
      </div>
      <?php }?>

<?php require('partials/footer.php')?>