<div class="row" style="padding-bottom: 32vh;">
  	<div class="col m8 offset-m2">
	  	<br>
		<h4><?= $title ;?></h4>

		<?php echo validation_errors(); ?>

		<?php echo form_open_multipart('categories/create'); ?>
			<div class="form-group">
				<label>NAME</label>
				<input type="text" class="form-control" name="name" placeholder="Enter the name">
			</div>
			<button type="submit" class="waves-effect waves-light deep-purple darken-1 btn pulse">SUBMIT</button>
		</form>
	</div>
</div>