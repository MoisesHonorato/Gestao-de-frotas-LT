<div class="page-title">
    <div class="title_left">
        <h3> Objeto - <small>Contrato</small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'contratoobjeto/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-file-o" aria-hidden="true"></i> Cadastrar</a>

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
                                        <th class="col-3">Fornecedor</th>
                                        <th class="col">Contrato</th>
                                        <th class="col">Placa</th>
                                        <th class="col">Tipo / Categoria</th>
                                        <th class="col">Valor</th>
                                        <th class="col">Data Mobilização</th>
                                        <th class="col">Data Desmobilização</th>
                                        <th class="col-2">Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista as $lista) {

                                        if ($lista->contratostatus == '1') :
                                            $status = 'Ativado';
                                            $icon   = 'fa fa-pencil';
                                            $cor  = 'green';
                                        else :
                                            $status = 'Desativado';
                                            $icon   = 'fa fa-ban';
                                            $cor  = '';
                                        endif;
                                    ?>
                                        <tr>
                                            <td><?php echo $lista->razao; ?></td>
                                            <td><?php echo $lista->contrato; ?></td>
                                            <td><?php echo $lista->placa; ?></td>
                                            <td><?php echo $lista->tipocategoria; ?></td>
                                            <td><?php echo 'R$ ' . moedabr($lista->valor); ?></td>
                                            <td><?php echo databr($lista->mobilizacao); ?></td>
                                            <td><?php echo ($lista->desmobilizacao != '1900-01-01') ? ($lista->desmobilizacao == null ? databr($lista->desmobilizacao) : '***') : '***'; ?></td>
                                            </td>
                                            <td align="">

                                                <?php if ($lista->contratostatus == '1') : ?>
                                                    <a href="<?php echo URL_BASE . 'contratoobjeto/edit/' . $lista->id_contratoobjeto; ?>" class="green">
                                                        <i class="fa fa-pencil"></i> Editar
                                                    </a>
                                                <?php else : ?>
                                                    <i class=""><i class="<?php echo $icon; ?>"></i></i> Editar
                                                <?php endif; ?>

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