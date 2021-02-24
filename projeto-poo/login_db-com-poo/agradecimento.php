<?php

session_start(); 

include 'header_tpl.php';
include 'index_menu_tpl.php';
include 'footer_tpl.php';
	
// echo 'Obrigado '.$_SESSION['login'].' !<br><br>';//mostra um dado( que está em $_SESSION['meuNome'] ) criado através da função session_start() e do método $_SESSION com o código $_SESSION['example'] = 'exemplo'; e aonde tiver session _start(); eu posso puxar esse dado e posso criar novos dados para passar através da sessao quando eu quiser, a troca de dados por session não é vista pelo usuário


$nota = $_GET['nota'];// Pega quando está na url
// $nota = $_REQUEST['nota']; // usa-se quando o valor pode vir por POST ou GET ou OS DOIS 


if ( !isset($_SESSION['login'])) {
	
	header('Location: index.php');

}else{

if ( $nota >= 9 ){
	echo "ESTAMOS MUITO FELIZES!!!<hr>";
	echo 'Obrigado '.$_SESSION['login'].' !<br><br>';
}else{
	echo "O que podemos fazer para você nos dar uma nota 10 ???<br><br>
	<textarea placeholder='Campo desabilitado...' name='feedback' rows='2' cols='70' disabled=''></textarea> <hr>";
}

}


