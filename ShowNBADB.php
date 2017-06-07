<?php
require_once("db_connect.php");

$db_conn = db_connect();
if(!$db_conn)
{
  throw new Exception("Could not connect DB");
}

$query = "select * from NBAUserTB";

$result = $db_conn->query($query);

if(!$result)
{
  throw new Exception("Could not query TB");
}

while($output = $result->fetch_object())
{
  echo $output->username.", ".$output->email.",".$output->password."<br/>";
  //echo $name;
  //echo " Password =".$output["password"];
  //echo " Email = $output[email] <br/>";
}



?>
