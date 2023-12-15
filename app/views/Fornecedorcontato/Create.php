<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-briefcase"></i> Contato </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'fornecedorcontato'; ?>" class="btn btn-outline-secondary">
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
                <form action="<?php echo URL_BASE . 'fornecedorcontato/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Telefone<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" data-inputmask="'mask' : '(99) 9 9999-9999'" maxlength="16" name="telefone" id="first-name" required="required" value="<?php echo ($fornecedorcontato->telefone) ? $fornecedorcontato->telefone : NULL; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" name="email" id="first-name" required="required" value="<?php echo ($fornecedorcontato->email) ? $fornecedorcontato->email : NULL; ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Responsável<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="responsavel" id="first-name" required="required" value="<?php echo ($fornecedorcontato->responsavel) ? $fornecedorcontato->responsavel : NULL; ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fornecedor<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_fornecedor" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($fornecedor as $fornecedor) { ?>
                                    <option value="<?php echo $fornecedor->id_fornecedor; ?>" <?php echo $fornecedor->id_fornecedor == $fornecedorcontato->id_fornecedor ? 'Selected' : '' ?>><?php echo $fornecedor->razao; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">Limpar</button>
                            <input type="hidden" name="id_fornecedorcontato" value='<?php echo isset($fornecedorcontato->id_fornecedorcontato) ? $fornecedorcontato->id_fornecedorcontato : NULL; ?>'>
                            <button type="submit" class="btn btn-success"><?php echo isset($fornecedorcontato->id_fornecedorcontato) ? 'Atualizar' : 'Cadastrar'; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>