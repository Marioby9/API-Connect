<?php
//Importamos la clase Response y la clase Database



class Book extends DataXML
{

	//indicamos los parámetros válidos para las peticiones get mediante un array
	private $allowedConditions_get = array(
		'id',
		'autor',
		'genero',
		'pagina'
	);

	/**
	 * Método get: recibe los parámetros de la petición get,
	 * los recorre para comprobar si son válidos,
	 * si no lo son los elimina y devuelve una respuesta json de error,
	 * si lo son realiza la consulta a DB y devuelve un json con la respuesta correcta
	 *
	 * @param array $params Los parámetros get usados en BD
	 * @return [array | void] Los usuarios de la BD
	 */
	public function get($params){
		//Recorremos los parámetros get
		foreach ($params as $key => $param) {
			//si los parámetros no están permitidos...
			if(!in_array($key, $this->allowedConditions_get)){
				//eliminamos los parámetros
				unset($params[$key]);
				//creamos el array de error
				$response = array(
					'result' => 'error',
					'details' => 'Error en la solicitud'
				);
				//devolvemos la petición de error convertida a json
				Response::result(400, $response);
				exit;
			}
		}
		//llamamos 
		$books = parent::getBooks($params);

		return $books;
	}


}

?>