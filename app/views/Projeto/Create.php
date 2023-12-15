<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-briefcase"></i> Projeto/Obra </h3>
    </div>
        <!-- botão adicionar -->
        <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'projeto'; ?>" class="btn btn-outline-secondary">
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
                <form action="<?php echo URL_BASE . 'projeto/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Projeto/Obra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="projeto" id="first-name" required="required" value="<?php echo ($projeto->projeto) ? $projeto->projeto : NULL; ?>" class="form-control" placeholder="Nome do projeto/obra">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Empreendimento<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="empreendimento" id="first-name" required="required" value="<?php echo ($projeto->empreendimento) ? $projeto->empreendimento : NULL; ?>" class="form-control" placeholder="Nome do empreendimento">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">Limpar</button>
                            <input type="hidden" name="id_projeto" value='<?php echo isset($projeto->id_projeto) ? $projeto->id_projeto : NULL; ?>'>
                            <button type="submit" class="btn btn-success"><?php echo isset($projeto->id_projeto) ? 'Atualizar' : 'Cadastrar'; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>