<div class="row">
  	<div class="col m8 offset-m2">
		<br>
		<h6>(Select a category)</h6>
		<hr>
		<br>
		<ul class="collection with-header">
			<li class="collection-header"><h4>Categories</h4></li>
			<?php foreach($categories as $category) : ?>
				<li class="collection-item">
                    <div class="row">
                        <div class="col m9">
                            <h5><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?>
                            </a></h5>
                        </div>
                        <?php if($this->session->userdata('logged_in')!=FALSE) : ?>
                        <form action="categories/delete/<?php echo $category['id']; ?>" method="POST">
                            <div class="col m3" style="padding-top: 1.2vh;">
                                <button type="submit" class="waves-effect waves-light red btn">DELETE</button>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
			    </li>
			<?php endforeach; ?>
		</ul>
		<br><br>
	</div>
</div>