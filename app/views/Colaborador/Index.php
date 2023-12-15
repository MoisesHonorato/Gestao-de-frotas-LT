<div class="page-title">
    <div class="title_left">
        <h3> Colaborador </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'colaborador/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Cadastrar</a>

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
                                        <th class="col-4">Nome</th>
                                        <th class="col-3">Função</th>
                                        <th class="col-4">Projeto</th>
                                        <th class="col-2">Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista as $lista) {

                                        if ($lista->status == 'S') :
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
                                            <td><?php echo $lista->nome; ?></td>
                                            <td><?php echo $lista->funcao; ?></td>
                                            <td><?php echo $lista->projeto; ?></td>
                                            <td align="">
                                                <?php
                                                if ($lista->status == 'S') :
                                                    echo "<a href=' " . URL_BASE . "colaborador/edit/$lista->id_colaborador' class='mr-2 green'>
                                                    <i class='fa fa-pencil'></i> Editar</a> |";
                                                endif;
                                                ?>
                                                <a href="<?php echo URL_BASE . 'colaborador/ativar/' . $lista->id_projeto; ?>" class="<?php echo  $cor; ?>">
                                                    <i class="<?php echo $icon; ?>"></i>
                                                    <?php echo $status; ?>
                                                </a>
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