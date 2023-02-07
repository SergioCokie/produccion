<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url("resources/generales/mdbootstrap/css/bootstrap.min.css"); ?>">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("resources/generales/mdbootstrap/css/mdb.min.css"); ?>">

    <!-- Your custom styles (optional) -->
    <style>
        .intro-2 {
            background: url("/produccion2/resources/generales/img/0010.jpg")no-repeat center center;
            background-size: cover;
        }

        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }

        .md-form label {
            color: #ffffff;
        }

        h6 {
            line-height: 1.7;
        }

        html,
        body,
        header,
        .view {
            height: 100vh;
        }

        @media (max-width: 740px) {

            html,
            body,
            header,
            .view {
                height: 700px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }

        .card {
            margin-top: 30px;
            /*margin-bottom: -45px;*/
        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid white;
            box-shadow: 0 1px 0 0 white;
        }

        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: white;
        }

        .md-form .form-control {
            color: #fff;
        }
    </style>

</head>


<body class="creative-lp">

    <!--Main Navigation-->
    <header>

        <!--Intro Section-->
        <section class="view intro-2">
            <div class="mask rgba-indigo-light h-100 d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

                            <!--Form with header-->
                            <div class="card wow fadeIn" style="height: 493px;">
                                <div class="card-body">

                                    <!--Header-->
                                    <div id="logo" style=" display: flex;justify-content: center;align-items: center;margin-bottom:100px;">
                                        <img src="<?php echo base_url("resources/login_resources/img/IM-Login.png") ?>" style="width: 100px;" alt="">
                                    </div>

                                    <form id="formulario-login" method="POST" action="<?php base_url() ?>Login/Login">
                                        <!--Body-->
                                        <div class="md-form mb-0">
                                            <i class="fa fa-user prefix white-text"></i>
                                            <input type="text" id="usuario" name="usuario" class="form-control">
                                            <label for="orangeForm-name">Your name</label>
                                        </div>

                                        <div class="md-form mb-0">
                                            <i class="fa fa-lock prefix white-text"></i>
                                            <input type="password" id="contra" name="contra" class="form-control">
                                            <label for="orangeForm-pass">Your password</label>
                                        </div>

                                        <div class="text-center" style="margin-top: 64px;">
                                            <button type="submit" class="btn pink-gradient" style="background: #1f3558;">Sign up</button>
                                            <hr>
                                            <div class="inline-ul text-center d-flex justify-content-center">

                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <!--/Form with header-->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
    <!--Main Navigation-->

    <!-- SCRIPTS -->
    <!-- Archivos JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url("resources/generales/mdbootstrap/js/popper.min.js"); ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("resources/generales/mdbootstrap/js/bootstrap.js"); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("resources/generales/mdbootstrap/js/mdb.min.js"); ?>"></script>

    <script>
        new WOW().init();
    </script>
</body>

</html>