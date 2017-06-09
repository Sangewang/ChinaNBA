<?php
require_once("db_connect.php");
session_start();
$username = $_SESSION['valid_user'];
$team     = $_POST['teamVote'];
$player   = $_POST['playVote'];

echo "current user is $username <br/>";
echo "You choose team is $team <br/>";
echo "You choose play is $player <br/>";

$db_conn = db_connect();

$query = "insert into  NBAVoteTB values ('".$username."','".$team."','".$player."')";

$result = $db_conn->query($query);

if(!$result)
{
  throw new Exception("insert data into db error!");
}
else
{
  echo "Insert DB Successful!<br>";
}


?>
