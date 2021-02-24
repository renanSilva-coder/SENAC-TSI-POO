<?php

session_start();

if ( !isset($_SESSION['login'])) {
		
	header('Location: /POO/projeto-poo/login_db/');
			
}