<?php
  foreach ($navItems as $item) {
    if(empty($item['has_children'])) {
      echo '<li>';
      echo anchor(site_url($item['uri']), $item['name']);
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
            echo '<li>'.anchor(site_url($child['uri']), $child['name']).'</li>';
          }
        ?>
      </ul>
<?php
    }
    echo '</li>';
  }
  if($this->session->has_userdata('loggedInUser') && $this->session->loggedInUser['role_value'] > 1) {
    echo '<li><h5>ADMIN MODE</h5></li>
  }
  //webs2 DELETE LATER
  echo '<li>'.anchor(site_url('categories'),'Categories').'</li>';
?>