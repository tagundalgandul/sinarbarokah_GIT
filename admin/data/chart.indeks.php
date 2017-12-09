<?php
#Pie Chart
require '../../conn/connection.php';

$result = mysql_query("SELECT *,
		
	  	count(indeks) as total
  			
 	FROM pendaftaran JOIN kartu_peserta USING (no_registrasi)
  	where status='Lulus' group by indeks");
#$result = mysql_query("SELECT name, val FROM web_marketing");

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Prensentase';
//$rows['innerSize'] = '50%';
while ($r = mysql_fetch_array($result)) {
    $rows['data'][] = array(' '.$r['indeks'].'"', $r['total']);    
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


