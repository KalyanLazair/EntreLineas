<?php
    session_start();
?>
<div class="row">
    <br>
    <br>
    <br>
</div>
<div class="row">
    <div class="col-6 border border-dark">
        <p>Nombre de Usuario</p>
        <p>Contraseña</p>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaNombre" class="form-control" name="usuario_nombre" type="text" placeholder="Usuario">
        <input id="cajaPassword" class="form-control" name="usuario_nombre" type="text" placeholder="Usuario">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button id="botonLogin" class="btn btn-primary" type="button" style="float:right;">Conectarse</button>
    </div>
</div>

<script>
     
     $('#botonLogin').click(function () {
                                    // Read the input content
                                    var _nombreUsuario = $('#cajaNombre').val();
                                    var _passUsuario = $('#cajaPassword').val();
                                    console.log(_nombreUsuario);
                                    console.log(_passUsuario);
                                    
                                    $('#principal').load("login.php", {
                                        nombreUsuario: _nombreUsuario,
                                        passUsuario: _passUsuario
                                    });
                                    
                                    
                                });


</script>
