<?php
require_once("nba_entrance.php");
require_once("db_connect.php");
function display_vote_result()
{
  $db_conn = db_connect();

  /*************************************************************************
    2.Initial calculations for graph
  **************************************************************************/
  //set up contents
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  //echo $DOCUMENT_ROOT."<br>";
  $width = 500;
  $left_margin = 100;
  $right_margin = 50;
  $bar_height = 40;
  $bar_spacing = $bar_height/2;
  $font = $DOCUMENT_ROOT.'/NBAVoteSystem/ARIAL.TTF';
  $title_size = 16;
  $main_size = 12;
  $small_size = 12;
  $text_indet = 10;
  $x = $left_margin + 60;
  $y = 50;
  $bar_unit = ($width-$x-$right_margin)/100;
  $height = ($bar_height + $bar_spacing) * (8) + 50; 

  /*************************************************************************
    3.Set Up Base Image
  **************************************************************************/
  //create a blank canvas
  $im = imagecreatetruecolor($width,$height);

  $white = imagecolorallocate($im,255,255,255);
  $blue  = imagecolorallocate($im,0,64,128);
  $black = imagecolorallocate($im,0,0,0);
  $pink  = imagecolorallocate($im,255,78,243);
  $red   = imagecolorallocate($im,255,0,0);

  $text_color = $black;
  $percent_color = $black;
  $bg_color = $white;
  $line_color = $black;
  $team_color = $blue;
  $number_color = $pink;
  $play_color = $red;
  imagefilledrectangle($im,0,0,$width,$height,$bg_color);
  imagerectangle($im,0,0,$width-1,$height-1,$line_color);

  $title = "NBA Chamption & MVP Vote Results";
  $title_dimensions = imagettfbbox($title_size,0,$font,$title);
  /*
  for($i=0;$i<=7;$i++)
  {
    echo "$title_dimensions[$i] ";
  }*/


  $title_length = $title_dimensions[2] - $title_dimensions[0];
  $title_height = abs($title_dimensions[7] - $title_dimensions[1]);
  $title_above_line = abs($title_dimensions[7]);
 
  $title_x = ($width - $title_length)/2;
  $title_y = ($y - $title_height)/2 + $title_above_line;
  /*echo "title_above_line = $title_above_line<br>";
  echo "title_x = $title_x<br>";
  echo "title_y = $title_y<br>";*/
  imagettftext($im,$title_size,0,$title_x,$title_y,$text_color,$font,$title);
  imageline($im,$x,$y-5,$x,$height-15,$line_color);
 
  /*************************************************************************
    4.Draw data into graph
  **************************************************************************/
  
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
   // echo "TB team is ".$row->champteam."<br/>";
   // echo "TB play is ".$row->bestplayer."<br/>";
    $array_vote[$row->champteam]++;
    $array_vote[$row->bestplayer]++;
  }

  foreach($array_vote as $key => $value)
  {
//    echo "$key has vote $value <br>";
    $total += $value;
  }
  $total_team_votes = $array_vote['Cleveland Cavaliers'] + $array_vote['Golden State Warriors'];
  //while(list($key,$value) = each($array_vote))
  //{
  //  echo "$value ";
  //  $total += $value;
  //}
  $total_play_votes = $total - $total_team_votes;
  //echo "$total_play_votes  => $total_team_votes <br/>";
  //while(list($key,$value) = each($array_vote))
  foreach($array_vote as $key => $value)
  {
    if($key == 'Cleveland Cavaliers' || $key == 'Golden State Warriors')
    {
      $total_result = $total_team_votes;
    }
    else
    {
      $total_result = $total_play_votes;
    }
    if($total_team_votes > 0)
    {
     // echo "$key => $value  => $total_result <br/>";
      $percent = intval(($value/$total_result)*100);
    }
    else
    {
      $percent = 0;
    }

    $percent_dimensions = imagettfbbox($main_size,0,$font,$percent.'%');
    $percent_length = $percent_dimensions[2] - $percent_dimensions[0];
    imagettftext($im,$main_size,0,$width-$percent_length-$text_indent,$y+($bar_height/2),$percent_color,$font,$percent.'%');

    $bar_length = $x + ($percent * $bar_unit);

    imagefilledrectangle($im,$x,$y-2,$bar_length,$y+$bar_height,$team_color);

    imagettftext($im,$small_size,0,$text_indent,$y+($bar_height/2),$text_color,$font,"$key");

    imagerectangle($im,$bar_length+1,$y-2,($x+(100*$bar_unit)),$y+$bar_height,$line_color);

    imagettftext($im,$small_size,0,$x+(100*$bar_unit)-50,$y+($bar_height/2),$number_color,$font,$value.'/'.$total_team_votes);

    $y += $bar_height + $bar_spacing;
    
  }


  Header('Content-type:image/png');
  imagepng($im);

  imagedestroy($im);
}
?>
