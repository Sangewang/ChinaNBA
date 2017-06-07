<?php
require_once('nba_entrance.php');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwd2  = $_POST['passwd2'];

session_start();

try
{
  if(!filled_out($_POST))
  {
    throw new Exception("You have not filled the form out correctly - please go back and try again!");
  }

  if(!valid_email($email))
  {
    throw new Exception("This is a not valid email address,please go back and try again!");
  }

  if(strcmp($password,$passwd2)!=0)
  {
    throw new Exception("The password you entered do not match - please go back and try again!");
  }

  if(strlen($password)<6 || strlen($password)>16)
  {
    throw new Exception("Your password must between 6 and 16 characters - please go back and try again!");
  }

  register($username,$password,$email);

  $_SESSION['valid_user'] = $username;

  do_html_header('Successful register!');
  
  do_html_url('member.php',"Go to Vote page");

  do_html_footer();
}
catch(Exception $e)
{
  do_html_header('Problem');
  echo $e->getMessage();
  do_html_footer();
  exit;
}


?>
