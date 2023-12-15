<div class="page-title">
    <div class="title_left">
        <h3> Pré-Contrato </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'contratopre/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-file-o" aria-hidden="true"></i> Cadastrar</a>

            </div>
        </div>
    </div>
    <!-- /botão adicionar -->
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        $this->verMsg();
                        $this->verErro();
                        ?>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                                <thead>
                                    <tr>
                                        <th class="col">Contrato</th>
                                        <th class="col">Fornecedor</th>
                                        <th class="col">Projeto</th>
                                        <th class="col">Data do Contrato</th>
                                        <th class="col">Mobilização</th>
                                        <th class="col">Desmobilização</th>
                                        <th class="col">Mão de Obras</th>
                                        <th class="col">Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista as $lista) {

                                        if ($lista->contratostatus == '1') :
                                            $ativar = 'Ativado';
                                            $icon   = 'fa fa-check-circle-o';
                                            $cor  = 'green';
                                            $corA = 'blue';
                                        else :
                                            $ativar = 'Desativado';
                                            $icon   = 'fa fa-ban';
                                            $cor  = 'aero';
                                            $corA = 'aero';

                                        endif;
                                    ?>
                                        <tr>
                                            <td><?php echo $lista->contrato; ?></td>
                                            <td><?php echo substr($lista->razao, 0, 30) . '...'; ?></td>
                                            <td><?php echo substr($lista->projeto, 0, 18) . '...'; ?></td>
                                            <td><?php echo databr($lista->datacontrato); ?></td>
                                            <td><?php echo 'R$ ' . moedabr($lista->valormobilizacao); ?></td>
                                            <td><?php echo 'R$ ' . moedabr($lista->valordesmobilizacao); ?></td>
                                            <td><?php echo $lista->maoobra == 'N' ? 'SEM OPERADOR' : 'COM OPERADOR'; ?></td>
                                            </td>
                                            <td align="">


                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">

                                                        <?php if ($lista->contratostatus == '1') : ?>
                                                            <a href="<?php echo URL_BASE . 'contratopre/edit/' . $lista->id_contrato; ?>" class="dropdown-item green">
                                                                <i class="fa fa-pencil"></i> Editar
                                                            </a>
                                                        <?php else : ?>
                                                            <a class="dropdown-item" href="#"><i class="<?php echo $icon; ?>"></i> Editar</a>
                                                        <?php endif; ?>

                                                        <a href="<?php echo URL_BASE . 'contratopre/ativar/' . $lista->id_contrato; ?>" class="dropdown-item <?php echo  $corA; ?>"><i class="<?php echo $icon; ?>"></i>
                                                            <?php echo $ativar; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>