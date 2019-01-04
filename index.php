<?php

session_start(); // Inicia o continua la sesión del navegador en el servidor PHP

include('configuracion.php');
include('misFunciones.php');

$consultaPgPrincipal="SELECT IDLibro, portada FROM $bbdd.libro ORDER BY IDLibro DESC LIMIT 6;";
$portadasInicio=accesoBBDD($consultaPgPrincipal,$servidor, $bbdd, $usuario_mysql,$clave_mysql);

foreach($portadasInicio as $key => $value){
     $arrayID[]=$value['IDLibro'];
     $arrayPortada[]=$value['portada'];
}

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color:#666666;">
        
        <div id="encabezado">
            <div class="row">
               <div class="col-12 border border-dark volverIndex" style="background-color: midnightblue; height:260px;">Banner</div>
            </div>
            <div class="row">
                <div class="col-8 border border-dark" style="background-color: #ccccff; height:100px;">Espacio en blanco
                    <button id="perfilPrueba" class="btn btn-primary" type="button" onclick="" value="Koenig">Perfil Usuario Prueba</button> 
                    <button class="btn btn-primary" type="button" onclick="cargaLibro();">Perfil Libro Prueba</button> 
                </div>
                <div class="col-2 border border-dark" style="background-color: #ccccff; height:100px;">
                    <button class="btn btn-primary btn-block" type="button" onclick="cargaRegistro();">Registrarse</button>
                </div>
<?php
   //isset busca si la variable $_Session existe.
   if(isset($_SESSION['username'])){
       ?>

                <div class="col-2 border border-dark" style="background-color: #ccccff; height:100px;"> 
                    <button id="buttonProfile" class="btn btn-primary btn-block" type="submit" onclick=""><?php echo $_SESSION['username'] ?></button>
                    <a href="/EntreLineas/logoff.php">Log Off</a>
                </div>
                
 <?php
   }else{
       
       

?>

                <div class="col-2 border border-dark" style="background-color: #ccccff; height:100px;">
                   <button id="botonLoginPrincipal" class="btn btn-primary btn-block" type="button" onclick="cargaLogin();">Login</button>
                </div>
                
 <?php

  }
?>

            </div>
        </div>
        
        <div id="contenedor" class="container">
            <div class="row">
                <div class="col-4 border border-dark" style="background-color: #efa2a9;">
                    <br>
                    <input id="cajaBuscar" class="form-control" name="buscar_libros" type="text" placeholder="Buscar">
                    <button class="btn btn-primary botonBuscar" type="submit"><span class="glyphicon glyphicon-search">Buscar</span></button>
                    <br>
                    <div class="dropdown">
                      <button class="btn btn-primary dropbtn" type="button">Libros Por Género</button>
                      <div class="dropdown-content">
                          <button class="btn btn-primary btn-block botonGenero" value="Aventuras">Aventuras</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Romantico">Romántico</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Terror">Terror</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Fantasia">Fantasía</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Policiaca">Policiaca</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Ciencia Ficcion">Ciencia Ficción</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Infantil">Infantil</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Biografia">Biografía</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Ensayo">Ensayo</button>
                          <button class="btn btn-primary btn-block botonGenero" value="Politica">Política</button>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="dropdown">
                      <button class="btn btn-primary dropbtn" type="button">Lo Más y Menos</button>
                      <div class="dropdown-content">
                             <a href="#">Lo Más Valorado</a>
                             <a href="#">Lo Menos valorado</a>
                      </div>
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="button">En Qué Consiste</button>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="button">Foro</button>
                </div>
                <div id="principal" class="col-8 border border-dark" style="background-color: #71dd8a;">
                    <div class="row">
                        <div class="col-6 border border-dark" style="background-color:#e4606d; border:1px black; height:400px;">
                            <div style="background-color: white; margin: 10px; width:200px; height:300px;">
                                <img src="<?php echo $arrayPortada[0];?>"></div>
                            <button class="btn btn-primary botonPerfilLibro" value="<?php echo $arrayID[0]?>">Libro</button>
                        </div>
                        <div class="col-6 border border-dark" style="background-color:#cce5ff; border:1px black; height:400px;">
                            <div style="background-color: white; margin: 10px; width:200px; height:300px;"><?php echo $arrayPortada[1];?></div>
                            <button class="btn btn-primary botonPerfilLibro" value="<?php echo $arrayID[1]?>">Libro</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 border border-dark" style="background-color:#cce5ff; border:1px black; height:400px;">
                            <div style="background-color: white; margin: 10px; width:200px; height:300px;"><?php echo $arrayPortada[2];?></div>
                            <button class="btn btn-primary botonPerfilLibro" value="<?php echo $arrayID[2]?>">Libro</button>
                        </div>
                        <div class="col-6 border border-dark" style="background-color:#e4606d; border:1px black; height:400px;">
                            <div style="background-color: white; margin: 10px; width:200px; height:300px;"><?php echo $arrayPortada[3];?></div>
                            <button class="btn btn-primary botonPerfilLibro" value="<?php echo $arrayID[3]?>">Libro</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 border border-dark" style="background-color:#e4606d; border:1px black; height:400px;">
                            <div style="background-color: white; margin: 10px; width:200px; height:300px;"><?php echo $arrayPortada[4];?></div>
                            <button class="btn btn-primary botonPerfilLibro" value="<?php echo $arrayID[4]?>">Libro</button>
                        </div>
                        <div class="col-6 border border-dark" style="background-color:#cce5ff; border:1px black; height:400px;">
                            <div style="background-color: white; margin: 10px; width:200px; height:300px;"><?php echo $arrayPortada[5];?></div>
                            <button class="btn btn-primary botonPerfilLibro" value="<?php echo $arrayID[5]?>">Libro</button>
                        </div>
                    </div>
                </div>
                
            </div>      
        </div>
        
        <div id="pie">
            <div class="row border border-dark" style="background-color: buttonface; height:100px;">
                <div class="col-4">Redes Sociales</div>
                <div class="col-4">Terminos de Uso</div>
                <div class="col-4">Lo que se me ocurra</div>
            </div>
        </div>
        
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        
       
      function cargaRegistro(){
       $('#principal').load("PaginaRegistro.php");
      };
      
      function cargaLogin(){
          $('#principal').load("PaginaLogin.php");
      };
      
      function cargaPerfil(){
          $('#contenedor').load("PaginaPerfil.php");
      };
      
      function cargaLibro(){
          $('#contenedor').load("PaginaLibro.php");
      };
      
      
      
      $('.volverIndex').click(function(){
          window.location.reload();
      })
      
      //Funciones que nos permiten acceder al perfil de un usuario dependiendo de si es sesión o no.
    
      $("#buttonProfile").click(function(){
         var _numeroPerfil=1;
        
         $('#contenedor').load("PaginaPerfil.php", {
                 numeroPerfil: _numeroPerfil
          });   
    });
    
    $("#perfilPrueba").click(function(){
        var _numeroPerfil=2;
        var _nombreUsuario=$('#perfilPrueba').val();
        
        $('#contenedor').load("PaginaPerfil.php", {
            numeroPerfil: _numeroPerfil,
            nombreUsuario:_nombreUsuario
        })
    })
    
    //Funciones para obtener la lista de libros dependiendo de su género.

    $(".botonGenero").click(function(){
         var _gen=$(this).val();
         var _num=1; //Nos va a permitir variar la consulta en caso de buscar por género o por búsqueda.
        
         $('#principal').load("ListaLibros.php", {
                 genero: _gen,
                 num: _num
          });   
    });
    
    //Función de buscar
    
    $(".botonBuscar").click(function(){
         var _buscar=$("#cajaBuscar").val();
         var _num=2; //Nos va a permitir variar la consulta en caso de buscar por género o por búsqueda.
        
         $('#principal').load("ListaLibros.php", {
                 buscar: _buscar,
                 num: _num
          });   
    });
    
    //Función de los botones de los seis libros de la portada
    
    $(".botonPerfilLibro").click(function(){
         var _idlibro=$(this).val();
        
         $('#contenedor').load("PaginaLibro.php", {
                 idlibro: _idlibro
          });   
    });
 
    
    </script>
       
    
</html>
