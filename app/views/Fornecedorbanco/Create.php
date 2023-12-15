<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-briefcase"></i> Dados Bancários </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'fornecedorbanco'; ?>" class="btn btn-outline-secondary">
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
                <form action="<?php echo URL_BASE . 'fornecedorbanco/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Banco <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="banco" id="first-name" required="required" value="<?php echo ($fornecedorbanco->banco) ? $fornecedorbanco->banco : NULL; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Agência-Dig <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="agencia" id="first-name" required="required" value="<?php echo ($fornecedorbanco->agencia) ? $fornecedorbanco->agencia : NULL; ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Conta-Dig <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="conta" id="first-name" required="required" value="<?php echo ($fornecedorbanco->conta) ? $fornecedorbanco->conta : NULL; ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fornecedor <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_fornecedor" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($fornecedor as $fornecedor) { ?>
                                    <option value="<?php echo $fornecedor->id_fornecedor; ?>" <?php echo $fornecedor->id_fornecedor == $fornecedorbanco->id_fornecedor ? 'Selected' : '' ?>><?php echo $fornecedor->razao; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">Limpar</button>
                            <input type="hidden" name="id_fornecedorbanco" value='<?php echo isset($fornecedorbanco->id_fornecedorbanco) ? $fornecedorbanco->id_fornecedorbanco : NULL; ?>'>
                            <button type="submit" class="btn btn-success"><?php echo isset($fornecedorbanco->id_fornecedorbanco) ? 'Atualizar' : 'Cadastrar'; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>