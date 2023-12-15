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
                <h2 class="blue"><i class="fa fa-eye"></i> Visualização completa do Equipamento</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?php
                $this->verMsg();
                $this->verErro();
                ?>

                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group row">
                        <div class="mb-3 col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Placa *</label>
                            <input type="text" name="marca" class="form-control" disabled value="<?php echo ($equipamento->placa) ? $equipamento->placa : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Marca *</label>
                            <input type="text" name="marca" class="form-control" disabled value="<?php echo ($equipamento->marca) ? $equipamento->marca : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Modelo *</label>
                            <input type="text" name="modelo" class="form-control" disabled value="<?php echo ($equipamento->modelo) ? $equipamento->modelo : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Chassi *</label>
                            <input type="text" name="chassi" class="form-control" disabled value="<?php echo ($equipamento->chassi) ? $equipamento->chassi : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Renavan *</label>
                            <input type="text" name="renavan" class="form-control" disabled value="<?php echo ($equipamento->renavan) ? $equipamento->renavan : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Ano / Modelo*</label>
                            <input type="text" name="anomodelo" class="form-control" id="exampleFormControlInput1" disabled value="<?php echo ($equipamento->anomodelo) ? $equipamento->anomodelo : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipo / Categoria *</label>
                            <input type="text" name="tipocategoria" class="form-control" id="exampleFormControlInput1" disabled value="<?php echo ($equipamento->tipocategoria) ? $equipamento->tipocategoria : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Proprietário *</label>
                            <input type="text" name="proprietario" disabled class="form-control" id="exampleFormControlInput1" value="<?php echo ($equipamento->proprietario) ? $equipamento->proprietario : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">CNPJ / CPF *</label>
                            <input type="text" name="cpf_cnpj" disabled class="form-control" id="exampleFormControlInput1" value="<?php echo ($equipamento->cpf_cnpj) ? $equipamento->cpf_cnpj : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipo Genérico *</label>
                            <input type="text" name="tipo_generico" disabled class="form-control" id="exampleFormControlInput1" value="<?php echo ($equipamento->tipo_generico) ? $equipamento->tipo_generico : NULL; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="md-3 sm-3">
                            <a href="<?php echo URL_BASE . 'equipamento/edit/' . $equipamento->id_equipamento; ?>" class="btn btn-success">Editar</a>
                        </div>
                        <div class="md-3 sm-3">
                            <button class="btn btn-primary pull-right ml-4" onclick="window.print();"><i class="fa fa-print"></i> Imprimir </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>