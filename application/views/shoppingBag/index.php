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
    <?php
      if(!empty($items)) {
        // echo '<pre>';
        // var_dump($items);
        // die();
        // echo '</pre>';
        foreach ($items as $item) {
    ?>
      <tr>
        <td>
          <?php
            echo '<img src='.base_url('assets/images/uploads/'.$item['image_name']).'>';
          ?>
        </td>
        <td>
          <?php
            echo anchor(
              $item['class_uri'].'/'.$item['id'],
              $item['name']
            );
          ?>
        </td>
        <td>
          <?php echo $item['count']; ?>
        </td>
      </tr>
    <?php
        }
      } else {
        echo '<tr>';
          echo '<td>There are no items in the Shopping bag.</td>';
        echo '</tr>';
      }
    ?>
  </table>
</div>