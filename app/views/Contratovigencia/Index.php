<div class="page-title">
    <div class="title_left">
        <h3> Vigência - <small>Contrato</small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">

                <a href="<?php echo URL_BASE . 'contratovigencia/create'; ?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Cadastrar</a>

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
                                        <th class="col-4">Fornecedor</th>
                                        <th class="col-3">Contrato</th>
                                        <th class="col-2">Vigencia</th>
                                        <!-- <th class="col-2">Data Cadastro</th> -->
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
                                        <tr <?php echo $status == 'Desativado' ? "class='aero'" : null ;?>>
                                            <td><?php echo substr($lista->razao, 0, 30) . '...'; ?></td>
                                            <td>
                                                <?php
                                                echo $lista->contrato;
                                                echo $lista->aditivo ? '-ADT' . $lista->aditivo : ''; ?>
                                            </td>
                                            <td><?php echo $lista->vigencia . ' (dias)'; ?></td>
                                            <!-- <td><?php //echo databr($lista->data_cadastro); ?></td> -->
                                            </td>
                                            <td align="">
                                                    <a href="<?php echo URL_BASE . 'contratovigencia/edit/' . $lista->id_contratovigencia; ?>" class="green">
                                                        <i class="fa fa-pencil"></i> Editar
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