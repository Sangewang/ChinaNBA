<?php
  require_once('db_connect.php');
  require_once('nba_entrance.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $passwd2  = $_POST['passwd2'];
  echo "Current User is $username <br/>";
  echo "You Password is $password <br/>";
  
  try
  {
    if(strcmp($password,$passwd2)!=0)
    {
      throw new Exception("Please Confirm your password!");
      exit;
    }
    $db_conn = db_connect();

    $query = "select * from NBAUserTB where username = '".$username."'";

    $result = $db_conn->query($query);

    if ($result->num_rows <= 0)
    {
      throw new Exception("Please Login First");
      exit;
    } 
  }
  catch(Exception $e)
  {
    echo $e->getMessage();
    echo "<br/>";
    do_html_url("login.php","Login");
  }
  $query = "update NBAUserTB set password = sha1('".$password."') where username = '".$username."'";

  $result = $db_conn->query($query);

  if(!$result)
  {
    echo "Modify The Password Failed , Please Try Again!<br/>";
  }
  else
  {
    echo "Modify The Password Succeed , Please Login Again <br/>";
    do_html_url("login.php","Login");
    
  }
  
?>
