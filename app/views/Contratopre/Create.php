<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-file-text-o"></i> Pré-Contrato </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'contratopre'; ?>" class="btn btn-outline-secondary">
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

                <form action="<?php echo URL_BASE . 'contratopre/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group row">
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Contrato *</label>
                            <?php if (isset($contrato->contrato)) { ?>

                                <input type="text" name="contrato" disabled class="form-control" required value="<?php echo $contrato->contrato; ?>">

                                <input type="hidden" name="contrato" class="form-control" required value="<?php echo $contrato->contrato; ?>">

                            <?php } else { ?>
                                <input type="text" name="contrato" class="form-control">
                            <?php } ?>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Data do contrato</label>
                            <input type="date" name="datacontrato" require class="form-control" value="<?php echo ($contrato->datacontrato) ? ($contrato->datacontrato) : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Mobilização (R$) *</label>
                            <input type="text" id="moeda" onkeyup="formatMoeda();" maxlength="10" name="valormobilizacao" require class="form-control" value="<?php echo ($contrato->valormobilizacao) ? $contrato->valormobilizacao : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="exampleFormControlInput1" require class="form-label">Desmobilização (R$) *</label>
                            <input type="text" id="moeda2" onkeyup="formatMoeda();" maxlength="10" name="valordesmobilizacao" class="form-control" id="exampleFormControlInput1" value="<?php echo ($contrato->valordesmobilizacao) ? $contrato->valordesmobilizacao : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Mão de Obras *</label>
                            <select name="maoobra" class="select1_single form-control" tabindex="-1">
                                <option value="N" <?php echo $contrato->maoobra == 'N' ? 'Selected' : '' ?>>SEM OPERADOR
                                </option>
                                <option value="S" <?php echo $contrato->maoobra == 'S' ? 'Selected' : '' ?>>COM OPERADOR
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Fornecedor *</label>
                            <select name="id_fornecedor" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($fornecedor as $f) { ?>
                                    <option value="<?php echo $f->id_fornecedor; ?>" <?php echo ($f->id_fornecedor == $contrato->id_fornecedor) ? 'Selected' : '' ?>><?php echo $f->razao; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Projeto / Obra *</label>

                            <select name="id_projeto" class="select1_single form-control" tabindex="-1">
                                <?php foreach ($projetosativos as $p) { ?>
                                    <option value="<?php echo $p->id_projeto; ?>" <?php echo ($p->id_projeto == $contrato->id_projeto) ? 'Selected' : '' ?>><?php echo $p->projeto; ?>
                                    </option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <?php if (isset($contrato->id_contrato)) { ?>
                                <input type="hidden" name="id_contrato" value="<?php echo $contrato->id_contrato; ?>">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-refresh" aria-hidden="true"></i> Atualizar</button>
                            <?php } else { ?>
                                <button class="btn btn-warning" type="reset">
                                    <i class="fa fa-eraser" aria-hidden="true"></i> Limpar</button>
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