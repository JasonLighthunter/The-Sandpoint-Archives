<li>
  <?php 
    if (isset($this->session->loggedInUser)) {
      $href = site_url('account');
      echo anchor($href, $this->session->loggedInUser->username);
      $href = site_url('logout');
      echo anchor($href, 'Log out');
    } else {
      $href = site_url('login');
      echo anchor($href, 'Log in');
    }
  ?>
</li>