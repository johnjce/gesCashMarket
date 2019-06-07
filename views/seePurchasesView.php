<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contratos de compra</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableUsers" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Contrato</th>
                            <th>Productos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($allPurchases as $purchase) { ?>
                            <tr>
                                <td>
                                    <?php echo ucwords($purchase->names); ?> <?php echo ucwords($purchase->lastname); ?> -
                                    <?php echo strtoupper($purchase->dni); ?>
                                    <a href="<?php echo $helper->url("Customer", "updateCustomer"); ?>&id=<?php echo $purchase->IDCL; ?>" class="primary"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <?php
                                    echo date("d/m/Y H:m", strtotime($purchase->date));
                                    ?>
                                </td>
                                <td>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modal<?php echo $purchase->documentId; ?>">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <?php echo $purchase->documentId; ?>
                                    </a>
                                    <div class="modal fade" id="Modal<?php echo $purchase->documentId; ?>" tabindex="-1" role="dialog" aria-labelledby="modalAgreementPurchase" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Contrato de Compra <?php echo $purchase->documentId; ?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="Agreement<?php echo $purchase->documentId; ?>">
                                                   <a class="sidebar-brand d-flex paddingModal" href="index.php" id="agreementLogo">
                                                        <div class="sidebar-brand-icon rotate-n-15">
                                                            <i class="fas fa-laugh-wink cLogo"></i>
                                                        </div>
                                                        <div class="sidebar-brand-text mx-7"><span class="mLogo">C</span>ash <span class="mLogo">M</span>arket</div>
                                                    </a>
                                                    <p>En Calle Ayala n&uacute;mero 33 bajo,<br/> Don Benito (Badajoz) <br/>Movil: &Tab;642 760 330 <br/> Fijo: &Tab;924 983 400 <br/></p>
                                                    <p><strong>REUNIDOS A <strong><?php echo date("d/m/Y", strtotime($purchase->date)); ?></strong></strong></p>
                                                    <p>
                                                        De una parte, Don
                                                        <strong><span class="textposition"> <?php echo $purchase->names; ?> <?php echo $purchase->lastname; ?></span></strong>
                                                        mayor de edad, con domicilio en <strong><?php echo $purchase->address; ?></strong>,
                                                        con documento nacional de identidad n&uacute;mero <strong><?php echo $purchase->dni; ?> "VENDEDOR",</strong>
                                                        y de la otra parte, Don<strong> Cash Market</strong>, domiciliado en<strong> Calle Ayala n&uacute;mero 33 bajo </strong> con NIF n&uacute;mero <strong>34953215T, "COMPRADOR".</strong></p></br>
                                                    <p class="textposition">EXPONEN </p></br>
                                                    <p><span class="tex-parrafo2">I.-</span> Que (Don <strong><span class="textposition"><?php echo $purchase->names; ?> <?php echo $purchase->lastname; ?></span></strong> /S.A., S.L., etc.) Con n&uacute;mero de telefono <strong><?php echo $purchase->telephone; ?> </strong>es propietario de los <span class="tex-parrafo1">productos:<br /><br />
                                                            <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#3D3C2C">
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Tipo</th>
                                                                    <th>Marca</th>
                                                                    <th>Modelo</th>
                                                                    <th>S/N</th>
                                                                    <th>Estado de<br />producto</th>
                                                                    <th>Precio unidad</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                                <tr>
                                                                    <?php
                                                                    $j = 1;
                                                                    $total = 0;
                                                                    if (!is_array($allProducts[$i])) { ?>
                                                                        <td><?php echo $j; ?></td>
                                                                        <td><img src="../views/assets/productTypes/<?php echo $allProducts[$i]->type; ?>.png" /></td>
                                                                        <td><?php echo $allProducts[$i]->make; ?></td>
                                                                        <td><?php echo $allProducts[$i]->model; ?></td>
                                                                        <td><?php echo $allProducts[$i]->sn; ?></td>
                                                                        <td><?php echo $allProducts[$i]->productState ? "Nuevo":"Segunda mano"; ?></td>
                                                                        <td><?php echo $allProducts[$i]->pricePurchase;
                                                                            $total += $allProducts[$i]->pricePurchase * $allProducts[$i]->stock; ?>&euro;</td>
                                                                        <td><?php echo $allProducts[$i]->stock; ?></td>
                                                                        <td><?php echo $allProducts[$i]->pricePurchase * $allProducts[$i]->stock; ?>&euro;</td>
                                                                    <?php
                                                                } else {
                                                                    foreach ($allProducts[$i] as $product) { ?>
                                                                        <tr>
                                                                            <td><?php echo $j; ?></td>
                                                                            <td><img src="../views/assets/productTypes/<?php echo $product->type; ?>.png" width="35px" height="35px" /></td>
                                                                            <td><?php echo $product->make; ?></td>
                                                                            <td><?php echo $product->model; ?></td>
                                                                            <td><?php echo $product->sn; ?></td>
                                                                            <td><?php echo $product->productState ? "Nuevo":"Segunda mano"; ?></td>
                                                                            <td><?php echo $product->pricePurchase;
                                                                            $total += $product->pricePurchase * $product->stock; ?>&euro;</td>
                                                                            <td><?php echo $product->stock; ?></td>
                                                                            <td><?php echo $product->pricePurchase * $product->stock; ?>&euro;</td>
                                                                        </tr>
                                                                        <?php $j++;
                                                                    }
                                                                } ?>
                            </tr>
                    </table>
                    <br />(bienes objeto del contrato), por t&iacute;tulo de compraventa, por el cual se pagara la suma total de <strong><?php echo $total; ?>&euro;</strong></p>
                    <p><span class="tex-parrafo2">II.- </span>Que Don <strong>Cash Market </strong> tiene inter&eacute;s en adquirir los bienes descritos en el ordinal precedente.</p>
                    <p><span class="tex-parrafo2">III.- </span>Que por ello ambas partes,</p>
                    <p><strong>ACUERDAN </strong></p>
                    <p>Llevar a efecto el presente contrato de COMPRAVENTA MERCANTIL.</p>
                    <p>Firmando en conformidad.</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><img src="<?php echo $purchase->signaturePicture; ?>" height="100px" height="50px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src="./views/assets/img/firmaFernando.png" height="100px" height="50px" /></p>
                    <p>Parte vendedora&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Parte compradora </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" id="printAgreementButton" href="#" onclick="printDocument('Agreement<?php echo $purchase->documentId; ?>')">Imprimir</a>
                </div>
            </div>
        </div>
    </div>
    </td>
    <td>
        <?php
        if (is_array($allProducts[$i])) {
            foreach ($allProducts[$i] as $product) { ?>
                <img src="../views/assets/productTypes/<?php echo $product->type; ?>.png" />
                <?php echo $product->make; ?> <?php echo $product->model; ?><br />
            <?php }
        } else { ?>
            <img src="../views/assets/productTypes/<?php echo $allProducts[$i]->type; ?>.png" />
            <?php echo $allProducts[$i]->make; ?> <?php echo $allProducts[$i]->model; ?>
        <?php } ?>
    </td>
    </tr>
    <?php $i++;
} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#tableUsers').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            "order": [
                [1, "asc"]
            ]
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>