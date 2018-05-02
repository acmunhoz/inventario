<!DOCTYPE html>
<head>
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Inventario</title>

</head>		
<body>

<?php include'header.html';?>

<div id="form_altera">
<?php
	
include 'db_connect.php';



//Altera o usuário
if (!empty($_GET['id_pc']) && !empty($_GET['nome'])):

	$id_pc=$_GET['id_pc'];
	$nome=$_GET['nome'];

	echo'<form method="get" action="altera.php">
	IP do notebook: <input type="text" name="id_pc" value="#'.$id_pc.'"><br />
	Nome do usuário: <input type="text" name="nome" value="'.$nome.'"><br><input class="btn_box" type="submit" value="Alterar Dados"><a class="btn_cancel" href="./notebook.php">Cancelar</a></form><br />';
endif;


?>
</div>

<div id="lista_used">
	
<?php

//Consulta os equipamentos que estão sendo utilizados

$consulta_used="SELECT id_pc,nome_func,modelo FROM inventario.computadores WHERE nome_func NOT LIKE'Disponivel%' ORDER BY id_pc";

$query = $mysqli->query($consulta_used);


echo '<form action="altera_note.php" method="get"><table id="btn_alterar" align="center" border="0">';
echo '<tr><td>ID-NOTEBOOK</td><td>NOME DE USUARIO</td><td>MODELO</td><td>OPÇOES</td></tr>';	
echo '<br />';

while ($dados = $query->fetch_array()) {

	echo'<tr><td><input type="text" value="'.$dados['id_pc'].'" name="id_pc" readonly></td>';
	echo'<td><input type="text" value="'.$dados['nome_func'].'" name="nome" readonly></td>';
	echo'<td><input type="text" size="80" value="'.$dados['modelo'].'" name="modelo" readonly></td>';
	
	echo'<td><a id="btn_alterar" href="?id_pc='.str_replace('#','',$dados['id_pc']).'&nome='.$dados['nome_func'].'">Alterar</a></td></tr>';

}
echo '</table></form>';
?>
</div>

<h2 style="text-align: center;">Notebooks disponíveis</h2>

<div id="lista_free">

<?php

//Equipamentos que estão em estoque

echo'<br>';
$consulta_free="SELECT id_pc,nome_func,modelo FROM inventario.computadores WHERE nome_func LIKE'Disponivel%' ORDER BY id_pc";

$query = $mysqli->query($consulta_free);

echo '<form action="altera_note.php" method="get"><table id="btn_alterar" align="center" border="0">';
echo '<tr><td>ID-NOTEBOOK</td><td>NOME DE USUARIO</td><td>MODELO</td><td>OPÇOES</td></tr>';	
echo '<br />';

while ($dados = $query->fetch_array()) {

	echo'<tr><td><input type="text" value="'.$dados['id_pc'].'" name="id_pc" readonly></td>';
	echo'<td><input type="text" value="'.$dados['nome_func'].'" name="nome" readonly></td>';
	echo'<td><input type="text" size="80" value="'.$dados['modelo'].'" name="modelo" readonly></td>';
	
	echo'<td><a id="btn_alterar" href="?id_pc='.str_replace('#','',$dados['id_pc']).'&nome='.$dados['nome_func'].'">Alterar</a></td></tr>';

}
echo '</table></form>';
?>
</div>

</body>
</html>