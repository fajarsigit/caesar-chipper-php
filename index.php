<?php
/*
 *      index.php
 *      
 *      Copyright 2011 Ahmad Zafrullah Mardiansyah <zaf@zaf-laptop>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
 
include "convert.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Kriptografi : Caesar Cipher </title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.18" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
	a:link {color: #000000; text-decoration: none}
	a:visited {color: #000000; text-decoration: none}
	a:hover {color: #FF0000; text-decoration: underline}
	</style>
	<script type="text/javascript">
	function SelectAll(id){
		document.getElementById(id).focus();
		document.getElementById(id).select();
	}
	function Info(){
		alert("Original code by :"+'\n\n'+"Ahmad Zafrullah Mardiansyah");
	}
	function InfoCaesar(){
		alert("Key hanya berupa kombinasi angka, Default Caesar Cipher menggunakan Key : 3,"+'\n'+"dan plan text tidak boleh mengandung angka!");
	}
	function InfoVigenere(){
		alert("Key hanya berupa kombinasi kata, tidak boleh mengandung angka,"+'\n'+"dan plan text tidak boleh mengandung angka!");
	}
	</script>
</head>

<body>
	<header>
	<h1>Simple Cipher Implementation with PHP</h1>
	<h4><a onclick="Info()"></a></h4>
	</header>
	<div class="wrap">
	<div class="conteudo">
	<table width="600" align="center">
	<tr><td width="50%" valign="top">
	<fieldset>
	<legend><b>Caesar</b></legend>
	<form action="" method="post" >
	<input type="text" name="key_caesar" id="key_caesar" value="3" onclick="SelectAll('key_caesar')" />
	<input type="submit" value="?" onclick="InfoCaesar()" /><br/>
	<textarea rows="4" name="plantext_caesar" id="plantext_caesar" cols="33" onclick="SelectAll('plantext_caesar')" >plan text...</textarea><br/>
	<input type="submit" name="encrypt_caesar" value="Encrypt" /><input type="submit" name="decrypt_caesar" value="Decrypt" /><input type="reset" value="Reset" />
	</form>
	</fieldset>
	</td><td valign="top" colspan="3">
	<fieldset>
	<legend><b>Result</b></legend>
	<form action="simpan.php" method="post">
	<?php
	//----------------------------------------------------------------//
	// caesar														  //
	//----------------------------------------------------------------//
		if((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['encrypt_caesar'])){
			$key=$_POST['key_caesar'];
			$plantext=$_POST['plantext_caesar'];
			$split_key=str_split($key);
			$i=0;
			$split_chr=str_split($plantext);
			while ($key>52){
				$key=$key-52;
			}
			foreach($split_chr as $chr){
				if (char_to_dec($chr)!=null){
					$split_nmbr[$i]=char_to_dec($chr);
				} else {
					$split_nmbr[$i]=$chr;
				}
				$i++;
			}
			echo '<textarea rows="4" name="result" id="result" cols="33" onclick="SelectAll(\'result\')" >';
			foreach($split_nmbr as $nmbr){
				if (($nmbr+$key)>52){
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char(($nmbr+$key)-52);
					} else {
						echo $nmbr;
					}
				} else {
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char($nmbr+$key);
					} else {
						echo $nmbr;
					}
				}
			}
			echo '</textarea><br/>';
		} else if ((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['decrypt_caesar'])){
			$key=$_POST['key_caesar'];
			$plantext=$_POST['plantext_caesar'];
			$i=0;
			$split_chr=str_split($plantext);
			while ($key>52){
				$key=$key-52;
			}
			foreach($split_chr as $chr){
				if (char_to_dec($chr)!=null){
					$split_nmbr[$i]=char_to_dec($chr);
				} else {
					$split_nmbr[$i]=$chr;
				}
				$i++;
			}
			echo '<textarea rows="4" name="result" id="result" cols="33" onclick="SelectAll(\'result\')" >';
			foreach($split_nmbr as $nmbr){
				if (($nmbr-$key)<1){
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char(($nmbr-$key)+52);
					} else {
						echo $nmbr;
					}
				} else {
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char($nmbr-$key);
					} else {
						echo $nmbr;
					}
				}
			}
			echo '</textarea><br/>';
		
		
			
			echo '</textarea><br/>';

		} else {
			echo "result here...";
		}
	?>
	
	<input type="submit" value="Save">
	</form>
	</fieldset>
	</td></tr>
	</table>
	</div>
	</div>
<footer>
<small style="color:white">copyright &copy; 2015 ToniStark</small>
</footer>
</body>
</html>
