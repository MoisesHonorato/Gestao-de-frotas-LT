<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo URL_BASE ?>assets/images/img.jpg" alt=""><?php echo $_SESSION[SESSION_LOGIN]->nome; ?></a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Perfil</a>
                        <a class="dropdown-item" href="javascript:;">Ajuda</a>
                        <a class="dropdown-item" href="<?php echo URL_BASE . 'login/logoff'; ?>"><i class="fa fa-sign-out pull-right"></i> Sair</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="<?php echo URL_BASE ?>assets/images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>Moisés Honorato</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Os festivais de cinema costumavam ser momentos de vida ou morte para os cineastas.
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="<?php echo URL_BASE ?>assets/images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>Moisés Honorato</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Os festivais de cinema costumavam ser momentos de vida ou morte para os cineastas.
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="<?php echo URL_BASE ?>assets/images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>Moisés Honorato</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Os festivais de cinema costumavam ser momentos de vida ou morte para os cineastas.
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item">
                                    <strong>Ver Todos os Alertas</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>