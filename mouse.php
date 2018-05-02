<!DOCTYPE html>
<head>
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<title>Inventario</title>

	<link rel="stylesheet" type="text/css" href="style.css">

</head>		
<body>

<?php include'header.html';?>

<div id="form_altera">

<?php
	
include 'db_connect.php';



//Altera o usuário

if (!empty($_GET['id_mouse']) && !empty($_GET['nome'])):

	$id_mouse=$_GET['id_mouse'];
	$nome=$_GET['nome'];

	echo'<form method="get" action="altera.php">
	IP do notebook: <input type="text" name="id_mouse" value="M'.$id_mouse.'"><br />
	Nome do usuário: <input type="text" name="nome" value="'.$nome.'"><br><input class="btn_box" type="submit" value="Alterar Dados"><a class="btn_cancel" href="./mouse.php">Cancelar</a></form><br />';
endif;

?>
</div>

<div id="lista_used">
<?php
//Consulta os equipamentos utilizados

$consulta_used="SELECT id_mouse,nome_func,modelo FROM inventario.mouse WHERE nome_func NOT LIKE'Disponivel%' ORDER BY id_mouse";

$query = $mysqli->query($consulta_used);

echo '<form action="altera_mouse.php" method="get"><table id="btn_alterar" align="center" border="0">';
echo '<tr><td>ID-MOUSE</td><td>NOME DE USUARIO</td><td>MODELO</td><td>OPÇOES</td></tr>';	
echo '<br />';

while ($dados = $query->fetch_array()) {

	echo'<tr><td><input type="text" value="'.$dados['id_mouse'].'" name="id_mouse" readonly></td>';
	echo'<td><input type="text" value="'.$dados['nome_func'].'" name="nome" readonly></td>';
	echo'<td><input type="text" size="80" value="'.$dados['modelo'].'" name="modelo" readonly></td>';
	
	echo'<td><a id="btn_alterar" href="?id_mouse='.str_replace('M','',$dados['id_mouse']).'&nome='.$dados['nome_func'].'">Alterar</a></td></tr>';

}
echo '</table></form>';

?>
</div>

<h2 style="text-align: center;">Mouses disponíveis</h2>

<div id="lista_free">
<?php
//Equipamentos disponiveis

echo'<br>';
$consulta_free="SELECT id_mouse,nome_func,modelo FROM inventario.mouse WHERE nome_func LIKE'Disponivel%' ORDER BY nome_func";

$query = $mysqli->query($consulta_free);

echo '<form action="altera_mouse.php" method="get"><table id="btn_alterar" align="center" border="0">';
echo '<tr><td>ID-MOUSE</td><td>NOME DE USUARIO</td><td>MODELO</td><td>OPÇOES</td></tr>';	
echo '<br />';

while ($dados = $query->fetch_array()) {

	echo'<tr><td><input type="text" value="'.$dados['id_mouse'].'" name="id_mouse" readonly></td>';
	echo'<td><input type="text" value="'.$dados['nome_func'].'" name="nome" readonly></td>';
	echo'<td><input type="text" size="80" value="'.$dados['modelo'].'" name="modelo" readonly></td>';
	
	echo'<td><a id="btn_alterar" href="?id_mouse='.str_replace('M','',$dados['id_mouse']).'&nome='.$dados['nome_func'].'">Alterar</a></td></tr>';

}
echo '</table></form>';
?>
</div>

</body>
</html>