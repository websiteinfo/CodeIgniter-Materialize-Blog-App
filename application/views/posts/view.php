<div class="row">
	<div class="col s12 m8">
        <?php if(!empty($post['post_image'])) : ?>
        <img class="responsive-img z-depth-1" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
        <?php endif; ?>
        <h2><?php echo $post['title']; ?></h2>
		<small class="post-date">Created at: <?php echo $post['created_at']; ?></small>
		<div class="post-body">
			<?php echo $post['body']; ?>
		</div>
		<?php if($this->session->userdata('logged_in')!=FALSE) : ?>
			<hr>
			<p class="green-text">Edit post</p>
			<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">EDIT [admin]</a>
			<?php echo form_open('/posts/delete/'.$post['id']); ?><br>
			<p class="red-text"><b> ATTENTION! Pressing DELETE you delete the post!</b></p>
				<input type="submit" value="DELETE [admin]" class="btn red">
			</form>
		<?php endif; ?>
		<br>
		<hr>
		<br>
	</div>
	<?=$sitebar?>
</div>