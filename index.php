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
               <div class="col-12 border border-dark" style="background-color: midnightblue; height:260px;">Banner</div>
            </div>
            <div class="row">
                <div class="col-8 border border-dark" style="background-color: #ccccff; height:100px;">Espacio en blanco</div>
                <div class="col-2 border border-dark" style="background-color: #ccccff; height:100px;">Registrarse</div>
                <div class="col-2 border border-dark" style="background-color: #ccccff; height:100px;">Login</div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-4 border border-dark" style="background-color: #efa2a9;">
                    <br>
                    <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-search"> Buscar</span></button>
                    <br>
                    <div class="dropdown">
                      <button class="btn btn-primary btn-block dropbtn" type="button">Libros Por Género</button>
                      <div class="dropdown-content">
                             <a href="#">Aventuras</a>
                             <a href="#">Romántico</a>
                             <a href="#">Terror</a>
                             <a href="#">Fantasía</a>
                             <a href="#">Policiaca</a>
                             <a href="#">Ciencia Ficción</a>
                             <a href="#">Infantil</a>
                             <a href="#">Biografía</a>
                             <a href="#">Ensayo</a>
                             <a href="#">Política</a>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="dropdown">
                      <button class="btn btn-primary btn-block dropbtn" type="button">Lo Más y Menos</button>
                      <div class="dropdown-content">
                             <a href="#">Lo Más Valorado</a>
                             <a href="#">Lo Menos valorado</a>
                      </div>
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-block" type="button">Normas de Uso</button>
                </div>
                <div class="col-8 border border-dark" style="background-color: #71dd8a;">
                    <div class="row">
                        <div class="col-6 border border-dark" style="background-color:#e4606d; border:1px black; height:400px;"></div>
                        <div class="col-6 border border-dark" style="background-color:#cce5ff; border:1px black; height:400px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 border border-dark" style="background-color:#cce5ff; border:1px black; height:400px;"></div>
                        <div class="col-6 border border-dark" style="background-color:#e4606d; border:1px black; height:400px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 border border-dark" style="background-color:#e4606d; border:1px black; height:400px;">
                            <div style="background-color: white; margin: 10px; width:200px; height:300px;">Prueba de encuadre de imagen</div>
                        </div>
                        <div class="col-6 border border-dark" style="background-color:#cce5ff; border:1px black; height:400px;"></div>
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
    
</html>