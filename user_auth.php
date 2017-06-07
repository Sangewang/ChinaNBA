<?php
require_once("db_connect.php");

function register($username,$password,$email)
{
  $db_conn = db_connect();

  $query = "select * from NBAUserTB where username = '".$username."'";

  $result = $db_conn->query($query);
  if(!$result)
  {
    throw new Exception('Could not excute query');
  }

  if($result->num_rows > 0)
  {
    throw new Exception('The username is taken - go back and choose another one.');
  }

  $query = "insert into NBAUserTB values('".$username."',sha1('".$password."'),'".$email."')";

  $result = $db_conn->query($query);

  if(!$result)
  {
    throw new Exception('Could not register you in database - please try again later.');
  }
  return true;
}

function login($username,$password)
{
  $db_conn = db_connect();

  $query = "select * from NBAUserTB where username = '".$username."' and password = sha1('".$password."')";
  
  $result = $db_conn->query($query);
  
  if(!$result)
  {
    throw new Exception("You Could not login");
  }

  if($result->num_rows > 0)
  {
    return true;
  }
  else
  {
    throw new Exception("You could not login");
  }
}

?>
