<?php
?>

<div class="contenedorPerfil row" style="background-color: #10707f">
    <div class="col-4 border border-dark">
        <div class="row border border-dark">
            <div class="col-2"></div>
            <div class="col-8 border border-dark" style="height:200px; width:150px; background-color: #80bdff">Portada</div>
            <div class="col-2"></div>
        </div>
        <div class="row border border-dark" style="background-color: #efa2a9">
            <button class="btn btn-primary btn-block disabled" type="button">Título</button>
            <br>
            <button class="btn btn-primary btn-block disabled" type="button">Autor</button>
            <br>
            <button class="btn btn-primary btn-block disabled" type="button">Género</button>
        </div>
    </div>
    <div class="col-8 border border-dark">
        <div class="row border border-dark" style="height:800px; width:100%">Primeras Diez Páginas del Libro</div>
        <div class="row border border-dark" style="height:200px; width:100%">
            <div class="col-6 border border-dark">
                <button class="btn btn-primary btn-block" type="button">Comprar</button>
            </div>
            <div class="col-6 border border-dark">
                <button class="btn btn-primary btn-block" type="button" onclick="muestraModal();">Comentar</button>
            </div> 
        </div>
        <div class="row border border-dark" style="height: 800px; width: 100%;">Sección de comentarios</div>
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