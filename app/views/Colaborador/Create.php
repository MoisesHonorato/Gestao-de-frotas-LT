<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-briefcase"></i> Colaborador </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'colaborador'; ?>" class="btn btn-outline-secondary">
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
                <form action="<?php echo URL_BASE . 'colaborador/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nome<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nome" id="first-name" required="required" value="<?php echo ($colaborador->nome) ? $colaborador->nome : NULL; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Função<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_funcao" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($funcao as $funcao) { ?>
                                    <option value="<?php echo $funcao->id_funcao; ?>" <?php echo $funcao->id_funcao == $colaborador->id_funcao ? 'Selected' : NULL ?>><?php echo $funcao->funcao; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Projeto / Obra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_projeto" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($projeto as $projeto) { ?>
                                    <option value="<?php echo $projeto->id_projeto; ?>" <?php echo $projeto->id_projeto == $colaborador->id_projeto ? 'Selected' : '' ?>><?php echo $projeto->projeto; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">Limpar</button>
                            <input type="hidden" name="id_colaborador" value='<?php echo isset($colaborador->id_colaborador) ? $colaborador->id_colaborador : NULL; ?>'>
                            <button type="submit" class="btn btn-success"><?php echo isset($colaborador->id_colaborador) ? 'Atualizar' : 'Cadastrar'; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>