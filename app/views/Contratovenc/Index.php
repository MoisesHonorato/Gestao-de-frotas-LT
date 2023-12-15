<div class="page-title">
    <div class="title_left">
        <h3 class=""><i class="fa fa-calendar" aria-hidden="true"></i> Vencimento <small>- Contrato</small> </h3>
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
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                                <thead>
                                    <tr>
                                        <th class="col">Fornecedor</th>
                                        <th class="col-2">Contrato</th>
                                        <th class="col-2">Data Contrato</th>
                                        <th class="col-1">Vigência</th>
                                        <th class="col-1">Vencimento</th>
                                        <th class="col-2">Restantes</th>
                                        <th class="col-2">Projeto</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <pre>
                                    <?php foreach ($lista as $lista) {

                                        $cor = '';
                                        if ($lista->restam < 1) :
                                            $cor    = 'red';
                                        elseif ($lista->restam > 0 and $lista->restam <= 30) :
                                            $cor = 'text-warning';
                                        endif;

                                    ?>
                                        <tr class="<?php echo $cor; ?>">
                                            <td>
                                                <?php
                                                $razao = $lista->razao;
                                                echo strlen($razao) >= 26 ?
                                                    substr($razao, 0, 26) . '...' : $razao;
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $lista->contrato; ?>
                                            </td>
                                            <td>
                                                <?php echo databr($lista->datacontrato); ?>
                                            </td>
                                            <td>
                                                <?php echo $lista->vigencia; ?>
                                            </td>
                                            <td>
                                                <?php echo databr($lista->vencimento); ?>
                                            </td>
                                            <td>
                                                <?php echo $lista->restam; ?>
                                            </td>
                                            <td>
                                            <?php $proj = $lista->projeto;
                                            echo strlen($proj) >= 18 ? substr($proj, 0, 18) . '...' : $proj;
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