<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
   $idLibro=$_POST['idlibro'];
   
   $consultaLibro="SELECT * FROM $bbdd.libro WHERE IDLibro=$idLibro;";
   
   $datosLibro1=accesoBBDD($consultaLibro,$servidor, $bbdd, $usuario_mysql,$clave_mysql);
   $datosLibro = $datosLibro1[0]; //Lo guardamos en un array de una sola dimensión para que sea más fácil manejarlo.
   echo '<pre>';
   print_r($datosLibro);
   echo '</pre>';
   
   //Comentarios
   $consultaComent="SELECT * FROM $bbdd.comentarios WHERE libro=$idLibro;";
   $listaComent=accesoBBDD($consultaComent,$servidor, $bbdd, $usuario_mysql,$clave_mysql);
//   echo '<pre>';
//   print_r($listaComent);
//   echo '</pre>';

?>

<div class="contenedorPerfil row" style="background-color: #10707f">
    <div class="col-4 border border-dark">
        <div class="row border border-dark">
            <div class="col-2"></div>
            <div class="col-8 border border-dark" style="height:200px; width:150px; background-color: #80bdff"><?php echo $datosLibro["portada"];?></div>
            <div class="col-2"></div>
        </div>
        <div class="row border border-dark" style="background-color: #efa2a9">
            <button class="btn btn-primary btn-block disabled" type="button"><?php echo $datosLibro["titulo"];?></button>
            <br>
            <button class="btn btn-primary btn-block disabled" type="button"><?php echo $datosLibro["autor"];?></button>
            <br>
            <button class="btn btn-primary btn-block disabled" type="button"><?php echo $datosLibro["genero"];?></button>
        </div>
    </div>
    <div class="col-8 border border-dark">
        <div class="row border border-dark" style="height:800px; width:100%"><?php echo $datosLibro["archivo10"];?></div>
        <div class="row border border-dark" style="height:200px; width:100%">
            <div class="col-6 border border-dark">
                <button class="btn btn-primary btn-block" type="button">Comprar</button>
            </div>
            <div class="col-6 border border-dark">
                <button class="btn btn-primary btn-block" type="button" onclick="muestraModal();">Comentar</button>
            </div> 
        </div>
        <div class="row border border-dark" style="height: 800px; width: 100%;">
        
                 <?php
              if($listaComent!=NULL){
                foreach ($listaComent as $key => $value){
//                   echo '<pre>';
//                   print_r($value);
//                   echo '</pre>';
                   
                   ?>
            <div class="cajadecoment">
                      <div class="titulodelibro row"><?php echo $value['usuario'];?></div>
                      <div class="descripciondelibro row"><?php echo $value['contenido'];?></div>   
            </div>
            <br/>
            <br/>
            <?php
               }
              }
            ?>
        
        </div>
    </div>
</div>

<!--MODAL DE INSERCIÓN DE COMENTARIOS-->

<div id="myModal" class="modal" tabindex="-1" role="dialog" style="color:darkgray;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserta Tu Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    function muestraModal() {
        $('#myModal').modal('show');
    };



</script>