<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
   //Vamos a obtener el género del libro
   
   $generoLibro=$_POST['genero'];

   $tituloLibro;
   $autorLibro;
   $descripcionLibro;


$consultaPorGenero="SELECT * FROM $bbdd.libro WHERE genero='$generoLibro'";
$listaLibroGenero=accesoBBDD($consultaPorGenero, $servidor, $bbdd, $usuario_mysql,$clave_mysql);


?>

<div>
    <?php
               foreach ($listaLibroGenero as $key => $value){
//                   echo '<pre>';
//                   print_r($value);
//                   echo '</pre>';
                   
                   ?>
            <div class="cajadelibros">
                <div class="row">
                  <div class="portadadelibro col-3"><?php echo $value['portada'];?></div>
                  <div class="col-8">
                      <div class="titulodelibro row"><?php echo $value['titulo'];?></div>
                      <div class="autordelibro row"><?php echo $value['autor'];?></div>
                      <div class="descripciondelibro row"><?php echo $value['descripcion'];?></div>
                      <div class="row">
                          <div class="generodelibro col-6"><?php echo $value['genero'];?></div>
                          <div class="col-6">
                              <button class="btn-primary botondelibro" value="<?php echo $value['IDLibro'];?>">Botón</button>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
            <br/>
            <br/>
            <?php
               }
            ?>
</div>

<script>
    
    $(".botondelibro").click(function(){
         var _idlibro=$(this).val();
        
         $('#contenedor').load("PaginaLibro.php", {
                 idlibro: _idlibro
          });   
    });



</script>

