<?php

    require 'database/Conexion.php';

    //Me conecto a la BD
    $bd = Conexion::conectar();

    //Creo un array con las ciudades para saber el id_ciudad al insertar
    $query = $bd->prepare(
        "SELECT b.direccion, c.ciudad, b.telefono, b.codigo_postal, t.tipo, b.precio
         FROM bienes as b
         INNER JOIN ciudades as c ON b.id_ciudad = c.id_ciudad
         INNER JOIN tipos as t ON b.id_tipo = t.id_tipo");
    $query->execute();
    $bienes = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($bienes as $key => $value) :
?>
        <div class="tituloContenido card bien">
            <img src="img/home.jpg" alt="casa-en-venta">
            <div class="contenidoBien">
                <p class="direccion"><span class="resaltado">Dirección: </span> <span class="direccionTexto"><?= $bienes[$key]['direccion']; ?></span></p>
                <p class="ciudad"><span class="resaltado">Ciudad: </span> <span class="ciudadTexto"><?= $bienes[$key]['ciudad']; ?></span> </p>
                <p class="telefono"><span class="resaltado">Teléfono: </span> <span class="telefonoTexto"><?= $bienes[$key]['telefono']; ?></span> </p>
                <p class="codigoPostal"><span class="resaltado">Código Postal: </span> <span class="codigoPostalTexto"><?= $bienes[$key]['codigo_postal']; ?></span>  </p>
                <p class="tipo"><span class="resaltado">Tipo: </span> <span class="tipoTexto"><?= $bienes[$key]['tipo']; ?></span> </p>
                <p class="precio"><span class="resaltado">Precio: </span> <span class="precioTexto"><?= $bienes[$key]['precio']; ?></span> </p>
            </div>
        </div>
<?php
    endforeach; 
?>