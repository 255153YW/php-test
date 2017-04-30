<?php require('partials/head.php')?>
<div class="jumbotron">
		<b>List of Test B.V. </b>Employees:
		<table class="table table-striped table-bordered"> <!--change dbo, all-->
			<thead style="color: white; background-color: black; font-weight: bold;">
			<tr><?php
				if($_SESSION['username']=="manager") { ?>
				<td>ID</td><?php
				}?>
				
				<td>Firstname</td>
				<td>Lastname</td>
				<td>Address</td>
				<td>Contact</td><?php
				
				if($_SESSION['username']=="manager") { ?>
				<td style="background-color: red;">Username</td>
				<td style="background-color: red;">Salary</td>
				<td style="background-color: red;">Action</td><?php
				}?>
			</tr>
			</thead>
			
			<tbody style="background-color: white;">
			<?php
			foreach ($employees as $employee)			
			{?>
			<tr><?php
				if($_SESSION['username']=="manager") { ?>
				<td style="background-color:#ffbbbb;"><?=$employee->id?></td><?php
				} ?>
				<td><?=$employee->firstname ?></td>
				<td><?=$employee->lastname ?></td>
				<td><?=$employee->address ?></td>
				<td><?=$employee->contact ?></td><?php
				
				
				if($_SESSION['username']=="manager") { ?>
				<td style="background-color:#ffbbbb;"><?=$employee->username ?></td>
				
				<td style="background-color:#ffbbbb;"><?=$employee->salary ?></td>
				
				<td style="background-color:#ffbbbb;">
				
				<a class="btn btn-default btn-success" href="/update/employee{<?=$employee->id?>}">edit</a>
				<a class="btn btn-default btn-danger" href="/delete/employee{<?=$employee->id?>}">delete</a>
				
				</td>
				
				<?php
				
				}?>
			</tr><?php
			}?>
			</tbody>
		</table>
      </div>
<?php require('partials/footer.php')?>