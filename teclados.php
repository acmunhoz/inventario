<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Inventario</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	
	$(document).ready(function() {
	$(function() {
	$("#form_altera").dialog({
	autoOpen: false
	});
	$("#btn_alterar").on("click", function() {
	$("#form_altera").dialog("open");
	});
	});
	
	</script>

</head>		
<body>

<?php include'header.html';?>

<div id="form_altera">
<?php
	
include 'db_connect.php';



//Altera o usuário
if (!empty($_GET['id_teclado']) && !empty($_GET['nome'])):

	$id_teclado=$_GET['id_teclado'];
	$nome=$_GET['nome'];

	echo'<form method="get" action="altera.php">
	IP do notebook: <input type="text" name="id_teclado" value="T'.$id_teclado.'"><br />
	Nome do usuário: <input type="text" name="nome" value="'.$nome.'"><br><input class="btn_box" type="submit" value="Alterar Dados"><a class="btn_cancel" href="./teclados.php">Cancelar</a></form><br />';
endif;


?>
</div>

<div id="lista_used">
	
<?php

//Consulta os equipamentos que estão sendo utilizados

$consulta_used="SELECT id_teclado,nome_func,modelo FROM inventario.teclados WHERE nome_func NOT LIKE'Disponivel%' ORDER BY id_teclado";

$query = $mysqli->query($consulta_used);


echo '<form action="altera_teclado.php" method="get"><table id="btn_alterar" align="center" border="0">';
echo '<tr><td>ID-NOTEBOOK</td><td>NOME DE USUARIO</td><td>MODELO</td><td>OPÇOES</td></tr>';	
echo '<br />';

while ($dados = $query->fetch_array()) {

	echo'<tr><td><input type="text" value="'.$dados['id_teclado'].'" name="id_teclado" readonly></td>';
	echo'<td><input type="text" value="'.$dados['nome_func'].'" name="nome" readonly></td>';
	echo'<td><input type="text" size="80" value="'.$dados['modelo'].'" name="modelo" readonly></td>';
	
	echo'<td><a id="btn_alterar" href="?id_teclado='.str_replace('T','',$dados['id_teclado']).'&nome='.$dados['nome_func'].'">Alterar</a></td></tr>';

}
echo '</table></form>';
?>
</div>

<h2 style="text-align: center;">Teclados disponíveis</h2>

<div id="lista_free">

<?php

//Equipamentos que estão em estoque

echo'<br>';
$consulta_free="SELECT id_teclado,nome_func,modelo FROM inventario.teclados WHERE nome_func LIKE'Disponivel%' ORDER BY id_teclado";

$query = $mysqli->query($consulta_free);

echo '<form action="altera_teclado.php" method="get"><table id="btn_alterar" align="center" border="0">';
echo '<tr><td>ID-NOTEBOOK</td><td>NOME DE USUARIO</td><td>MODELO</td><td>OPÇOES</td></tr>';	
echo '<br />';

while ($dados = $query->fetch_array()) {

	echo'<tr><td><input type="text" value="'.$dados['id_teclado'].'" name="id_teclado" readonly></td>';
	echo'<td><input type="text" value="'.$dados['nome_func'].'" name="nome" readonly></td>';
	echo'<td><input type="text" size="80" value="'.$dados['modelo'].'" name="modelo" readonly></td>';
	
	echo'<td><a id="btn_alterar" href="?id_teclado='.str_replace('MT','',$dados['id_teclado']).'&nome='.$dados['nome_func'].'">Alterar</a></td></tr>';

}
echo '</table></form>';
?>
</div>

</body>
</html>