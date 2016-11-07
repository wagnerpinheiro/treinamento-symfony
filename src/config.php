<?php
$hostname='mysql';
//nunca use o seu usuario de root para acesso ao DB, crie um usuario exclusivo para o app e defina as permissões corretas
$username='root'; 
//sempre utilize uma senha!
$password='';

//inicialização do PDO (feito aqui apenas para a DEMO)
try {
	$pdo = new PDO("mysql:host=$hostname;dbname=symfony",$username,$password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	//nunca faça um try catch silencioso
	//salve os erros em um log, não faça saida para o usuário, pode haver informações sensiveis a segurança do app
    error_log($e->getMessage());
}
