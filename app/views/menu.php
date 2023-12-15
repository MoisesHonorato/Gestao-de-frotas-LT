<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <!-- logo -->
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo URL_BASE; ?>" class="site_title"><i class="fa fa-rocket"></i> <span>eFrotas</span></a>
        </div>
        <!--/ logo -->

        <div class="clearfix"></div>

        <!-- menu perfil info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo URL_BASE ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bem vindo,</span>
                <h2><?php
                    $nome = explode(' ', $_SESSION[SESSION_LOGIN]->nome);
                    echo array_shift($nome) . ' ' . array_pop($nome);
                    ?></h2>
            </div>
        </div>
        <!-- /menu perfil info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">

                    <li><a href="<?php echo URL_BASE; ?>"><i class="fa fa-area-chart"></i> Dashbord </a></li>

                    <li><a><i class="fa fa-file-text-o"></i> Contrato <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo URL_BASE . 'contratogeral'; ?>"> Geral </a></li>
                            <li><a href="<?php echo URL_BASE . 'contratovenc'; ?>"> Vencimento </a></li>
                            <li><a href="<?php echo URL_BASE . 'contratopre'; ?>"> Pré-contrato </a></li>
                            <li><a href="<?php echo URL_BASE . 'contratoobjeto'; ?>"> Objeto </a></li>
                            <li><a href="<?php echo URL_BASE . 'contratovigencia'; ?>"> Vigência </a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-truck"></i> Efetivo </a></li>

                </ul>
            </div>
            <div class="menu_section">
                <h3>Configurações</h3>

                <ul class="nav side-menu">

                    <li><a><i class="fa fa-cogs"></i> Gerenciar <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="<?php echo URL_BASE . 'projeto'; ?>"> Projeto </a></li>

                            <li><a>Centro de Custo<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="<?php echo URL_BASE . 'centrocusto' ?>">Centro de Custo</a>
                                    </li>
                                    <li><a href="<?php echo URL_BASE . 'centrocustoatividade' ?>">Atividade</a>
                                    </li>
                                </ul>
                            </li>

                            <li><a> RH <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="<?php echo URL_BASE . 'colaborador' ?>">Colaborador</a></li>
                            </li>
                            <li><a href="#">Função</a></li>
                            <li><a href="<?php echo URL_BASE . 'encarregado'; ?>"> Encarregado </a></li>
                        </ul>
                    </li>

                    <li><a>Fornecedor<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo URL_BASE . 'fornecedor'; ?>"> Fornecedor </a></li>
                            <li class="sub_menu"><a href="<?php echo URL_BASE . 'fornecedorcontato'; ?>"> Contato </a></li>
                            <li class="sub_menu"><a href="<?php echo URL_BASE . 'fornecedorbanco'; ?>"> Banco </a></li>
                        </ul>
                    </li>

                </ul>
                </li>

                <li><a class=""><i class="fa fa-floppy-o"></i> Cadastrar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">



                        <li><a href="<?php echo URL_BASE . 'condutor'; ?>"> Condutor </a></li>

                        <li><a href="<?php echo URL_BASE . 'equipamento'; ?>"> Equipamento </a></li>

                    </ul>
                </li>

                <li><a href="#"><i class="fa fa-user"></i> Meu Perfil </a></li>

                </ul>

            </div>



        </div>
        <!-- /sidebar menu -->
    </div>
</div>