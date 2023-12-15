<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-briefcase"></i> Equipamentos </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'equipamento'; ?>" class="btn btn-outline-secondary">
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

                <form action="<?php echo URL_BASE . 'equipamento/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="mb-3 col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Placa *</label>
                            <?php if (isset($equipamento->placa)) { ?>

                                <input type="text" name="placa" disabled class="form-control" required value="<?php echo $equipamento->placa; ?>">

                                <input type="hidden" name="placa" class="form-control" required value="<?php echo $equipamento->placa; ?>">

                            <?php } else { ?>
                                <input type="text" name="placa" class="form-control">
                            <?php } ?>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Marca *</label>
                            <input type="text" name="marca" class="form-control" required value="<?php echo ($equipamento->marca) ? $equipamento->marca : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Modelo *</label>
                            <input type="text" name="modelo" class="form-control" required value="<?php echo ($equipamento->modelo) ? $equipamento->modelo : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Chassi *</label>
                            <input type="text" name="chassi" class="form-control" required value="<?php echo ($equipamento->chassi) ? $equipamento->chassi : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Renavan *</label>
                            <input type="text" name="renavan" class="form-control" required value="<?php echo ($equipamento->renavan) ? $equipamento->renavan : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Ano / Modelo*</label>
                            <input type="text" name="anomodelo" class="form-control" id="exampleFormControlInput1" required value="<?php echo ($equipamento->anomodelo) ? $equipamento->anomodelo : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipo / Categoria *</label>
                            <input type="text" name="tipocategoria" class="form-control" id="exampleFormControlInput1" required value="<?php echo ($equipamento->tipocategoria) ? $equipamento->tipocategoria : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Proprietário *</label>
                            <input type="text" name="proprietario" class="form-control" id="exampleFormControlInput1" value="<?php echo ($equipamento->proprietario) ? $equipamento->proprietario : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">CNPJ / CPF *</label>
                            <input type="text" name="cpf_cnpj" class="form-control" id="exampleFormControlInput1" value="<?php echo ($equipamento->cpf_cnpj) ? $equipamento->cpf_cnpj : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipo Genérico *</label>
                            <input type="text" name="tipo_generico" class="form-control" id="exampleFormControlInput1" value="<?php echo ($equipamento->tipo_generico) ? $equipamento->tipo_generico : NULL; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <?php if (isset($equipamento->id_equipamento)) { ?>
                                <input type="hidden" name="id_equipamento" value="<?php echo $equipamento->id_equipamento; ?>">
                                <button type="submit" class="btn btn-success">Atualizar</button>
                            <?php } else { ?>
                                <button class="btn btn-warning" type="reset">Limpar</button>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            <?php } ?>
                        </div>
                        <div id="uploadStatus"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>