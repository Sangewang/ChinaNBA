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
  <td><input type="text" name="password"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" name="login" value="login"></td>
</tr>
<tr>
  <td colspan="2"><a href="getpassword.php">Forget your password?</a></td>
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
?>
