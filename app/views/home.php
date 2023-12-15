<div class="">

    <div class="row">
        <!-- <div class="top_tiles"> -->
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">222</div>
                <h3>Contratos</h3>
                <p>Ativos</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count">179</div>
                <h3>Fornecedores</h3>
                <p>Ativos</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                <div class="count">179</div>
                <h3>Projetos</h3>
                <p>Em andamento.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count">19</div>
                <h3>Condutor</h3>
                <p>Ativos</p>
            </div>
        </div>
        <!-- </div> -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">

                <h1><small><i class="fa fa-calendar" aria-hidden="true"></i> Vencimentos</small></h1>

                <div class="row">
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-file-text-o"></i> Contratos<small>- (dia & mês)</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php foreach ($cvenc as $cvenc) {

                                    $dias = $cvenc->restam;
                                    if ($dias < 1) {
                                        $cor = 'red';
                                    } elseif (($dias > 0) and ($dias <= 30)) {
                                        $cor = 'text-warning';
                                    } else {
                                        $cor = '';
                                    }
                                ?>
                                    <article class="media event mt-2">
                                        <div class="date date-con">
                                            <p class="month">
                                                <?php echo imprimeMesAbreviado(extraiMes($cvenc->vencimento, $opcao = 1)); ?>
                                            </p>
                                            <p class="day">
                                                <?php echo extraiDia($cvenc->vencimento, $opcao = 1); ?>
                                            </p>
                                        </div>
                                        <div class="media-body">
                                            <a class="title" href="<?php echo URL_BASE . 'contratogeral/ver/' . $cvenc->id_contrato; ?>"><?php echo $cvenc->contrato; ?></a>
                                            <p class="<?php echo $cor; ?>"> <small><?php echo $cvenc->razao; ?></small></p>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-address-book-o" aria-hidden="true"></i> CNH<small>- (mês & Ano)</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php foreach ($cnhvenc as $cnhvenc) { ?>

                                    <article class="media event mt-2">
                                        <div class="date date-cnh">
                                            <p class="month">
                                                <?php echo imprimeMesAbreviado(extraiMes($cnhvenc->vencimento, $opcao = 1)); ?>
                                            </p>
                                            <p class="day">
                                                <?php echo date('y', strtotime($cnhvenc->vencimento)); ?>
                                            </p>
                                        </div>
                                        <div class="media-body">
                                            <a class="title" href="<?php echo URL_BASE . 'condutor/edit/' . $cnhvenc->id_mot_enc; ?>">
                                                Faltam <?php echo $cnhvenc->restam; ?> dias
                                            </a>
                                            <p><?php echo $cnhvenc->condutor; ?></p>
                                        </div>
                                    </article>

                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-tachometer" aria-hidden="true"></i> Cronotacógrafo<small></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <article class="media event mt-2">
                                    <div class="date date-cro">
                                        <p class="month">Dez</p>
                                        <p class="day">23</p>
                                    </div>
                                    <div class="media-body">
                                        <a class="title" href="#">ABC-6475</a>
                                        <p>CAMINHÃO C. SUPLEMENTAR 13 PASSAGEIROS</p>
                                    </div>
                                </article>
                                <article class="media event mt-2">
                                    <div class="date date-cro">
                                        <p class="month">Dez</p>
                                        <p class="day">23</p>
                                    </div>
                                    <div class="media-body">
                                        <a class="title" href="#">ABC-6475</a>
                                        <p>CAMINHÃO C. SUPLEMENTAR 13 PASSAGEIROS</p>
                                    </div>
                                </article>
                                <article class="media event mt-2">
                                    <div class="date date-cro">
                                        <p class="month">Dez</p>
                                        <p class="day">23</p>
                                    </div>
                                    <div class="media-body">
                                        <a class="title" href="#">ABC-6475</a>
                                        <p>CAMINHÃO C. SUPLEMENTAR 13 PASSAGEIROS</p>
                                    </div>
                                </article>
                                <article class="media event mt-2">
                                    <div class="date date-cro">
                                        <p class="month">Dez</p>
                                        <p class="day">23</p>
                                    </div>
                                    <div class="media-body">
                                        <a class="title" href="#">ABC-6475</a>
                                        <p>CAMINHÃO C. SUPLEMENTAR 13 PASSAGEIROS</p>
                                    </div>
                                </article>
                                <article class="media event mt-2">
                                    <div class="date date-cro">
                                        <p class="month">Dez</p>
                                        <p class="day">23</p>
                                    </div>
                                    <div class="media-body">
                                        <a class="title" href="#">ABC-6475</a>
                                        <p>CAMINHÃO C. SUPLEMENTAR 13 PASSAGEIROS</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- /page content -->