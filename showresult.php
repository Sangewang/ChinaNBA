<?php
require_once('nba_entrance.php');
require_once("db_connect.php");
require_once("showimg.php");
session_start();
$username = $_SESSION['valid_user'];
$team     = $_POST['teamVote'];
$player   = $_POST['playVote'];
/*
echo "current user is $username <br/>";
echo "You choose team is $team <br/>";
echo "You choose play is $player <br/>";
*/
$db_conn = db_connect();

$query = "select * from NBAVoteTB where username = '".$username."'";

$result = $db_conn->query($query);
try
{
  //filled_out($_POST);
  if(isset($team) and isset($player))
  {
    $query = "insert into  NBAVoteTB values ('".$username."','".$team."','".$player."')";

    $result = $db_conn->query($query);

    if(!$result)
    {
      throw new Exception("insert data into db error!");
    }
  }
}
catch(Exception $e)
{
  echo $e->getMessage();
}
display_vote_result();
/*
$array_vote = array();
$array_vote['Cleveland Cavaliers'] = 0;
$array_vote['Golden State Warriors'] = 0;
$array_vote['Lebron James'] = 0;
$array_vote['Kyrie Irving'] = 0;
$array_vote['Kevin Love'] = 0;
$array_vote['Kevin Durant'] = 0;
$array_vote['Stephen Curry'] = 0;
$array_vote['Klay Thompson'] = 0;

$query = "select * from NBAVoteTB";

$result = $db_conn->query($query);

while($row = $result->fetch_object())
{
  echo "TB team is ".$row->champteam."<br/>";
  echo "TB play is ".$row->bestplayer."<br/>";
  $array_vote[$row->champteam]++;
  $array_vote[$row->bestplayer]++;
}

foreach($array_vote as $key => $value)
{
  echo "$key has vote $value <br>";
}
*/

?>


