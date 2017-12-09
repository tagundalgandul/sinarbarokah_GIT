<?php
#Pie Chart
require '../../conn/connection.php';

$result = mysql_query("SELECT *,
		count(status) as total,
            sum(if(status='Lulus',1,0)) AS lulus, 
            sum(if(status='Tidak Lulus',1,0)) AS tdk
           
  			
 	FROM pendaftaran JOIN kartu_peserta USING (no_registrasi)
  	group by status");
#$result = mysql_query("SELECT name, val FROM web_marketing");

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Prensentase';
//$rows['innerSize'] = '50%';
while ($r = mysql_fetch_array($result)) {
    $rows['data'][] = array('Jumlah Siswa  '.$r['status'].'"', $r['total'], );    
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


