<?php
$connect_error = 'Sorry we\'re experiencing connection problems.';
mysql_connect('localhost', 'BradUser', 'zlackaPachaMacha') or die($connect_error);
mysql_select_db('lr') or die ($connect_error);
?>