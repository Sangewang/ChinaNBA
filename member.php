<?php
require_once('nba_entrance.php');
require_once('db_connect.php');
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

  $db_conn = db_connect();
  $query = "select * from NBAVoteTB where username = '".$username."'";
  $result = $db_conn->query($query);
  if($result->num_rows > 0)
  {
    do_html_header('You Have Already Vote');
    do_html_url('showresult.php','Please Go to check The vote Result');
    do_html_footer();
  }
  else
  {
    do_html_header("Please Vote First");
    display_vote_menu();
    do_html_footer();
  }


?>
