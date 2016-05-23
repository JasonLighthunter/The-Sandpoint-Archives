<?php
  foreach ($navItems as $item) {
    if(empty($item['has_children'])) {
      echo "<li>";
      echo '<a href='.site_url($item['uri']).'>'.$item['name'].'</a>';
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
          echo '<li><a href='.site_url($child['uri']).'>'.$child['name'].'</a></li>';
        }
      ?>
      </ul>
<?php
    }
    echo '</li>';
  }
?>