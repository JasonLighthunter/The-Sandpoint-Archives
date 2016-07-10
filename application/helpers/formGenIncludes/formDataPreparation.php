<?php 
  $data = array('class' => "form-control");
  foreach ($inputData as $key => $value) {
    $data[$key] = $value;
  }
  if($isReq) {
    $data['required'] = '';
  }
?>