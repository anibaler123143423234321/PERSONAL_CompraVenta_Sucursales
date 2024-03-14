<?php
    /* TODO: Inicio de Session */
    session_start();
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                /* TODO: Cadena de Conexion */
                //$conectar = $this->dbh=new PDO("sqlsrv:Server=localhost;Database=CompraVenta","sa","12345678");
                //$conectar = $this->dbh=new PDO("sqlsrv:server = tcp:andercode01.database.windows.net,1433; Database = compraventa01","andercode","Anderson1987");
    
                    $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=compraventa", "root", "");
 
                    return $conectar;
            }catch (Exception $e){
                /* TODO: En caso de error mostrar mensaje */
                print "Error Conexion BD". $e->getMessage() ."<br/>";
                die();
            }
        }
    

        public static function ruta(){
            return "http://localhost/PERSONAL_CompraVenta_v5/";
        }
        
    }
?>