<?php
   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
//Declaramos las variables que vamos a utilizar
 
$nombreUser;
$apellidoUser;
$sexoUser;
$paisUser;
$ciudadUser;
$descripcionUser;
$fotoUser;
//En esta variable vamos a guardar el nombre de usuario cuando no se trate del usuario que ha abierto la sesión.
$nombreUsuario;
//Autor que vamos a usar en las siguientes consultas
$autor;

//Esta variable la vamos a utilizar asignándole por post valor 1/2 en función de si es el botón de sesión o el de
//otro usuario el que hemos pulsado.
$numeroPerfil=$_POST['numeroPerfil'];
   
echo $numeroPerfil;

//Vamos a cargar los datos de usuario cuando este sea otro que no el de sesión.
if($numeroPerfil==2){
    $nombreUsuario=$_POST['nombreUsuario']; //Lo que le pasamos si es otro usuario distinto al de sesión.
    $consultaUser="SELECT IDUser FROM $bbdd.usuario WHERE username='$nombreUsuario';";
    $resultadoUsuario=accesoBBDD($consultaUser, $servidor, $bbdd, $usuario_mysql,$clave_mysql);

    //Conversión array to string
    foreach ($resultadoUsuario as $key => $value){
        $claveUsuario=$value['IDUser'];   
    }

    $consultaDatosUser="SELECT * FROM $bbdd.userdata WHERE IDUserData=$claveUsuario";
    $resultadoDatosUser=accesoBBDD($consultaDatosUser, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
//procesamos el array para sacar los valores.
    foreach($resultadoDatosUser as $key => $value){
        $nombreUser=$value['nombre'];
        $apellidoUser=$value['apellidos'];
        $sexoUser=$value['sexo'];
        $paisUser=$value['pais'];
        $ciudadUser=$value['ciudad'];
        $descripcionUser=$value['descripcion'];
        $fotoUser=$value['foto'];
    }
    
    $autor=$nombreUsuario;   
}else if($numeroPerfil==1){
    $autor=$_SESSION['username'];
    //Datos
    $nombreUser=$_SESSION['nombre'];
    $apellidoUser=$_SESSION['apellidos'];
    $sexoUser=$_SESSION['sexo'];
    $paisUser=$_SESSION['pais'];
    $ciudadUser=$_SESSION['ciudad'];
    $descripcionUser=$_SESSION['descripcion'];
    $fotoUser=$_SESSION['foto'];
}  
//Lista de libros publicados por el usuario que le vamos a pasar como parámetro.

$consultaLibros="SELECT * FROM bbddel.libro WHERE autor='$autor';";
$listaLibros = accesoBBDD($consultaLibros, $servidor, $bbdd, $usuario_mysql,$clave_mysql);

//$libros = array();
echo '<pre>';
print_r($listaLibros);
echo '</pre>';

$myJson = json_encode($listaLibros);

print_r($myJson);


//if($listaLibros != NULL){
//    foreach ($listaLibros as $key => $value) {
//           $libros[$key]['IDLibro']=$value['IDLibro'];
//           $libros[$key]['titulo']=$value['titulo'];
//            $libros[$key]['descripcion']=$value['descripcion'];
//            $libros[$key]['genero']=$value['genero'];
//            $libros[$key]['archivo10']=$value['archivo10'];
//            $libros[$key]['archivo']=$value['archivo'];
//           $libros[$key]['portada']=$value['portada'];   
//    }
//}
//echo '<pre>';
//print_r($libros);
//echo '</pre>';

?>

<div class="contenedorPerfil row" style="background-color: #10707f">
    <div class="col-4 border border-dark">
        <div class="row border border-dark">
            <div class="col-2"></div>
            <div class="col-8 border border-dark" style="height:200px; width:150px; background-color: #80bdff"><?php echo $fotoUser;?></div>
            <div class="col-2"></div>
        </div>
        <div class="row border border-dark" style="background-color: #efa2a9">
            <div class="btn btn-primary btn-block disabled"><?php echo $nombreUser. " " . $apellidoUser;?></div>
            <br/>
            <div class="btn btn-primary btn-block disabled"><?php echo $sexoUser;?></div>
            <br>
            <button class="btn btn-primary btn-block disabled" type="button"><?php echo $ciudadUser;?></button>
            <br>
            <button class="btn btn-primary btn-block disabled" type="button"><?php echo $paisUser;?></button>
            <br>
            <button class="btn btn-primary" type="button">Favoritos</button>
            <br>
            <button class="btn btn-primary" type="button">Modificar Perfil</button>
            <br>
            <button class="btn btn-primary" type="button" onclick="publicaLibro();">Publicar Libro</button>
        </div>
    </div>
    <div id="principal2" class="col-8 border border-dark">
        <div class="row border border-dark" style="height:400px; width:100%"><?php echo $descripcionUser;?></div>
        <div id="listaLibros" class="row border border-dark" style="height:400px; width:100%">
            
            <?php
               foreach ($listaLibros as $key => $value){
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
                              <button id="botondelibro" class="btn-primary" value="<?php echo $value['IDLibro'];?>">Botón</button>
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
    </div>
</div>

<script>
    
    $("#botondelibro").click(function(){
         var _idlibro=$(this).val();
        
         $('#contenedor').load("PaginaLibro.php", {
                 idlibro: _idlibro
          });   
    });
   
   function publicaLibro(){
       $('#principal2').load('RegistraLibro.php');
   }

</script>

