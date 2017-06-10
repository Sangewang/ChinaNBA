<?php
  session_start();
?>
<?php
function do_html_header($title)
{//show web header
?>

<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php echo $title ?></title>
  <style>
    body { font-family:Arial, Helvetica, sans-serif; font-size: 13px }
    li,td { font-family:Arial , Helvetica, sans-serif; font-size: 13px }
    hr { color: #3333cc; width=300px; text-align: left }
    a { color: #000000 }
    div {float: left; padding:10px  }
  </style>
</head>
<body>
  <img src="nba.jpeg" alt="nba logo" border="0"
    align="left" valign="bottom" height="55" width="97">
  <h1>NBA Vote System</h1>
  <hr />
<?php
  if($title)
  {
    do_html_heading($title);
  }
}

function do_html_heading($title)
{
?>
  <h2><?php echo $title?></h2>

<?php
}
function display_site_info()
{//show site basic info
?>
<ul>
<li>This is a NBA vote system</li>
<li>You can choose what u like</li> 
</ul>

<?php
}

function display_login_form()
{// show register table
?>
<a href="register_form.php">Not a member?</a><br />
<form action="member.php" method="post">
<table border="0" bgcolor="#cccccc">
<tr>
  <td>Username:</td>
  <td><input type="text" name="username"></td>
</tr>
<tr>
  <td>Password:</td>
  <td><input type="password" name="password"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" name="login" value="login"></td>
</tr>
<tr>
  <td colspan="2"><a href="forgetpassword_form.php">Forget you password?</a></td>
</tr>
<tr>
  <td colspan="2"><a href="resetpassword_form.php">Change you password?</a></td>
</tr>
</table>
</form>
<?
}
function do_html_footer()
{
?>
  </body>
  </html>
<?php
}

function display_form_regstration()
{
?>
<form action="register_new.php" method="post">
<table border="0" bgcolor="#cccccc">
<tr>
  <td>Email Address:</td>
  <td><input type="text" name="email" maxlength="100" size="30"></td>
</tr>
<tr>
  <td>Username:</td>
  <td><input type="text" name="username" maxlength="16" size="16"></td>
</tr>
<tr>
  <td>Password:</td>
  <td><input type="password" name="password" maxlength="16" size="16"></td>
</tr>
<tr>
  <td>Confirm Password:</td>
  <td><input type="password" name="passwd2" maxlength="16" size="16"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Register"></td>
</tr>
</table>
</form>

<?php
}
function do_html_url($url,$name)
{
?>
<a href=<?php echo $url?>><?php echo $name?></a>
<?php
}

function display_vote_menu()
{
?>
<form action="showresult.php" method="post">

<div>
  <a href="showCavl.php"><img src="CAVL.jpg" alt="calv" width="150" height="120"></a><br/>
  <input type="radio" name="teamVote" value="Cleveland Cavaliers">Cleveland Cavaliers
</div>
<div>
  <a href="showGolden.php"><img src="golden.jpg" alt="golden" width="150" height="120" ></a><br/>
  <input type="radio" name="teamVote" value="Golden State Warriors">Golden State Warriors
</div>

</br></br></br></br></br></br></br></br></br></br></br></br></br></hr>

<div>
  <a href="showLBJ.php"><img src="LBJ.jpg" alt="Lebron James" width="150" height="120"></a><br/>
  <input type="radio" name="playVote" value="Lebron James">Lebron James
</div>

<div>
  <a href="showKyrie.php"> <img src="ouwen.jpg" alt="Kyrie Irving" width="150" height="120"></a><br/>
  <input type="radio" name="playVote" value="Kyrie Irving">Kyrie Irving
</div>

<div>
  <a href="showLove.php"><img src="lefu.jpg" alt="Kevin Love" width="150" height="120"></a><br/>
  <input type="radio" name="playVote" value="Kevin Love">Kevin Love
</div>

<div>
  <a href="showDurant.php"><img src="kd.jpg" alt="Kevin Durant" width="80" height="120"></a><br/>
  <input type="radio" name="playVote" value="Kevin Durant">Kevin Durant
</div>

<div>
  <a href="showCurry.php"><img src="curry.jpg" alt="Stephen Curry" width="100" height="120"></a><br/>
  <input type="radio" name="playVote" value="Stephen Curry">Stephen Curry
</div>
<div>
  <a href="showKlay.php"><img src="kelai.jpg" alt="Klay Thompson" width="120" height="120"></a><br/>
  <input type="radio" name="playVote" value="Klay Thompson">Klay Thompson
</div>
</br></br></br></br></br></br></br></br></br></br></br></br></br></hr>
<input type=submit name="submit" value="submit">
</form>
<?php
}
function display_resetpasswd_form()
{
?>
<form action="resetpassword.php" method="post">
<table border="0" bgcolor="cccccc">
<tr>
  <td>Username:</td>
  <td><input type="text" name="username"></td>
</tr>
<tr>
  <td>Password:</td>
  <td><input type="password" name="password"></td>
</tr>
<tr>
  <td>Confirm Password:</td>
  <td><input type="password" name="passwd2"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value="submit"></td>
</tr>
</table>
</form>
<?php
}

function display_getpasswd_form()
{
?>
<form action = "forgetpassword.php" method="post">
<table>
<tr>
  <td>Please Input Your Name:</td>
  <td><input type="text" name="username"></td>
</tr>
<tr><td><input type="submit" value="submit"></td></tr>
</table>
</form>
<?php
}
?>
