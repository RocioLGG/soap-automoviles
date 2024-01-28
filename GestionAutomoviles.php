<?php

class GestionAutomoviles {

    private $db;

    public function __construct() {
        $this->db = $this->conectarMarcas();
    }

    private function conectarMarcas() {
        try {
            $user = "root";
            $pass = "root";
            $dbname = "coches";
            $host = "localhost";

            $db = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p>Se ha conectado a la BD $dbname.</p>\n";
            return $db;
        } catch (PDOException $e) {
            print "<p>Error: No se pudo conectar con la BD $dbname.</p>\n";
            print "<p>Error: " . $e->getMessage() . "</p>\n";
            exit();
        }
    }

    public function obtenerMarcas() {
        $marcas = array();
        if ($this->db) {
            $result = $this->db->query('SELECT id, marca FROM marcas');
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $marcas[$row['id']] = $row['marca'];
            }
        }
        return $marcas;
    }

    public function obtenerModelos($marca) {
        $marca = intVal($marca);
        $modelos = array();
        if ($marca !== 0 && $this->db) {
            $this->db->query("SET CHARACTER SET utf8");
            $result = $this->db->query("SELECT id, modelo FROM modelos WHERE marca = $marca");
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $modelos[$row['id']] = $row['modelo'];
            }
        }
        return $modelos;
    }

    public function ObtenerModelosPorMarca($marca) {
        $marca = intVal($marca);
        $modelos = array();

        if ($marca !== 0) {
            $con = $this->ConectarMarcas();
            $con->query("SET CHARACTER SET utf8");

            if ($con) {
                // Corregir la consulta para seleccionar modelos en lugar de marcas
                $result = $con->query("SELECT id, modelo FROM modelos WHERE marca = $marca");

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $modelos[] = $row['modelo'];
                }
            }
        }

        return $modelos;
    }


    public static function authenticate($header_params) {
        if ($header_params->username == 'ies' && $header_params->password == 'daw') {
            return true;
        } else {
            throw new SoapFault('Wrong user/pass combination', 401);
        }
    }
}
