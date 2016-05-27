<li>
  <?php 
    if ($this->session->has_userdata('loggedInUser')) {
      echo anchor(site_url('#'), $this->session->loggedInUser['username']);
      echo '</li><li>';
      echo anchor(site_url('logout'), 'Log out');
    } else {
      echo anchor(site_url('login'), 'Log in');
    }
  ?>
</li>