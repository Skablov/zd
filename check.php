<?php
  include('bd.php');
  session_start();

  $login = $_POST['login'];
  $password = $_POST['password'];
  if(!empty($login) && !empty($password))
  {
      $result = mysql_query("SELECT * FROM user WHERE login='$login'",$db);
      $res = mysql_fetch_array($result);
      if($password == $res['password'])
      {
        switch ($res['id'])
        {
          case '1':
            $_SESSION['id'] = 1;
            header("Location: /admin.php");
            exit;
            break;
        }
      }
      else
      {
          header("Location: sign_up.php");
          exit;
      }
  }
  else
  {
    header("Location:sign_up.php");
    exit;
  }

 ?>
