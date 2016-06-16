<div class="row">
  <div class="col-sm-2">
    Username:
  </div>
  <div class="col-sm-10">
    <?php echo $account['username']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Role(s):
  </div>
  <div class="col-sm-10">
    <?php
      $rolesString = '';
      foreach ($roles as $role) {
        $rolesString .=$role.', ';
      }
      echo trim($rolesString, " ,");
    ?>
  </div>
  <div class="col-sm-2">
    Name:
  </div>
  <div class="col-sm-10">
    <?php echo $account['first_name']."&nbsp;".$account['last_name']; ?>
  </div>
  <div class="col-sm-2">
    Address:
  </div>
  <div class="col-sm-10">
    <address>
      <?php
        echo $account['street']."&nbsp;".$account['number'].$account['extra_info'];
        echo '<br>';
        echo $account['postal_code']."&nbsp;".$account['city'];
      ?>
    </address>
  </div>
</div>