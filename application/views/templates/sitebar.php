
<div class="col s12 m4">
	<h3 class="center-align">Last posts:</h3>
	<div class="col s12 m12">
		<ul class="collection">
			<?php foreach($sitebar_posts as $post) : ?>			
		        <li class="collection-item avatar">
		        	<i class="material-icons circle purple darken-3 z-depth-1">find_in_page</i>
		        	<span class="title"><?php echo $post['title']; ?></span>
		        	<p style="font-size: 0.8rem;"><?php echo $post['created_at']; ?></p>
		        	<div><a href="<?php echo site_url('/posts/'.$post['slug']); ?>" class="secondary-content" style="color: #ba68c8;"><i class="small material-icons">skip_next</i></a></div>
		        </li>     	
		  	<?php endforeach ?>
	  	</ul>
	</div>
</div>
