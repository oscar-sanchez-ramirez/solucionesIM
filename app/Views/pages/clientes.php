<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<!-- <div class="container margen col-md-4">
    <div class="jumbotron card">
        <div class="container">
            <h2 class="text-center"><i class="fab fa-cc-visa"></i>&nbsp<i class="fab fa-cc-paypal fs"></i>&nbsp<i class="far fa-money-bill-alt"></i>&nbsp<i class="fab fa-cc-stripe"></i>&nbsp<i class="fab fa-cc-amex"></i>&nbsp<i class="fab fa-cc-mastercard"></i></h2>
            <?php foreach ($clientes as $cliente) : ?>
                <div class="text-center">
                    <form action="<?= base_url('ordenes') ?>" method="POST">
                        <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                        <button type="submit" class="btn btn-secondary btn-lg btn-block"><i class="fas fa-search-dollar">&nbspAdeudo</i>s</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div> -->

<div class="container-fluid margen">

    <?php foreach ($clientes as $cliente) : ?>

        <div class="container card" id="card">
            <h2 class="text-center margen">Datos del Fiscales</h2>
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-4"><strong>Razón social</strong>
                            <nav><?= $cliente['clientes_razon_social'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Nombre comercial</strong>
                            <nav><?= $cliente['clientes_nombre_comercial'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Cliente Tipo</strong>
                            <nav><?= $cliente['clientes_tipo'] ?> </nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Apellido paterno</strong>
                            <nav><?= $cliente['clientes_apellido_paterno'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Apellido materno</strong>
                            <nav><?= $cliente['clientes_apellido_materno'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Nombres </strong>
                            <nav><?= $cliente['clientes_nombre'] ?></nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Telefono</strong>
                            <nav><?= $cliente['clientes_direccion_telefono'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Email</strong>
                            <nav><?= $cliente['clientes_direccion_email'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Colonia</strong>
                            <nav><?= $cliente['clientes_direccion_colonia'] ?> </nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Calle</strong>
                            <nav><?= $cliente['clientes_direccion_calle'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Calle No.exterior</strong>
                            <nav><?= $cliente['clientes_direccion_numero_exterior'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Calle No.interior</strong>
                            <nav><?= $cliente['clientes_direccion_numero_interior'] ?> </nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Codigo postal</strong>
                            <nav><?= $cliente['clientes_direccion_cp'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Ciudad</strong>
                            <nav><?= $cliente['clientes_direccion_ciudad'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Estado</strong>
                            <nav><?= $cliente['clientes_direccion_estado'] ?> </nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>País</strong>
                            <nav><?= $cliente['clientes_direccion_pais'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Email comercial</strong>
                            <nav><?= $cliente['clientes_direccion_emailcomercial'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Cliente status</strong>
                            <nav><?= $cliente['clientes_status'] ?> </nav>
                        </div>
                    </div>
                    <br>
                    <!--Collapsible Panel-->
                    <div class="panel panel-default">
                        <div class="panel-heading" id="accordion">
                            <p class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fas fa-plus-circle fa-2x" ></i></a>
                            </p>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="row">
                                <div class="col-sm-4"><strong>Representante legal</strong>
                                    <nav><?= $cliente['clientes_representante_legal'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Acta escritura</strong>
                                    <nav><?= $cliente['clientes_acta_escritura'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Acta fecha</strong>
                                    <nav><?= $cliente['clientes_acta_fecha'] ?></nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Acta notario</strong>
                                    <nav><?= $cliente['clientes_acta_notario'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Acta ciudad</strong>
                                    <nav><?= $cliente['clientes_acta_ciudad'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Acta licensiado</strong>
                                    <nav><?= $cliente['clientes_acta_licenciado'] ?> </nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Apoderado legal</strong>
                                    <nav><?= $cliente['clientes_apoderado_legal'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Apoderado escritura</strong>
                                    <nav><?= $cliente['clientes_apoderado_escritura'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Apoderado fecha</strong>
                                    <nav><?= $cliente['clientes_apoderado_fecha'] ?> </nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Apoderado notario</strong>
                                    <nav><?= $cliente['clientes_apoderado_notario'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Apoderado ciudad</strong>
                                    <nav><?= $cliente['clientes_apoderado_ciudad'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Apoderado licensiado</strong>
                                    <nav><?= $cliente['clientes_apoderado_licenciado'] ?> </nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Dirección fiscal email comercial</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_email_comercial'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Dirección fiscal email</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_email'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Dirección fiscal teléfono</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_telefono'] ?> </nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Dirección fiscal colonia</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_colonia'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Dirección fiscal calle</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_calle'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Fiscal No.exterior</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_numero_exterior'] ?> </nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Fiscal No.interior</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_numero_interior'] ?> </nav>
                                </div>
                                <div class="col-sm-4"><strong>Fiscal codigo postal</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_cp'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Fiscal estado</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_estado'] ?> </nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Fiscal ciudad</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_ciudad'] ?> </nav>
                                </div>
                                <div class="col-sm-4"><strong>Fiscal país</strong>
                                    <nav><?= $cliente['clientes_direccionfiscal_pais'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Fiscal RFC</strong>
                                    <nav><?= $cliente['clientes_fiscal_rfc'] ?> </nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3"><strong>Cliente giro</strong>
                                    <nav><?= $cliente['clientes_giro'] ?> </nav>
                                </div>
                                <div class="col-sm-3"><strong>Cliente alta fecha</strong>
                                    <nav><?= $cliente['clientes_alta_fecha'] ?></nav>
                                </div>
                                <div class="col-sm-3"><strong>Cliente alta usuario</strong>
                                    <nav><?= $cliente['clientes_alta_usuario'] ?> </nav>
                                </div>
                                <div class="col-sm-3"><strong>Cliente modifica usuario</strong>
                                    <nav><?= $cliente['clientes_modifica_usuario'] ?> </nav>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
</div>
<br><br>




<?= $this->endSection() ?>