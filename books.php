<?php
//Importamos la clase Response y la clase User
require_once './Class/DataXML.php';
require_once './Config/globalParams.php';
require_once './Class/Response.inc.php';
require_once './Class/Book.inc.php';

//Creamos el objeto de la clase User para manejar el endpoint
$book = new Book();

//Comprobamos de qué tipo es la petición al endpoint
switch ($_SERVER['REQUEST_METHOD']) {
	//Método get

	case 'GET':
		//Recogemos los parámetros de la petición get
		$params = $_GET;

		//Llamamos al método get de la clase User, le pasamos los 
		//parámetros get y comprobamos:
		//1º) si recibimos parámetros
		//2º) si los parámetros están permitidos
		$books = $book->get($params);

		//Creamos la respuesta en caso de realizar una petición correcta
		$response = array(
			'result' => 'ok',
			'libros' => $books
		);

		Response::result(200, $response); //devolvemos la respuesta a la petición correcta

		break;

	default:
		//creamos el array de error
		$response = array(
			'result' => 'error'
		);
		//devolvemos la respuesta
		Response::result(404, $response);

		break;
}
?>