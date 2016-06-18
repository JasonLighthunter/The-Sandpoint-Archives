<?php
  if($this->session->inAdminMode) {
    $attributes = array('class' => 'admin-mode');
    echo '<li>';
    echo anchor(current_url(), 'ADMIN MODE', $attributes);
    echo '</li>';

    echo '<li>';
    echo anchor(site_url('accounts'), 'Accounts');
    echo '</li>';
  }
  foreach ($navItems as $item) {
    if(empty($item['has_children'])) {
      echo '<li>';
        echo anchor(site_url($item['uri']), $item['name']);
    } else {
      echo '<li class="dropdown">';
        $attributes = array(
          'class'       => 'dropdown-toggle',
          'data-toggle' => 'dropdown',
          'role'        => 'button'
        );
        $content    = $item['name'].'<span class="caret"></span>';
        echo anchor('',$content,$attributes);
        echo '<ul class="dropdown-menu">';
        foreach ($item['children'] as $child) {
          echo '<li>'.anchor(site_url($child['uri']), $child['name']).'</li>';
        }
        echo '</ul>';
    }
    echo '</li>';
  }
?>