<li>
  <?php
    if ($this->session->has_userdata('loggedInUser')) {
      $id       = $this->session->loggedInUser['user_id'];
      $username = $this->session->loggedInUser['username'];
      
      echo anchor(site_url('accounts/'.$id), 'Welcome, '.$username);
      echo '</li><li>';
      echo anchor(site_url('logout'), 'Log out');
    } else {
      echo anchor(site_url('accounts/create'), 'Register');
      echo '</li><li>';
      echo anchor(site_url('login'), 'Log in');
    }
  ?>
</li>