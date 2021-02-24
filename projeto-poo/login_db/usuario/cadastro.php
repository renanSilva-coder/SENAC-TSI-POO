<?php

require 'model/dados.php';


if(isset($_POST['cadastrar'])){
	
	$dir_imagens = '../view/imagens/';

	// var_dump($_POST);
	// echo '<pre>';
	// var_dump($_FILES);
	// echo '</pre>';

	// // COMO LIDAR COM IMG NO PHP
	// // se não existir o dir imagens
	if(!is_dir('../view/imagens')){//como não tem nenhuma especificação de diretorio ele procura o dir imagens no nivel em que ele est/á

		//crie o dir 
		mkdir( $dir_imagens );

	}

	require 'controller/consistencia_cadastro.php';

	$id = gravar_usuario( $_POST['nome'], $_POST['email'], $_POST['senha'] );

	if( $id ) {//se for false, null, 0, vazio, ele não entra no else;

		if ( isset( $_FILES['foto'] ) ) { //Verifica se foi enviado o arquivo

			if ( $_FILES['foto']['error'] == 0) { //Verifica se não deu erro no upload

				$nome_explodido = explode( '.', $_FILES['foto']['name']);
				$extensao = end($nome_explodido);
				$nome_imagem = 'foto_' . md5(rand(-99999999999,9999999999)) . '_' . $id . '.' . $extensao;

				$arquivo_temp = $_FILES['foto']['tmp_name'];
				$destino = $dir_imagens . $nome_imagem;

				move_uploaded_file(	$arquivo_temp, $destino);

				vincula_imagem_ao_usuario( $id, $nome_imagem);


			}
		}
		
		session_start();

		$_SESSION['login'] = $_POST['email'];
		$_SESSION['id'] = $id;

		header('Location: ../'); //o header('Location: n/x') redireciona para algum diretório, arquivo. aqui está voltando duas pastas sem arquivo definido, ou seja, o index.
	
	}else{

		$erros = ['Não foi possível criar o usuário!'];

	}
	
}else{

	$erros = [];

}

include 'view/cadastro_tpl.php';
