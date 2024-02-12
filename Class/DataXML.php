<?php

    class DataXML {


        public static function readXML () {
            $books = [];
            $xml = simplexml_load_file(XMLFILE);
            if($xml){
                try {
                    foreach ($xml as $book){
                        $books[] = [
                            'id' => (string) $book['id'],
                            'autor' => (string) $book->author,
                            'titulo' => (string) $book->title,
                            'genero' => (string) $book->genre,
                            'precio' => (float) $book->price,
                            'año de publicación' => (string) $book->publish_date,
                            'descripción' => (string) $book->description,
                        ];
                     }
                } catch (Exception $e) {
                    die("No se ha cargado el archivo. Excepción: " . $e );
                    
                }
            }
            else{
                echo "No se ha podido cargar el archivo";
            }
            return $books;
        }

        public static function getBooks($pFilter = null) {
            $books = self::readXML();
        
            if ($pFilter === null) {
                return $books;
            }
        
            if(isset($pFilter["pagina"])){
                return array_slice($books, 0, (int)$pFilter['pagina']);
            }

            return array_filter($books, function($book) use ($pFilter) {
                foreach ($pFilter as $key => $value) {
                    if (!isset($book[$key]) || $book[$key] !== $value) {
                        return false;
                    }
                }
                return true;
            });
        }
        
    }


?>