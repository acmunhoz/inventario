<?php

include'db_connect.php';

//Altera notebook

if(!empty($_GET['id_pc']) && !empty($_GET['nome'])):
	$id_pc=$_GET['id_pc'];
	$nome=$_GET['nome'];


$query="UPDATE inventario.computadores SET nome_func=\"".$nome."\" WHERE id_pc=\"".$id_pc."\"";

if($mysqli->query($query) == True):
		header("Location:./notebook.php");
endif;		

$mysqli->close();

endif;


//Altera Mouse

if(!empty($_GET['id_mouse']) && !empty($_GET['nome'])):
	$id_mouse=$_GET['id_mouse'];
	$nome=$_GET['nome'];

$query="UPDATE inventario.mouse SET nome_func=\"".$nome."\" WHERE id_mouse=\"".$id_mouse."\"";

if($mysqli->query($query) == True):
		header("Location:./mouse.php");
endif;		

$mysqli->close();

endif;


//Altera Monitor

if(!empty($_GET['id_monitor']) && !empty($_GET['nome'])):
	$id_monitor=$_GET['id_monitor'];
	$nome=$_GET['nome'];

$query="UPDATE inventario.monitores SET nome_func=\"".$nome."\" WHERE id_monitor=\"".$id_monitor."\"";

if($mysqli->query($query) == True):
		header("Location:./monitores.php");
endif;		

$mysqli->close();

endif;


//Altera Teclado

if(!empty($_GET['id_teclado']) && !empty($_GET['nome'])):
	$id_teclado=$_GET['id_teclado'];
	$nome=$_GET['nome'];

$query="UPDATE inventario.teclados SET nome_func=\"".$nome."\" WHERE id_teclado=\"".$id_teclado."\"";

if($mysqli->query($query) == True):
		header("Location:./teclados.php");
endif;		

$mysqli->close();

endif;
?>
