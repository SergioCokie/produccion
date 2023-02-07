
<body class="fixed-sn white-skin">
    <!--Main Navigation-->
    <!--       
            __(.)< (MEOW)
            \___)   
        ~~~~~~~~~~~~~~~~~~
    -->
    <header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg  navbar-light scrolling-navbar">
            <div class="container">
                <!-- SideNav slide-out button -->
                <div class="float-left mr-2">
                    <a href="#" data-activates="slide-out" class="button-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <a class="navbar-brand font-weight-bold white-text" href="<?= base_url() ?>">
                    <strong><?php echo $title ?></strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link  font-weight-bold" href="<?= base_url() ?>">
                                <img src="<?php echo base_url("resources/generales/img/icons/Inicio.png"); ?>" alt="">
                                Inicio</a>
                            </a>

                        </li>
                        <?php foreach ($modulos as $key => $value) { ?>

                            <li class="nav-item dropdown ml-3">
                                <a class="nav-link dropdown-toggle waves-effect waves-light font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo base_url("resources/generales/img/icons/Reportes.png"); ?>" alt=""><?= $value->modulo ?> </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-cyan modulos_navbar modulo_numero_<?= $key + 1 ?>" aria-labelledby="navbarDropdownMenuLink-4" role="<?= $value->modulo ?>" id="<?= $value->id ?>">
                                    
                                </div>
                            </li>
                        <?php } ?>
                        <!-- Usuario -->
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link dropdown-toggle waves-effect waves-light font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url("resources/generales/img/icons/Usuario.png"); ?>" alt="">
                                <?= $this->session->userdata("username") ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>Login/logOut">Log Out</a>
                                <a class="dropdown-item" href="#">V. 2.0</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.Navbar -->
        <style>
            /* Poniendo Foto Al Div en la portada */
            .banner {
                background: url("<?php echo base_url("resources/generales/img/Portada.png"); ?>")no-repeat center center;
                background-size: cover;
            }
        </style>

        <!--Intro Section-->
        <section class="clase_del_banner view banner" id="banner_imagen_seccion_produccion">
            <div class="mask h-100 d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                            <div class="card wow fadeIn" data-wow-delay="1s">
                                <div class="card-body texto-cecntro-banner">
                                    <div class="text-center ">
                                        <div class="inline-ul text-center d-flex justify-content-center">
                                            Reportes de Producción
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>