<div class="row">
  <div class="col-xs-12">
    <?php
      require APPPATH.'helpers/buttonGenerator.php';
      require APPPATH.'helpers/messageGenerator.php';
    ?>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
      <?php
        if($this->session->inAdminMode) {
          echo '<th></th>';
          echo '<th></th>';
        }
      ?>
    </tr>
    <?php foreach ($accounts as $account) { ?>
      <tr>
        <td>
          <?php
            $href = site_url('accounts/'.$account['id']);
            echo anchor($href, $account['username']);
          ?>
        </td>

        <?php
          // delete
          if($this->session->inAdminMode) {
            echo '<td>';
              $inputData = array (
                'href'       => site_url('accounts/delete/'.$account['id']),
                'text'       => '',
                'attributes' => array (
                  'class' => 'btn btn-danger',
                  'title' => 'Delete this Account'
                )
              );
              $iconData  = 'fa fa-trash-o fa-fw';
              generateButton($inputData, $iconData);
            echo '</td>';
          }

          // edit
          if($this->session->inAdminMode) {
            echo '<td >';
              $inputData = array (
                'href'       => site_url('accounts/update/'.$account['id']),
                'text'       => '',
                'attributes' => array (
                  'class' => 'btn btn-default',
                  'title' => 'Edit this Account'
                )
              );
              $iconData  = 'fa fa-pencil fa-fw';
              generateButton($inputData, $iconData);
            echo '</td>';
          }
        ?>
        <!--webs-->
      </tr>
    <?php } ?>
  </table>
</div>