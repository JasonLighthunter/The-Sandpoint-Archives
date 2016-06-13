<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php
        $attributes = array('class' => 'navbar-brand');
        echo anchor(
          site_url('home'),
          '<i class="fa fa-book fa-lg" aria-hidden="true"></i> The Sandpoint Archives',
          $attributes
        );
      ?>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php require_once 'loadNavLeft.php'; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php require_once 'loadNavRight.php' ?>
      </ul>
    </div>
  </div>
</nav>