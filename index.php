<?php
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body><br />

<div align="center">
<span class="head"><img src="nittelogo.png" width="50%" /></span>
<hr class="hr" />
<br />
<br />
<span class="subhead"><marquee>SEMISTER END EXAMINATION RESULTS-JULY 2022</marquee></span>
<br />
<br />
<br />
<form method="post" action="viewResult.php">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels"><b>USN: </b><input type="text" required="required" name="usn" class="fields" size="15" placeholder="Enter Your USN." /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="SUBMIT" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="register.php" class="link">Student Register</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="faculty.php" class="link">Faculty Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="registerFaculty.php" class="link">Faculty Registration</a>
</div>
</body>
</html>