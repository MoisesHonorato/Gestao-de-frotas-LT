<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-truck"></i> Objeto - <small>Contrato</small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'contratoobjeto'; ?>" class="btn btn-outline-secondary">
                    <i class="fa fa-reply"></i> Voltar </a>
            </div>
        </div>
    </div>
    <!-- /botão adicionar -->
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-plus"></i> Cadastro</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?php
                $this->verMsg();
                $this->verErro();
                ?>
                <form action="<?php echo URL_BASE . 'contratoobjeto/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Equipamento<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_equipamento" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($equipamento as $e) { ?>
                                    <option value="<?php echo $e->id_equipamento; ?>" <?php echo $e->id_equipamento == $contratoobjeto->id_equipamento ? 'Selected' : '' ?>><?php echo $e->placa . ' - (' . $e->tipocategoria . ')'; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <a class="btn btn-success" href="<?php echo URL_BASE . 'equipamento/create' ?>">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Valor R$ <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="moeda" onkeyup="formatMoeda();" maxlength="10" name="valor" id="first-name" required="required" value="<?php echo ($contratoobjeto->valor) ? $contratoobjeto->valor : NULL; ?>" class="form-control">
                        </div>

                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Data de mobilização <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="mobilizacao" id="first-name" required="required" value="<?php echo ($contratoobjeto->mobilizacao) ? $contratoobjeto->mobilizacao : NULL; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Data de Desmobilização <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="desmobilizacao" id="first-name" value="<?php echo ($contratoobjeto->desmobilizacao != '1900-01-01') ? $contratoobjeto->desmobilizacao : '1900-01-01'; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="status" class="select1_single form-control" tabindex="-1">

                                <option <?php echo ($contratoobjeto->status == 'A DISPOSIÇÃO') ? "value='A DISPOSIÇÃO' Selected" : NULL; ?>>À DISPOSIÇÃO</option>

                                <option <?php echo ($contratoobjeto->status == 'DESMOBILIZADO') ? "value='DESMOBILIZADO' Selected" : NULL; ?>>DESMOBILIZADO</option>

                                <option <?php echo ($contratoobjeto->status == 'EM ATIVIDADE') ? "value='EM ATIVIDADE' Selected" : NULL; ?>>EM ATIVIDADE</option>

                                <option <?php echo ($contratoobjeto->status == 'EM MANUTENÇÃO') ? "value='EM MANUTENÇÃO' Selected" : NULL; ?>>EM MANUTENÇÃO</option>

                                <option <?php echo ($contratoobjeto->status == 'SUSPENSÃO') ? "value='SUSPENSÃO' Selected" : NULL; ?>>SUSPENSÃO</option>

                                <option <?php echo ($contratoobjeto->status == 'TRANSFERIDO') ? "value='TRANSFERIDO' Selected" : NULL; ?>>TRANSFERIDO</option>

                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Contrato<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_contrato" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($contratoativo as $c) { ?>
                                    <option value="<?php echo $c->id_contrato; ?>" <?php echo $c->id_contrato == $contratoobjeto->id_contrato ? 'Selected' : '' ?>><?php echo $c->contrato . ' - (' . $c->razao . ')'; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">

                            <?php if (isset($contratoobjeto->id_contratoobjeto)) { ?>
                                <input type="hidden" name="id_contratoobjeto" value="<?php echo $contratoobjeto->id_contratoobjeto; ?>">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-refresh"></i> Atualizar</button>
                            <?php } else { ?>
                                <button class="btn btn-warning" type="reset">
                                    <i class="fa fa-eraser"></i> Limpar</button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i> Cadastrar</button>
                            <?php } ?>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

