<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../sessao.php';

require 'model/dados.php';
chdir( __DIR__ );//ajustar o diretório(começa dentro do dados.php e termina aqui)
//sempre teste quando for fazer um require ou include para ver se está puxando msm;

//apagar
if( isset( $_GET['apagar'] )){
	if(!apagar_usuario( $_GET['apagar'] )){
		$erro = 'Não foi possível apagar o usuário!';
	}
}


if( isset($_POST['gravar'])){
	
	require 'controller/consistencia_cadastro.php';

	
	if ( count($erros) == 0 ) {

		if ( !editar_usuario( $_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']) ) {
			
			$erros = ['Erro ao tentar editar o usuário!'];

		} else {

			$editado_ok = true;
		}
	}

	include '../../header_tpl.php';
	include '../../index_menu_tpl.php';
	include 'view/editar.php';
	include '../../footer_tpl.php';

	exit();

}

if( isset( $_GET['editar'] )){

	$usuario = listarTudo($_GET['editar']) ?? [];

	$nome = $usuario[0]['nome'] ?? '';
	$email = $usuario[0]['email'] ?? '';

	include '../header_tpl.php';
	include '../index_menu_tpl.php';
	include 'view/editar.php';
	include '../footer_tpl.php';

	exit();//para de rodar o código
}


$lista = listarTudo();
require 'view/lista.php';