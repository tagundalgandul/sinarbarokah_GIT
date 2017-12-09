<?php
#Pie Chart
require '../../conn/connection.php';

$result = mysql_query("SELECT *,
		
	  	count(id_jurusan) as total, 
  			sum(if(id_jurusan='TKJ',1,0)) AS tkj, 
  			sum(if(id_jurusan='TKR',1,0)) AS tkr,
  			sum(if(id_jurusan='Akuntansi',1,0)) AS akn
 	FROM pendaftaran JOIN kartu_peserta USING (no_registrasi)
  	where status='Lulus' group by id_jurusan");
#$result = mysql_query("SELECT name, val FROM web_marketing");

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Prensentase';
//$rows['innerSize'] = '50%';
while ($r = mysql_fetch_array($result)) {
    $rows['data'][] = array('Jurusan '.$r['id_jurusan'].'"', $r['total']);    
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


