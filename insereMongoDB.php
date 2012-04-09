<?
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime; 

$m = new Mongo();
$db = $m->intranet;
$stats_geral = $db->stats_geral;

$c = 0;

while($c < 500000){

	$ipusuario = $_SERVER["REMOTE_ADDR"];
	$maisinfo = $_SERVER["HTTP_USER_AGENT"];
	$pagina = $_SERVER["REQUEST_URI"];
	$data = strtotime(date("Y-m-d H:i:s"));

	$obj = array( "ip" => "$ipusuario", "pagina" => "$pagina", "maisinfo" => "$maisinfo", "data" => "$data" );
	$stats_geral->insert($obj);

	$c = $c + 1;

}
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "Carregado em ".$totaltime." segundos."; 
?>
