<?php

class Conexion
{
    /**
     * Método para conectarse a la BD MySQL con PDO
     */
    public static function conectar()
    {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=intelcost_bienes", "root", "");

            return $conexion;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

Conexion::conectar();