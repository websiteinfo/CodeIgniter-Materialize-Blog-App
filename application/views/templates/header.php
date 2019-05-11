  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="author"      content="Websiteinfo">
      <title>Websiteinfo - <?php echo $title ?></title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&amp;subset=latin-ext" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/materialize.min.css"); ?>"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

  <body>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper purple darken-2">
            <div class="container">
              <a href="<?php echo base_url(); ?>" class="brand-logo">Logo</a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li>
                  <a href="<?php echo base_url(); ?>">HOME</a>
                </li>
                <?php if($this->session->userdata('logged_in')) : ?>
                <li>
                  <a class="dropdown-button" href="#!" data-activates="dropdown">ADMIN-PANEL<i class="material-icons right">arrow_drop_down</i></a>
                </li>
                <?php endif; ?>
                <?php if(!$this->session->userdata('logged_in')) : ?>
                  <li>
                    <a href="<?php echo base_url("users/login"); ?>">LOGIN</a>
                  </li>
                <li>
                    <li><a class="white-text" href="<?php echo base_url("users/register"); ?>">REGISTER</a></li>
                </li>
                <?php endif; ?>
              </ul>
            </div>
        </div>
      </nav>
    </div>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="<?php echo base_url(); ?>">HOME</a></li>
        <li><a href="<?php echo base_url("users/login"); ?>">LOGIN</a></li>
        <li><a href="<?php echo base_url("users/register"); ?>">REGISTER</a></li>
    </ul>
    <?php if($this->session->userdata('logged_in')) : ?>
      <ul id="dropdown" class="dropdown-content">
        <li><a class="white-text" href="<?php echo base_url("posts/create"); ?>">NEW POST</a></li>
        <li><a class="white-text" href="<?php echo base_url("categories"); ?>">CATEGORIES</a></li>
        <li><a class="white-text" href="<?php echo base_url("categories/create"); ?>">CREATE CATEGORY</a></li>
        <li><a class="white-text" href="<?php echo base_url("users/logout"); ?>">LOGOUT</a></li>
      </ul>
    <?php endif; ?>
 
    <div class="container container-padding">
      <div class="row">
          <h4 class="center-align purple-text text-darken-2">
    <?php if($this->session->flashdata('user_registered')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_created')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_updated')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_created')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_deleted')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<p>'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>

     <?php if($this->session->flashdata('user_loggedout')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_deleted')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
    <?php endif; ?>
          </h4>