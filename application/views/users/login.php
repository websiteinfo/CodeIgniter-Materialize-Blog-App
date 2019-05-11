	<div class="row" style="padding-bottom: 20vh;">
		<div class="col s12 l4 offset-l4">
			<br><br>
			<div class="card purple darken-3 z-depth-2">
		        <div class="card-content white-text">
					<?php echo form_open('users/login'); ?>
					<h5 class="text-center"><?php echo $title; ?></h5>
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Login" required autofocus>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
					</div>
					<button type="submit" class="btn waves-effect waves-light purple lighten-5 black-text">LOGIN</button>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>