<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-briefcase"></i> Fornecedor </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'fornecedor'; ?>" class="btn btn-outline-secondary">
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

                <form action="<?php echo URL_BASE . 'fornecedor/salvar' ?>" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Razão Social*</label>
                            <input type="text" name="razao" class="form-control" required value="<?php echo ($fornecedor->razao) ? $fornecedor->razao : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Nome Fantasia</label>
                            <input type="text" name="fantasia" class="form-control" id="exampleFormControlInput1" value="<?php echo ($fornecedor->fantasia) ? $fornecedor->fantasia : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">CNPJ*</label>
                            <input type="text" name="cnpj" class="form-control" id="exampleFormControlInput1" required value="<?php echo ($fornecedor->cnpj) ? $fornecedor->cnpj : NULL; ?>" <?php echo ($fornecedor->cnpj) ? "value='$fornecedor->cnpj'" : NULL; ?>>
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                            <label for="exampleFormControlInput1" class="form-label">Tipo*</label>
                            <select name="tipo" class="select1_single form-control" tabindex="-1">
                                <option value='FORNECEDOR' <?php echo ($fornecedor->tipo == 'FORNECEDOR') ? 'selected' : NULL ?>>FORNECEDOR</option>
                                <option value='LOCADOR' <?php echo ($fornecedor->tipo == 'LOCADOR') ? 'selected' : NULL ?>>LOCADOR</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Rua*</label>
                            <input type="text" name="endereco" class="form-control" id="exampleFormControlInput1" required value="<?php echo ($fornecedor->endereco) ? $fornecedor->endereco : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Número*</label>
                            <input type="text" name="numero" class="form-control" id="exampleFormControlInput1" placeholder="" required value="<?php echo ($fornecedor->numero) ? $fornecedor->numero : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Bairro*</label>
                            <input type="text" name="bairro" class="form-control" id="exampleFormControlInput1" value="<?php echo ($fornecedor->bairro) ? $fornecedor->bairro : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Cidade*</label>
                            <input type="text" name="cidade" class="form-control" id="exampleFormControlInput1" value="<?php echo ($fornecedor->cidade) ? $fornecedor->cidade : NULL; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">CEP*</label>
                            <input type="text" name="cep" class="form-control" data-inputmask="'mask' : '99.999-999'" placeholder="99.999-999" maxlength="10" required value="<?php echo ($fornecedor->cep) ? $fornecedor->cep : NULL; ?>">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Estado*</label>
                            <select name="uf" class="select1_single form-control" tabindex="-1">
                                <option value='AC' <?php echo ($fornecedor->uf == 'AC') ? 'selected' : NULL ?>>AC</option>
                                <option value='AL' <?php echo ($fornecedor->uf == 'AL') ? 'selected' : NULL ?>>AL</option>
                                <option value='AM' <?php echo ($fornecedor->uf == 'AM') ? 'selected' : NULL ?>>AM</option>
                                <option value='AP' <?php echo ($fornecedor->uf == 'AP') ? 'selected' : NULL ?>>AP</option>
                                <option value='BA' <?php echo ($fornecedor->uf == 'BA') ? 'selected' : NULL ?>>BA</option>
                                <option value='CE' <?php echo ($fornecedor->uf == 'CE') ? 'selected' : NULL ?>>CE</option>
                                <option value='DF' <?php echo ($fornecedor->uf == 'DF') ? 'selected' : NULL ?>>DF</option>
                                <option value='ES' <?php echo ($fornecedor->uf == 'ES') ? 'selected' : NULL ?>>ES</option>
                                <option value='GO' <?php echo ($fornecedor->uf == 'GO') ? 'selected' : NULL ?>>GO</option>
                                <option value='MA' <?php echo ($fornecedor->uf == 'MA') ? 'selected' : NULL ?>>MA</option>
                                <option value='MG' <?php echo ($fornecedor->uf == 'MG') ? 'selected' : NULL ?>>MG</option>
                                <option value='MS' <?php echo ($fornecedor->uf == 'MS') ? 'selected' : NULL ?>>MS</option>
                                <option value='MT' <?php echo ($fornecedor->uf == 'MT') ? 'selected' : NULL ?>>MT</option>
                                <option value='PA' <?php echo ($fornecedor->uf == 'PA') ? 'selected' : NULL ?>>PA</option>
                                <option value='PB' <?php echo ($fornecedor->uf == 'PB') ? 'selected' : NULL ?>>PB</option>
                                <option value='PE' <?php echo ($fornecedor->uf == 'PE') ? 'selected' : NULL ?>>PE</option>
                                <option value='PI' <?php echo ($fornecedor->uf == 'PI') ? 'selected' : NULL ?>>PI</option>
                                <option value='PR' <?php echo ($fornecedor->uf == 'PR') ? 'selected' : NULL ?>>PR</option>
                                <option value='RJ' <?php echo ($fornecedor->uf == 'RJ') ? 'selected' : NULL ?>>RJ</option>
                                <option value='RN' <?php echo ($fornecedor->uf == 'RN') ? 'selected' : NULL ?>>RN</option>
                                <option value='RO' <?php echo ($fornecedor->uf == 'RO') ? 'selected' : NULL ?>>RO</option>
                                <option value='RR' <?php echo ($fornecedor->uf == 'RR') ? 'selected' : NULL ?>>RR</option>
                                <option value='RS' <?php echo ($fornecedor->uf == 'RS') ? 'selected' : NULL ?>>RS</option>
                                <option value='SC' <?php echo ($fornecedor->uf == 'SC') ? 'selected' : NULL ?>>SC</option>
                                <option value='SE' <?php echo ($fornecedor->uf == 'SE') ? 'selected' : NULL ?>>SE</option>
                                <option value='SP' <?php echo ($fornecedor->uf == 'SP') ? 'selected' : NULL ?>>SP</option>
                                <option value='TO' <?php echo ($fornecedor->uf == 'TO') ? 'selected' : NULL ?>>TO</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Logo </label>
                            <input type="file" name="arquivo" value="<?php echo $fornecedor->logo ?>" class="form-control" id="imgUp" id="arquivo" onchange="pegaArquivo(this.files)">
                            <div id="uploadStatus"></div>
                        </div>
                        <div class="ln_solid"></div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-warning" type="reset">Limpar</button>
                            <input type="hidden" name="id_fornecedor" value="<?php echo isset($fornecedor->id_fornecedor) ? $fornecedor->id_fornecedor : NULL; ?>">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                        <div id="uploadStatus"></div>
                    </div>
                </form>

                <script>
                    function pegaArquivo(files) {
                        var file = files[0];
                        const fileReader = new FileReader();
                        fileReader.onloadend = function() {
                            $("#imgUp").attr("src", fileReader.result);
                        }
                        fileReader.readAsDataURL(file);
                    }
                </script>
            </div>
        </div>
    </div>

</div>