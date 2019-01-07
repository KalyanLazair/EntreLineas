<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
   //Vamos a obtener el género del libro
   
   
   $num=$_POST['num'];
   
   $consultaPorGenero;
   
   if($num==1){
       $generoLibro=$_POST['genero'];
       $consultaPorGenero="SELECT * FROM $bbdd.libro WHERE genero='$generoLibro'";
   }else if($num==2){
       $buscar=$_POST['buscar'];
       $consultaPorGenero="SELECT * FROM $bbdd.libro WHERE genero LIKE '%$buscar%' OR autor LIKE '%$buscar%' OR descripcion LIKE '%$buscar%';"; 
   }
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
                  <div class="portadadelibro col-3">
                   <img src="<?php echo $value['portada'];?>"></div>
                  <div class="col-8">
                      <div class="titulodelibro row"><?php echo $value['titulo'];?></div>
                      <div class="autordelibro row"><?php echo $value['autor'];?></div>
                      <div class="descripciondelibro row"><?php echo $value['descripcion'];?></div>
                      <div class="row">
                          <div class="generodelibro col-6"><?php echo $value['genero'];?></div>
                          <div class="col-6">
                              <button class="btn-primary botondelibro" value="<?php echo $value['IDLibro'];?>">Libro</button>
                              <button class="btn-primary botondeautor" value="<?php echo $value['autor'];?>">Autor</button>
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
    
    
    //Pagina de libro
    
    $(".botondelibro").click(function(){
         var _idlibro=$(this).val();
        
         $('#contenedor').load("PaginaLibro.php", {
                 idlibro: _idlibro
          });   
    });
    
    //Pagina de autor
    
    $(".botondeautor").click(function(){
        var _numeroPerfil=2;
        var _nombreUsuario=$(this).val();
        
        
        $('#contenedor').load("PaginaPerfil.php", {
            numeroPerfil: _numeroPerfil,
            nombreUsuario:_nombreUsuario
        })
    })
    
    



</script>

