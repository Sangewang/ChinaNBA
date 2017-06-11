<?php
require_once("nba_entrance.php");
require_once("db_connect.php");

$username = $_POST['username'];

$db_conn = db_connect();

$query = "select * from NBAUserTB where username = '".$username."'";
//"delete from NBAUserTB where username = '".$username."'";
//"alter table NBAUserTB modify username char(100) not null";
//"alter table NBAUserTB add sex char(20) not null after email";
//"alter table NBAUserTB drop sex";
$result = $db_conn->query($query);

try
{
  if(!$result || $result->num_rows <=0 )
  {
    throw new Exception("serach username failed");
    exit;
  }
}
catch(Exception $e)
{
  echo $e->getMessage();
}

while($rows = $result->fetch_object())
{
  echo $rows->username." ".$rows->password." ".$rows->email."<br/>";
  $email = $rows->email;
}

$new_password = get_random_word(6,13);
echo "$new_password <br/>";
$rand_num = rand(0,999);
echo "$rand_num <br/>";
$new_password .= $rand_num;
echo "$new_password <br/>";
$query = "update NBAUserTB set password = sha1('".$new_password."') where username = '".$username."'";
$result = $db_conn->query($query);
if(!$result)
{
  throw new Exception("Could not Get Password");
  exit;
}

$from = "From:NBA@support.com \r\n";
$mesg = "Your NBAVoteSystem Password has been changed to".$new_password. "\r\n";
if(mail($email,'NBAVoteSystem Login Information',$mesg,$from))
{
  return true;
}
else
{
  //throw new Exception("Could not send Email<br/>");
  echo "check your network<br/>";
}
?>
<?php
function get_random_word($min_length , $max_length)
{
  $word = ' ';
  $dictionary = '/usr/share/dict/words';
  $fp = fopen($dictionary,'r');
  if(!$fp)
  {
    echo "can't open file<br/>";
    return false;
  }

  $size = filesize($dictionary);

  $rand_location = rand(0,$size);

  fseek($fp,$rand_location);

  while((strlen($word)<$min_length) || (strlen($word)>$max_length) || (strstr($word,"'")))
  {
    if(feof($fp))
    {
      fseek($fp,0);
    }
    $word = fgets($fp , 80);
    $word = fgets($fp , 80);
  }
  $word = trim($word);
  return $word;
}
?>


