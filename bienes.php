<?php

    require 'database/Conexion.php';

    //Limpiar la data que llega
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //Me conecto a la BD
    $bd = Conexion::conectar();

    //Creo un array con las ciudades para saber el id_ciudad al insertar
    $query = $bd->prepare("SELECT * FROM ciudades");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    $ciudades = [];

    foreach($resultado as $array) {
        $ciudades[$array['id_ciudad']] =  $array['ciudad'];
    }

    //Creo un array con los tipos para saber el id_tipo al insertar
    $queryTipos = $bd->prepare("SELECT * FROM tipos");
    $queryTipos->execute();
    $resultadoTipos = $queryTipos->fetchAll(PDO::FETCH_ASSOC);

    $tipos = [];

    foreach($resultadoTipos as $array) {
        $tipos[$array['id_tipo']] =  $array['tipo'];
    }

    $direccion = trim($_REQUEST['direccion']);
    $ciudad = trim($_REQUEST['ciudad']);
    //obtengo el id de la ciudad seleccionada por el usuario
    $idCiudad = array_search($ciudad, $ciudades);
    $telefono = trim($_REQUEST['telefono']);
    $codigoPostal = trim($_REQUEST['codigoPostal']);
    $tipo = trim($_REQUEST['tipo']);
    //obtengo el id del tipo del bien seleccionado por el usuario
    $idTipo = array_search($tipo, $tipos);
    $precio = trim($_REQUEST['precio']);

    //Inserto el registro en la BD

    $query = $bd->prepare(
        "INSERT INTO bienes 
            (id_ciudad, id_tipo, direccion, telefono, codigo_postal, precio)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $query->bindParam(1, $idCiudad);
    $query->bindParam(2, $idTipo);
    $query->bindParam(3, $direccion);
    $query->bindParam(4, $telefono);
    $query->bindParam(5, $codigoPostal);
    $query->bindParam(6, $precio);

    $query->execute();