
<?php 
/**
* Curl Website Bank di Indonesia
*
* @author wawan kurniawan
* @email : wawan.kurniawan@dovechem.co.id

*
*/
// 

function fungsiCurl($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
	 curl_setopt($data, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
$url = fungsiCurl('http://www.bi.go.id/id/moneter/informasi-kurs/transaksi-bi/Default.aspx');
$url2 = fungsiCurl('http://www.bi.go.id/id/moneter/informasi-kurs/referensi-jisdor/Default.aspx');
$data = implode('', file("http://www.bi.go.id/id/moneter/informasi-kurs/transaksi-bi/Default.aspx"));
$pecah = explode('<table class="table1" cellspacing="0" rules="all" border="1" id="ctl00_PlaceHolderMain_biWebKursTransaksiBI_GridView1" style="border-collapse:collapse;">', $url);
$pecah2 = explode ('<div id="KodeSingkatan" title="Kode Singkatan" style="display: none;">',$pecah[1]);
$pecah_ref = explode('<table class="table1">', $url2);
$pecah_ref2 = explode('<table class="table2" style="margin-bottom: 20px !important; margin-top: 20px !important">', $pecah_ref[1]);



// pisahkan jadi perbaris
$data = str_replace("</tr>", "</tr>\n", $data);

// sesuaikan data
$data = str_replace("Update Terakhir\r\n", "Update Terakhir", $data);
// ambil updatenya
preg_match("|Update Terakhir(.*)|i", $data, $hasil);
$update_terakhir = trim($hasil[1]);
echo $update_terakhir;
//header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
//header("Content-Disposition: attachment;Filename=hasil_sounding.xls");
//application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
//header('Content-Type: text/csv; charset=utf-8');
//header('Content-Disposition: attachment; filename=data.csv');	

echo '			<table border="1">';
	//echo $a=trim(strip_tags($pecah2[0]));
//print_r ($pecah_ref2[0]);
print_r ($pecah2[0]);	

$link = $pecah2[0];

$html = file_get_contents($link);
$doc = new DOMDocument();
$doc->loadHTML($html);
$xpath = new DOMXPath($doc);
$tables = $doc->getElementsByTagName('table');

$nodes  = $xpath->query('.//tr/td/a/b', $tables->item(0));
var_dump($nodes->item(0)->nodeValue);

echo "</table>";


 
?>