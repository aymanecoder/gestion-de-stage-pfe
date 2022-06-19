<?php 
	try {
		//connection a la base des donnees
		$connected = new PDO("mysql:host=localhost;dbname=projetpfe;port=3306;charset=utf8", "root","");
		//echo "connection reussie";
	}
	catch (exception $e) {
		echo "erreur de connection " . $e->getMessage();
	} 
 ?>