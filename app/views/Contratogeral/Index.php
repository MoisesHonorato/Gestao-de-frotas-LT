<div class="page-title">
    <div class="title_left">
        <h3> Geral <small>Contrato</small> </h3>
    </div>
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
                                        <th class="col">Vencimento</th>
                                        <th class="col">Dias a vencer</th>
                                        <th class="col">Projeto</th>
                                        <th class="col">Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista as $lista) {

                                        $cortr = '';

                                        if ($lista->restam < 1) :
                                            $cortr    = 'red';
                                        elseif ($lista->restam > 0 and $lista->restam <= 30) :
                                            $cortr = 'text-warning';
                                        endif;

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
                                        <tr class="<?php echo $cortr; ?>">
                                            <td><?php echo $lista->contrato; ?></td>
                                            <td>
                                                <?php
                                                $razao = $lista->razao;
                                                echo strlen($razao) >= 26 ? substr($razao, 0, 26) . '...' : $razao;
                                                ?>
                                            </td>
                                            <td><?php echo databr($lista->vencimento); ?></td>
                                            <td><?php echo $lista->restam; ?></td>
                                            <td>
                                                <?php
                                                $projeto = $lista->projeto;
                                                echo strlen($projeto) >= 18 ? substr($projeto, 0, 18) . '...' : $projeto;
                                                ?>
                                            </td>
                                            <td align="">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">

                                                        <?php if ($lista->contratostatus == '1') : ?>
                                                            <a href="<?php echo URL_BASE . 'contratogeral/ver/' . $lista->id_contrato; ?>" class="dropdown-item green">
                                                                <i class="fa fa-eye"></i> Visualizar
                                                            </a>
                                                        <?php else : ?>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-eye-slash"></i> Editar</a>
                                                        <?php endif; ?>

                                                        <a href="<?php echo URL_BASE . 'contratogeral/ativar/' . $lista->id_contrato; ?>" class="dropdown-item <?php echo  $corA; ?>"><i class="<?php echo $icon; ?>"></i>
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