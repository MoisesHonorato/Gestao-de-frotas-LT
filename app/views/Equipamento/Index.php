<div class="page-title">
    <div class="title_left">
        <h3> Equipamento </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'equipamento/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Cadastrar</a>

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
                                        <th class="col-2">Placa</th>
                                        <th class="col-2">Marca</th>
                                        <th class="col-2">Modelo</th>
                                        <th class="col-3">Tipo/Categoria</th>
                                        <th class="col-3">Tipo Genérico</th>
                                        <th class="col">Ação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista as $lista) {

                                        if ($lista->ativo == 'S') :
                                            $ativar = 'Ativado';
                                            $icon   = 'fa fa-check-circle-o';
                                            $cor  = 'green';
                                        else :
                                            $ativar = 'Desativado';
                                            $icon   = 'fa fa-ban';
                                            $cor  = '';
                                        endif;
                                    ?>
                                        <tr>
                                            <td><?php echo $lista->placa; ?></td>
                                            <td><?php echo $lista->marca; ?></td>
                                            <td><?php echo $lista->modelo; ?></td>
                                            <td><?php echo $lista->tipocategoria; ?></td>
                                            <td><?php echo $lista->tipo_generico; ?></td>
                                            <td align="">

                                                <a href="<?php echo URL_BASE . 'equipamento/ver/' . $lista->id_equipamento; ?>" class="mr-2 green"><i class=""><i class="fa fa-eye"></i></i> Ver
                                                </a>|

                                                <a href="<?php echo URL_BASE . 'equipamento/edit/' . $lista->id_equipamento; ?>" class="mr-2 blue"><i class=""><i class="fa fa-pencil"></i></i> Editar
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