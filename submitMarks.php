<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$sem=$b['sem'];
if(!empty($_POST))
{
	$s1=$_POST['s1'];
	$s2=$_POST['s2'];
	$s3=$_POST['s3'];
	$s4=$_POST['s4'];
	$s5=$_POST['s5'];
	$usn=$_POST['usn'];
	if($s1==NULL || $s2==NULL || $s3==NULL || $s4==NULL || $s5==NULL || $usn==NULL)
	{
		//
	}
	else
	{
		$total=$s1+$s2+$s3+$s4+$s5;
		$per=($total*100)/100;
		if($per<=35)
		{
			$result="Fair";
		}elseif($per>=36 && $per<=50)
			{
				$result="Good";
			}
			elseif($per>=51 && $per<=70)
				{
					$result="Better";
				}
				else
				{
					$result="Best";
				}
				$sql=mysqli_query($al,"INSERT INTO marks(usn,sem,s1,s2,s3,s4,s5,total,percent,result) VALUES('$usn','$sem','$s1','$s2','$s3','$s4','$s5','$total','$per','$result')");
				if($sql)
				{
					$msg="Successfully Saved Marks";
				}
				else
				{
					$msg="Marks Already Submitted to this USN No.";
				}
	}
}
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
<span class="head"><b>NMAM INSTITUTE OF TECHNOLOGY NITTE</b></span>
<hr class="hr" />
<br />
<br />
<span class="subhead">Submit Marks</span>
<br />
<br />
<?php 
$x=mysqli_query($al,"SELECT * FROM subjects WHERE sem='$sem'");
$y=mysqli_fetch_array($x);
$m=mysqli_query($al,"SELECT * FROM students WHERE sem='$sem'");
?>
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">USN No. : </td><td>
<select name="usn" class="fields" style="background-color:#093d3d;" required>
<option value="" selected="selected" disabled="disabled">- - Select USN - -</option>
<?php
while($n=mysqli_fetch_array($m))
{
	?>
<option value="<?php echo $n['usn'];?>"><?php echo $n['usn'];?></option>
<?php } ?>
</select></td></tr>
<tr><td class="labels"><?php echo $y['s1'];?></td><td><input type="text" name="s1" class="fields" size="5" placeholder="50" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s2'];?></td><td><input type="text" name="s2" class="fields" size="5" placeholder="50" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s3'];?></td><td><input type="text" name="s3" class="fields" size="5" placeholder="50" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s4'];?></td><td><input type="text" name="s4" class="fields" size="5" placeholder="50" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['s5'];?></td><td><input type="text" name="s5" class="fields" size="5" placeholder="50" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="Submit" /></td></tr>
</table>
</form>
<br />
<br />
<br />
<a href="home.php" class="cmd">HOME</a>
</div>
</body>
</html>