<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<br>
<div class="container margen">
    <h1 class="text-center margen"><i class="fas fa-clipboard-check fa-2x"></i></h1>
    <input class="form-control col-md-3 light-table-filter " data-table="order-table" type="text" placeholder="Buscar..">
    <br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar som-tabla margen">
        <table class="order-table table table-bordered table-hover w-auto">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col">UUID</th>
                    <th scope="col">Fecha de emisión</th>
                    <th scope="col">XML</th>
                    <th scope="col">PDF</th>
                    <th scope="col">Datos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturas as $factura) : ?>
                    <tr>
                        <td>
                            <?= $factura['factura_uuid'] ?>
                        </td>
                        <td>
                            <?= $factura['factura_fecha'] ?>
                        </td>
                        <td>
                            <form action="<?= base_url('facturacion/downXML') ?>" method="POST">
                                <input type="hidden" name="xml" value="<?= $factura['factura_XML'] ?>">
                                <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-file-excel"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url('facturacion/GeneraPDF') ?>" method="POST">
                                <input type="hidden" name="uuid" value="<?= $factura['factura_uuid'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="#" method="POST">
                                <input type="hidden" name="" value="">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<br><br>

<?= $this->include('components/buscador'); ?>

<?= $this->endSection() ?>