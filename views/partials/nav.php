<nav>
	<div class="header">
	<ul class="nav nav-pills pull-right">
		<li class="<?=($page=='home'?'active':'');?>"><a href="/">Home</a></li>
		<li  class="<?=($page=='about'?'active':'');?>"><a href="/about">About</a></li>
		<li  class="<?=($page=='contact'?'active':'');?>"><a href="/contact">Contact</a></li>
		<?php if(isset($_SESSION['username']) && $_SESSION['username']!="anonymous"){?>
		<li><a href="/loggedOut">Logout</a></li>
		<?php } else{?>
		<li class="<?=($page=='login'?'active':'');?>"><a href="/login">Employee Login</a></li>
		<?php }?>			
	</ul>
	<h3 class="text-muted">Test B.V.</h3>
</div>
</nav>

