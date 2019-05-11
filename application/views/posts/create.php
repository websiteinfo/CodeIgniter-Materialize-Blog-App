<div class="row">
  <div class="col m10 offset-m1">
  <h3><?= $title; ?></h3>
  <h6>(Fill in the fields below, title, text, entry section, and optionally the main picture and press "CREATE")</h6>
  <br>
  <?php echo validation_errors(); ?>

  <?php echo form_open_multipart('posts/create'); ?>
    <div class="row">
        <div class="form-group">
            <div class="col s12 m12">
            <label>Title:</label>
          <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
        </div>
    </div>
    <div class="form-group">
      <label>Text:</label>
      <textarea id="editor1" class="materialize-textarea" name="body" placeholder="Body text"></textarea>
    </div><br>
    <div class="row">
     <div class="col s12 m6"> 
    <div class="form-group">
    	  <label>Category:</label>
    	  <select name="category_id" class="browser-default">
    		  <?php foreach($categories as $category): ?>
    		  	<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    		  <?php endforeach; ?>
    	  </select>      
    </div>
</div>
<div class="col s12 m6">
    <div class="file-field input-field" style="padding-top: 6px;">
      <div class="waves-effect waves-light deep-purple darken-1 btn">
        <span>Main image</span>
        <input type="file" name="userfile" size="20">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  </div>
  </div>
    <button type="submit" class="waves-effect deep-purple darken-1 waves-light btn pulse">CREATE</button>
  </form>
  </div>
</div>