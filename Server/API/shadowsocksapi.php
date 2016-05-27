<?php
require_once 'config/function.php';

if(empty($_POST['action'])){
  die(json_encode(array(
    'status' => 'Error',
    'result' => 'Undefined value.'
  )));
}else{
  if(!empty($_POST['password'])){
    $passwd = $_POST['password'];
  }

  if(!empty($_POST['traffic'])){
    $traffic = $_POST['traffic'];
  }

  if(!empty($_POST['pid'])){
    $pid = $_POST['pid'];
  }

  $action = $_POST['action'];

  if($action == "create"){
    $create = @shadowsocks_create($pid, $passwd, $traffic);
    echo json_encode($create);
  }elseif($action == "terminate"){
    $terminate = @shadowsocks_terminate($pid);
    echo json_encode($terminate);
  }elseif($action == "suspend"){
    $suspend = @shadowsocks_suspend($pid);
    echo json_encode($suspend);
  }elseif($action == "unsuspend"){
    $unsuspend = @shadowsocks_unsuspend($pid, $passwd);
    echo json_encode($unsuspend);
  }elseif($action == "changepassword"){
    $changepassword = @shadowsocks_changepassword($pid, $passwd);
    echo json_encode($changepassword);
  }elseif($action == "changepackage"){
    $changepackage = @shadowsocks_changepackage($pid, $traffic);
    echo json_encode($changepackage);
  }elseif($action == "reset"){
    $reset = @shadowsocks_reset($pid);
  }elseif ($action == "query"){
    $query = @shadowsocks_query($pid);
    echo json_encode($query);
  }else{
    die(json_encode(array(
      'status' => 'Error',
      'result' => 'Undefined value.'
    )));
  }
}
