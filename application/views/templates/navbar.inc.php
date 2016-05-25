<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
      </button>
      <?php 
        $href = site_url('home');
        $attributes = array('class' => 'navbar-brand');
        echo anchor($href, 'The Sandpoint Archives', $attributes);
      ?>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php require_once 'loadNavItems.inc.php'; ?>
      </ul>
    </div>
  </div>
</nav>