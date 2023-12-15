<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-user"></i> Encarregado <small>- Atividade</small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'encarregado'; ?>" class="btn btn-outline-secondary">
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
                <form action="<?php echo URL_BASE . 'encarregado/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Encarregado<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_colaborador" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($colaborador as $enc) { ?>

                                    <option value="<?php echo $enc->id_colaborador; ?>" <?php echo $enc->id_colaborador == $encarregado->id_colaborador ? 'Selected' : '' ?>>
                                        <?php echo $enc->nome . ' - ' . $enc->funcao; ?>
                                    </option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Atividade<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_cc_atividade" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($atividade as $atividade) { ?>

                                    <option value="<?php echo $atividade->id_cc_atividade; ?>" <?php echo $atividade->id_cc_atividade == $encarregado->id_cc_atividade ? 'Selected' : '' ?>>
                                        <?php
                                        echo $atividade->atividade . ' - ' . $atividade->centrocusto;
                                        ?>
                                    </option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">
                                <i class="fa fa-eraser" aria-hidden="true"></i> Limpar
                            </button>
                            <input type="hidden" name="id_encarregado" value='<?php echo isset($encarregado->id_encarregado) ? $encarregado->id_encarregado : NULL; ?>'>
                            <button type="submit" class="btn btn-success"><?php echo isset($encarregado->id_encarregado) ? '<i class="fa fa-refresh" aria-hidden="true"></i> Atualizar' : '<i class="fa fa-plus"></i> Cadastrar'; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>