<?
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime; 

mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("intranet") or die(mysql_error());

$c = 0;

while($c < 500000){

	$ipusuario = $_SERVER["REMOTE_ADDR"];
	$maisinfo = $_SERVER["HTTP_USER_AGENT"];
	$pagina = $_SERVER["REQUEST_URI"];
	$data = strtotime(date("Y-m-d H:i:s"));

	mysql_query("INSERT INTO stats_geral (ip, pagina, maisinfo, data) VALUES ('$ipusuario', '$pagina', '$maisinfo', '$data')") or die(mysql_error());

	$c = $c + 1;

}
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "Carregado em ".$totaltime." segundos."; 
?>
