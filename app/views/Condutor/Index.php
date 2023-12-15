<div class="page-title">
    <div class="title_left">
        <h3> Condutor <small>- Encarregado</small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'condutor/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa fa-file-o" aria-hidden="true"></i> Cadastrar</a>
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
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                                <thead>
                                    <tr>
                                        <th class="col">Condutor</th>
                                        <th class="col">Encarregado</th>
                                        <th class="col">Nº CNH</th>
                                        <th class="col">Categoria</th>
                                        <th class="col">Emissão</th>
                                        <th class="col">Vencimento</th>
                                        <th class="col">CPF</th>
                                        <th class="col">Observação</th>
                                        <th class="col">Projeto</th>
                                        <th class="col">Status</th>
                                        <th class="col">Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista as $lista) {

                                        if ($lista->ativo == 'S') :
                                            $status = 'Ativado';
                                            $icon   = 'fa fa-check-circle-o';
                                            $cor  = 'green';
                                        else :
                                            $status = 'Desativado';
                                            $icon   = 'fa fa-ban';
                                            $cor  = '';
                                        endif;
                                    ?>
                                        <tr>
                                            <td><?php echo $lista->condutor; ?></td>
                                            <td><?php echo $lista->encarregado; ?></td>
                                            <td><?php echo $lista->cnh; ?></td>
                                            <td><?php echo $lista->categoria; ?></td>
                                            <td><?php echo databr($lista->emissao); ?></td>
                                            <td><?php echo databr($lista->vencimento); ?></td>
                                            <td><?php echo formatCPF($lista->cpf); ?></td>
                                            <td><?php echo $lista->observacao; ?></td>
                                            <td><?php echo $lista->projeto; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td align="">
                                                <a href="<?php echo URL_BASE . 'condutor/edit/' . $lista->id_mot_enc; ?>" class="mr-2 green">
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