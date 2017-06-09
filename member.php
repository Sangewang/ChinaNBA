<?php
require_once('nba_entrance.php');
//check user and show menu
@session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password)
{
  try
  {
    login($username,$password);
    $_SESSION['valid_user'] = $username; 
  }
  catch(Exception $e)
  {
    do_html_header('Problem');
    echo "you could not logged in , please Log in First. ";
    do_html_url('login.php',Login);
    exit;
  }
}
  do_html_header('If you Have Vote ?');
  do_html_url('showresult.php','Go to check The vote Result');
  display_vote_menu();
  do_html_footer();



?>
