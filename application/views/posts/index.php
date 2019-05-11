<div class="row">
	<div class="col s12 m8">
		<h3 class="center-align">News</h3>
		<?php foreach($posts as $post) : ?>
			<div class="col s12 m6">				
				<div class="card hoverable">
					<div class="card-content">
							<div class="col-md-6">
                                <?php if(!empty($post['post_image'])) : ?>
                                <img class="post-thumb responsive-img z-depth-1" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
                                <?php endif; ?>
                                <h4><?php echo $post['title']; ?></h4>
								<small class="post-date">Created at: <?php echo $post['created_at']; ?></small><br>
							<?php echo word_limiter($post['body'], 60); ?>
							<br><br>
							</div>
							<a class="btn-floating btn waves-effect waves-light purple darken-1" href="<?php echo site_url('/posts/'.$post['slug']); ?>"><i class="material-icons">add</i></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php if($this->uri->uri_string() == ""){echo $sitebar;}?>
	<div class="col s12 m8">
		<div class="pagination-links" style="padding-left: 10px;">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>