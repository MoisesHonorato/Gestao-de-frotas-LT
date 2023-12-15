<div class="page-title">
    <div class="title_left">
        <h3><i class="fa fa-file-text-o"></i> Contrato<small></small> </h3>
    </div>
    <!-- botão adicionar -->
    <div class="title_right">
        <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
            <div class="input-group">
                <a href="<?php echo URL_BASE . 'contratogeral'; ?>" class="btn btn-outline-secondary">
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
                <h2 class=""> Visualização geral do Contrato</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?php
                $this->verMsg();
                $this->verErro();
                ?>

                <!-- INFORMAÇÕES DO CONTRATO -->
                <div class="bs-docs-section mb-4">
                    <h2 id="glyphicons" class="page-header blue">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <b> CONTRATO:</b>
                        <?php echo $getcontrato->contrato; ?>
                        <small> - (<?php echo $getcontrato->maoobra == 'N' ? 'Sem Operador' : 'Com Operador'; ?>)</small>
                    </h2>
                    <div class="row mt-4 ml-1">
                        <div class="col-md-12 col-sm-12">
                            <?php
                            $dias = $getcontrato->restam;
                            if ($dias < 1) {
                                $cor = 'red';
                                $msg = "<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> 
                                    <b>Opa! Venceu no dia </b>" . databr($getcontrato->vencimento) . " |
                                    <small>Já se passaram <b>" . $dias .
                                    "</b> dias.</small>";
                            } elseif (($dias <= 30) and ($dias > 0)) {
                                $cor = 'text-warning';
                                $msg = "<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> 
                                    <b>Vence no dia " . databr($getcontrato->vencimento) . " </b>|
                                    <small>Faltam <b>" . $dias . "</b> dias.</small>";
                            } else {;
                                $cor = 'green';
                                $msg = "<b>Vence no dia " . databr($getcontrato->vencimento) . "</b> |
                                    <small>Faltam <b>" . $dias . "</b> dias.</small>";
                            }
                            ?>
                            <p class="<?php echo $cor ?>">
                                <?php echo $msg; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row ml-1">
                        <div class="col-md-6 col-sm-6">
                            <p><b>Projeto</b> <?php echo $getcontrato->projeto; ?></p>
                        </div>

                        <div class="col-md-6 col-sm-3">
                            <p><b>Data do Contrato</b> <?php echo databr($getcontrato->datacontrato); ?></p>
                        </div>
                    </div>
                    <div class="row  ml-1">
                        <div class="col-md-6 col-sm-3">
                            <p><b>Valor Mobilização</b> R$ <?php echo moedabr($getcontrato->valormobilizacao); ?></p>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <p><b>Valor Desmobilização</b> R$ <?php echo moedabr($getcontrato->valordesmobilizacao); ?></p>
                        </div>
                    </div>
                </div>

                <!-- LOCADOR -->
                <div class="bs-docs-section mb-4">
                    <h2 id="glyphicons" class="page-header blue"><i class="fa fa-briefcase"></i><b> <?php echo $getcontrato->razao; ?> </b> | <small><?php echo formatCNPJ($getcontrato->cnpj); ?></small></h2>

                    <div class="row ml-2">
                        <div class="col-md-8 col-sm-6">
                            <h4 class="mt-3"><i class="fa fa-map-o" aria-hidden="true"></i><b> Endereço:</b></h4>
                            <div class="col">
                                <p>
                                    <b>Rua: </b> <?php echo $getcontrato->endereco; ?>
                                    <b> - Nº: </b> <?php echo $getcontrato->numero; ?>
                                    <b> - Bairro: </b> <?php echo $getcontrato->bairro; ?>
                                    <b> - Cidade:</b> <?php echo $getcontrato->cidade; ?>-<?php echo $getcontrato->uf; ?>
                                    <b> - CEP</b> <?php echo $getcontrato->cep; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <img src="<?php echo $getcontrato->logo ? URL_FOTO . $getcontrato->logo : ''; ?>" class="img-thumbnail" height="60">
                        </div>

                    </div>

                    <h4 class="mt-2 ml-1"> <i class="fa fa-money" aria-hidden="true"></i><b> Dados Bancários:</b></h4>
                    <div class="row ml-2">
                        <?php foreach ($dadosbancarios as $banco) { ?>
                            <div class="col-md-4 col-sm-6">
                                <b>Banco: </b> <?php echo $banco->banco; ?>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <b>Agência: </b> <?php echo $banco->agencia; ?>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <b>Conta: </b> <?php echo $banco->conta; ?>
                            </div>
                        <?php } ?>
                    </div>

                    <h4 class="mt-2 ml-2 mt-3"><i class="fa fa-phone" aria-hidden="true"></i><b> Contato:</b></h4>
                    <div class="row ml-2">

                        <div class="col-md-4 col-sm-6">
                            <b class="ml-2">Telefone: </b>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <b>E-mail: </b>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <b>Responsável: </b>
                        </div>

                    </div>
                    <div class="row ml-2">
                        <?php foreach ($getcontato as $contato) { ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="ml-2"><?php echo $contato->telefone; ?></div>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <?php echo $contato->email; ?>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <?php echo $contato->responsavel; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- OBJETO DO CONTRATO -->
                <div class="bs-docs-section mt-4">

                    <h2 id="glyphicons" class="page-header blue"><i class="fa fa-car" aria-hidden="true"></i><b> OBJETO DO CONTRATO</b></h2>

                    <?php foreach ($getobjeto as $getobjeto) {

                        if ($getobjeto->desmobilizacao > $getobjeto->mobilizacao) :
                            $desmobTrue =  $getobjeto->desmobilizacao;
                        endif;

                    ?>
                        <div class="mt-4 ml-1">
                            <div class="col-md-4 col-sm-6">
                                <p><b>Placa:</b> <?php echo $getobjeto->placa; ?> |<small class="green"> <?php echo $getobjeto->status; ?></small></p>
                            </div>
                            <div class="col-md-8 col-sm-6">
                                <p><b>Tipo/Categoria:</b> <?php echo $getobjeto->tipocategoria; ?></p>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <div class="col-md-4 col-sm-3">
                                <p><b>Valor mensal:</b> R$ <?php echo moedabr($getobjeto->valor); ?></p>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p><b>Marca:</b> <?php echo $getobjeto->marca; ?> </p>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p><b> Modelo:</b> <?php echo $getobjeto->modelo; ?></p>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <div class="col-md-4 col-sm-6">
                                <p><b>Chassi:</b> <?php echo $getobjeto->chassi; ?></p>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p><b>Renavan:</b> <?php echo $getobjeto->renavan; ?></p>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p><b>Ano/Modelo:</b> <?php echo $getobjeto->anomodelo; ?> </p>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <div class="col-md-4 col-sm-3">
                                <p><b>Data Mobilização:</b> <?php echo databr($getobjeto->mobilizacao); ?> </p>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p><b>Data Desmobilização:</b>
                                    <?php
                                    echo $desmobTrue ? databr($desmobTrue) : '';
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><b>Tipo Genérico:</b> <?php echo $getobjeto->tipo_generico; ?></p>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <div class="col-md-8 col-sm-3">
                                <p><b>Proprietário:</b> <?php echo $getobjeto->proprietario; ?> </p>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p><b>CPF/CNPJ:</b> <?php echo formatCPF($getobjeto->cpf_cnpj); ?> </p>
                            </div>
                        </div>
                        <?php
                        if (!$desmobTrue) {
                            $valor = ($getobjeto->valor / 30) * $getobjeto->diastrabalhados;
                        ?>
                            <div class="row ml-1">
                                <div class="col-md-12 col-sm-6 purple">
                                    <p>Valor total medido entre
                                        <b>
                                            <?php echo databr($getobjeto->mobilizacao) ?>
                                        </b> e <b><?php echo date('d/m/Y') ?>:
                                            <?php
                                            echo 'R$ ' . moedabr($valor);
                                            ?>
                                        </b>
                                        <small>(<?php echo $getobjeto->diastrabalhados; ?> dias corridos)</small>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="x_title"></div>
                    <?php } ?>
                </div>



            </div>
        </div>
    </div>

</div>