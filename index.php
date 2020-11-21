<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  
  <?php

    //Recibo los datos de los bienes desde el archivo local data-1.json 
    $data = file_get_contents('data-1.json'); 
    $bienes = json_decode($data);

    //Hago un array con las ciudades sin repetirlas
    $ciudades = array();
    //Hago un array con los tipos de bienes sin repetirlos
    $tiposBienes = array();

    foreach($bienes as $key => $value) {

      $existeCiudad = in_array($bienes[$key]->Ciudad, $ciudades);
      $existeBien = in_array($bienes[$key]->Tipo, $tiposBienes);

      if (! $existeCiudad)
        $ciudades[] = $bienes[$key]->Ciudad;

      if (! $existeBien)
        $tiposBienes[] = $bienes[$key]->Tipo;
                     
    }
    
  ?>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="0" selected>Elige una ciudad</option>
              <?php
                //Creo los options con el array ciudades
                foreach($ciudades as $key => $value) :
              ?>
                <option value="<?= $value; ?>"><?= $value; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="0">Elige un tipo</option>
              <?php
                //Creo los options con el array tiposBienes
                foreach($tiposBienes as $key => $value) :
              ?>
                <option value="<?= $value; ?>"><?= $value; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>
            <div class="divider"></div>
          </div>

          <?php
            foreach($bienes as $key => $value) :
          ?>
            <div class="tituloContenido card bien">
                <img src="img/home.jpg" alt="casa-en-venta">
                <div class="contenidoBien">
                  <p class="direccion"><span class="resaltado">Dirección: </span> <span class="direccionTexto"><?= $bienes[$key]->Direccion; ?></span></p>
                  <p class="ciudad"><span class="resaltado">Ciudad: </span> <span class="ciudadTexto"><?= $bienes[$key]->Ciudad; ?></span> </p>
                  <p class="telefono"><span class="resaltado">Teléfono: </span> <span class="telefonoTexto"><?= $bienes[$key]->Telefono; ?></span> </p>
                  <p class="codigoPostal"><span class="resaltado">Código Postal: </span> <span class="codigoPostalTexto"><?= $bienes[$key]->Codigo_Postal; ?></span>  </p>
                  <p class="tipo"><span class="resaltado">Tipo: </span> <span class="tipoTexto"><?= $bienes[$key]->Tipo; ?></span> </p>
                  <p class="precio"><span class="resaltado">Precio: </span> <span class="precioTexto"><?= $bienes[$key]->Precio; ?></span> </p>
                  <button type="button" class="btn green guardarBien">GUARDAR</button>
                </div>
            </div>

          <?php endforeach; ?>

        </div>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <div class="divider"></div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
