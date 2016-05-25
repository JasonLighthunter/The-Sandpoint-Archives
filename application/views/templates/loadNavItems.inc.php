<?php
  foreach ($navItems as $item) {
    if(empty($item['has_children'])) {
      echo '<li>';
      $href = site_url($item['uri']);
      echo anchor($href, $item['name']);
    } else { 
      echo '<li class="dropdown">';
?>      
      <a class="dropdown-toggle" data-toggle="dropdown" role="button">
        <?php echo $item['name']; ?>
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <?php
          foreach ($item['children'] as $child) {
            $href = site_url($child['uri']);
            echo '<li>'.anchor($href, $child['name']).'</li>';
          }
        ?>
      </ul>
<?php
    }
    echo '</li>';
  }
?>