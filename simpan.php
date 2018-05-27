<html>
<head>
	<title>Kriptografi : Caesar Cipher</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php  
 /*  
 source: belajarwebpedia.com  
 */  
 $namafile = "encrypted.txt";  
 $isi      = trim($_POST['result']);  
 $file = fopen($namafile,"w");  
 fwrite($file,$isi);  
 fclose($file);  
 echo "<header>";
 echo "<h2>Result Encrypt Text</h2>";  
 echo "</header></br><br>";  
 echo "Result : <a href='$namafile'> Open (Encrypt Text)</a>";  
 ?>  
 </body>
 </html>