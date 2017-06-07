<?php
function db_connect()
{
  $db_conn = new mysqli('localhost','NBA','NBA','NBAVoteDB');
  if(!$db_conn)
  {
    throw new Exception("Could not connect to database server");
  }
  else
  {
    return $db_conn;
  }
}
?>
