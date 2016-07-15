<li>
  <?php
    echo '</li><li>';
    if ($this->session->has_userdata('user_id') && $this->session->has_userdata('username')) {
      echo anchor(site_url('accounts/'.$this->session->user_id), 'Welcome, '.$this->session->username);
      echo '</li><li>';
      echo anchor(site_url('logout'), 'Log out');
    } else {
      echo anchor(site_url('accounts/create'), 'Register');
      echo '</li><li>';
      echo anchor(site_url('login'), 'Log in');
    }
  ?>
</li>