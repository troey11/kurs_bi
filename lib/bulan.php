<?php function convert_bulan($m) { 
$bulan=$m; 
Switch
($bulan)
{
case "January" : $bulan="January"; Break; 
case "Februari" :$bulan="February"; Break; 
case "Maret" : $bulan="March"; Break; 
case "April" :$bulan="April"; Break; 
case "Mei" : $bulan="May"; Break;
 case "Juni" :$bulan="June"; Break; 
 case "Juli" : $bulan="July"; Break; 
 case "Agustus" :$bulan="August"; Break; 
 case "September" : $bulan="September"; Break; 
 case"Oktober" : $bulan="October"; Break; 
 case "November" : $bulan="November"; Break;
case "Desember" : $bulan="December"; Break; } 
return $bulan; } 

//echo convert_bulan("Juni");

 ?>