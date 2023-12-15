<div class="page-title">
    <div class="title_left">
        <h3> Dados Bancários </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'fornecedorbanco/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Cadastrar</a>

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
                                        <th class="col-2">CNPJ</th>
                                        <th class="col-2">Banco</th>
                                        <th class="col-2">Agência</th>
                                        <th class="col-2">Conta</th>
                                        <th class="col">Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista as $lista) { ?>
                                        <tr>
                                            <td><?php echo $lista->razao; ?></td>
                                            <td><?php echo formatCNPJ($lista->cnpj); ?></td>
                                            <td><?php echo $lista->banco; ?></td>
                                            <td><?php echo $lista->agencia; ?></td>
                                            <td><?php echo $lista->conta; ?></td>
                                            <td align="">
                                                <a href="<?php echo URL_BASE . 'fornecedorbanco/edit/' . $lista->id_fornecedorbanco ?>" class="mr-2 green">
                                                    <i class='fa fa-pencil'></i> Editar</a>
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