<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href= <?php echo site_url('home'); ?> >The Sandpoint Archives</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
          foreach ($navItems as $item) {
            echo '<li><a href='.site_url($item['uri']).'>'.$item['name'].'</a></li>';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>