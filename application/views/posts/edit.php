<div class="row">
  <div class="col m10 offset-m1">
    <h2><?= $title; ?></h2>
    <h6>(Edit the selected fields and press "UPDATE")</h6><br>
    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('posts/update'); ?>
    	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
      <div class="form-group">
        <label>Title:</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
      </div>
      <div class="form-group">
        <label>Text:</label>
        <textarea id="editor1" class="materialize-textarea" name="body" placeholder="Text"><?php echo $post['body']; ?></textarea>
      </div><br>
      <div class="form-group">
        <div class="file-field input-field">
          <div class="waves-effect waves-light deep-purple darken-1 btn">
            <span>Add image</span>
            <input type="file" name="userfile" size="20">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <br>
      <button type="submit" class="waves-effect waves-light deep-purple darken-1 btn pulse">UPDATE</button>
    </form>
  </div>
</div>