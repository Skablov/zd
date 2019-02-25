<?php
  include('bd.php');

  switch ($_POST['command'])
  {
    case 'read':
      $result = mysql_query("SELECT * FROM train", $db);
      $r = array();
      while($res = mysql_fetch_array($result))
      {
        array_push($r, $res['id'], $res['num_train'], $res['date_d'], $res['date_a'], $res['places'],$res['time_a'], $res['dep'], $res['ari']);
      }
      echo json_encode($r);
      break;
    case 'pas':
      $name = $_POST['name'];
      $born = $_POST['born'];
      $opt = $_POST['opt'];
      $result = mysql_query("SELECT places FROM train WHERE num_train='$opt'", $db); // смотрим свободные места в выбранном поезде
      $res = mysql_fetch_array($result);
      if(empty($res['places']))
      {
        echo 'Простите мест на данный рейс нет :('; // если мест нет :(
      }
      else
      {
        $places = $res['places'] - 1;
        $result = mysql_query("UPDATE train SET places='$places' WHERE num_train='$opt'", $db); // обновляем кол-во мест
        $re = mysql_query("INSERT INTO pas (num_train, name, born) VALUES ('$opt', '$name', '$born')", $db); // заполняем таблицу client в БД
        echo 'Успешно!';
      }
      break;
    case 'del':
      $id = $_POST['id'];
      $result = mysql_query("DELETE FROM train WHERE id='$id'", $db);
      echo 'Успешно! БД обновлена!';
      break;
    case 'client':
      $result = mysql_query('SELECT * FROM pas', $db);
      $r = array();
      while($res = mysql_fetch_array($result))
      {
        array_push($r, $res['id'], $res['num_train'], $res['name'], $res['born']);
      }
      echo json_encode($r);
      break;
    case 'add':
      $num = $_POST['num'];
      $d_dep = $_POST['d_dep'];
      $d_ari = $_POST['d_ari'];
      $time = $_POST['time'];
      $places = $_POST['places'];
      $dep = $_POST['dep'];
      $ari = $_POST['ari'];
      $result = mysql_query("INSERT INTO train (num_train, date_d, date_a, places, time_a, dep, ari) VALUES ('$num','$d_dep','$d_ari', '$places', '$time', '$dep', '$ari')", $db);
      echo 'БД успешно обновлена!';
      break;
  }

 ?>
