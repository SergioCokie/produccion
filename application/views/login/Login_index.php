<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url("resources/mdbootstrap/css/bootstrap.min.css"); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("resources/login_resources/css/login.css") ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="contenedor-padre">
        <div class="contenedor-hijo">
            <div id="logo">
                <img src="<?php echo base_url("resources/login_resources/img/IM-Login.png") ?>" alt="">
            </div>
            <h4>Iniciar Sesión </h4>
            <form id="formulario-login" method="POST" action="<?php base_url()?>Login/Login">
                <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario">
                <input type="password" name="contra" class="form-control" id="contra" placeholder="Contraseña">
                <input type="submit" value="Ingresar" class="form-control" id="btn-form" name="btn-form">
            </form>

        </div>
    </div>


</body>

</html>