<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-briefcase"></i> Vigência - <small>Contrato</small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'contratovigencia'; ?>" class="btn btn-outline-secondary">
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
                <form action="<?php echo URL_BASE . 'contratovigencia/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Vigência (dias) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="number" maxlength="4" name="vigencia" id="first-name" required="required" value="<?php echo ($contratovigencia->vigencia) ? $contratovigencia->vigencia : NULL; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nº Aditivo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="number" maxlength="2" min="0" name="aditivo" id="first-name" required="required" value="<?php echo ($contratovigencia->aditivo) ? $contratovigencia->aditivo : 0; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Contrato<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_contrato" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($contratoativo as $c) { ?>
                                    <option value="<?php echo $c->id_contrato; ?>" <?php echo $c->id_contrato == $contratovigencia->id_contratovigencia ? 'Selected' : '' ?>><?php echo $c->contrato . ' - (' . $c->razao . ')'; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">Limpar</button>
                            <input type="hidden" name="id_contratovigencia" value='<?php echo isset($contratovigencia->id_contratovigencia) ? $contratovigencia->id_contratovigencia : NULL; ?>'>
                            <button type="submit" class="btn btn-success"><?php echo isset($contratovigencia->id_contratovigencia) ? 'Atualizar' : 'Cadastrar'; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>