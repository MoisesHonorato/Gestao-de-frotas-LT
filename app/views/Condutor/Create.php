<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-user"></i> Condutor <small>- Encarregado </small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'condutor'; ?>" class="btn btn-outline-secondary">
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

                <form action="<?php echo URL_BASE . 'condutor/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="mb-3 col-md-9">
                            <label for="exampleFormControlInput1" class="form-label">Condutor *</label>
                            <select name="id_motorista" class="select1_single form-control select2" tabindex="-1">
                                <?php foreach ($condutor as $con) { ?>

                                    <option value="<?php echo $con->id_colaborador; ?>" <?php echo $con->id_colaborador == $motorista->id_motorista ? 'Selected' : '' ?>>
                                        <?php echo $con->nome . ' - ' . $con->funcao; ?>
                                    </option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">CPF *</label>
                            <input id="campoCPF" type="text" name="cpf" class="form-control" maxlength="14" required value="<?php echo $motorista->cpf ? $motorista->cpf : NULL; ?>">

                            <script type="text/javascript">
                                const input4 = document.getElementById('campoCPF');
                                input4.addEventListener('keyup', formatarCPF);

                                function formatarCPF(e) {
                                    var v = e.target.value.replace(/\D/g, "");
                                    v = v.replace(/(\d{3})(\d)/, "$1.$2");
                                    v = v.replace(/(\d{3})(\d)/, "$1.$2");
                                    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
                                    e.target.value = v;
                                }
                            </script>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Nº CNH *</label>
                            <input type="text" name="cnh" class="form-control" required value="<?php echo ($motorista->cnh) ? $motorista->cnh : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Categoria*</label>
                            <input type="text" name="categoria" class="form-control" id="exampleFormControlInput1" required value="<?php echo ($motorista->categoria) ? $motorista->categoria : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Data de emissão *</label>
                            <input type="date" name="emissao" class="form-control" id="exampleFormControlInput1" required value="<?php echo ($motorista->emissao) ? $motorista->emissao : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Data de vencimento *</label>
                            <input type="date" name="vencimento" class="form-control" id="exampleFormControlInput1" required value="<?php echo ($motorista->vencimento) ? $motorista->vencimento : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Encarregado *</label>
                            <select name="id_encarregado" class="select1_single form-control select2" tabindex="-1">
                                <?php foreach ($encarregado as $enc) { ?>

                                    <option value="<?php echo $enc->id_colaborador; ?>" <?php echo $enc->id_colaborador == $motorista->id_encarregado ? 'Selected' : '' ?>>
                                        <?php echo $enc->nome . ' - ' . $enc->funcao; ?>
                                    </option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="mb-3 col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Observação *</label>
                            <textarea for="exampleFormControlInput1" class="form-control" name="observacao" cols="30" rows="3"><?php echo ($motorista->observacao) ? $motorista->observacao : NULL; ?></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">
                                <i class="fa fa-eraser" aria-hidden="true"></i> Limpar
                            </button>
                            <input type="hidden" name="id_mot_enc" value='<?php echo isset($motorista->id_mot_enc) ? $motorista->id_mot_enc : NULL; ?>'>
                            <button type="submit" class="btn btn-success">
                                <?php echo isset($motorista->id_mot_enc) ? '<i class="fa fa-refresh" aria-hidden="true"></i> Atualizar' : '<i class="fa fa-plus"></i> Cadastrar'; ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>