<?php

//database connection details
$connect = mysql_connect('localhost','root','');

//your database name
mysql_select_db('adsi',$connect);

//selecting records from the table
$query = "SELECT * FROM pendaftaran join kartu_peserta using(no_registrasi) where status='Lulus' limit 50";
$header = '';
$data ='';

$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
$fields = mysql_num_fields ( $export );

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}

while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";

?>