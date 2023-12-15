<div class="page-title">
    <div class="title_left">
        <h3> Atividade <small>- Centro de Custo</small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'centrocustoatividade/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Cadastrar</a>

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
                                        <th class="col-2">Centro de Custo</th>
                                        <th class="col">Descrição CC</th>
                                        <th class="col">Atividade</th>
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
                                            <td><?php echo $lista->centrocusto; ?></td>
                                            <td><?php echo $lista->descricao; ?></td>
                                            <td><?php echo $lista->atividade; ?></td>
                                            <td><?php echo $lista->projeto; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td align="">
                                                <?php
                                                if ($lista->ativo == 'S') :
                                                    echo "<a href='URL_BASE . 'centrocustoatividade/edit/' . $lista->id_cc_atividade' class='mr-2 green'>
                                                    <i class='fa fa-pencil'></i> Editar</a>";
                                                else :
                                                    echo "<i class='fa fa-ban'></i> Editar</a>";
                                                endif;
                                                ?>
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