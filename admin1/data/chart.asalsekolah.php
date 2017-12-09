<?php
#Pie Chart
require '../../conn/connection.php';

$result = mysql_query("SELECT *,
		avg(ipa)as ipa,
	 	avg(b_inggris) as bing,
	  	avg(b_indo) as bindo,
	   	avg(matematika) as mtk ,
	   	avg(ipa+b_indo+b_inggris+matematika/4) as tot,
	  	count(asal_sekolah) as total, 
  			sum(if(id_jurusan='TKJ',1,0)) AS tkj, 
  			sum(if(id_jurusan='TKR',1,0)) AS tkr,
  			sum(if(id_jurusan='Akuntansi',1,0)) AS akn
 	FROM pendaftaran JOIN kartu_peserta USING (no_registrasi)
  	where status='Lulus' group by asal_sekolah");
#$result = mysql_query("SELECT name, val FROM web_marketing");

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Prensentase';
//$rows['innerSize'] = '50%';
while ($r = mysql_fetch_array($result)) {
    $rows['data'][] = array('SEKOLAH '.$r['asal_sekolah'].'"', $r['total']);    
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


