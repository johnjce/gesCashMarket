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
                            <th>Fecha contrato</th>
                            <th>Productos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($allPurchases as $purchase) { ?>
                            <tr>
                                <td>
                                    <?php echo ucwords($purchase->nombres); ?> <?php echo ucwords($purchase->apellidos); ?> -
                                    <?php echo strtoupper($purchase->dni); ?>
                                    <a href="<?php echo $helper->url("Customer", "updateCustomer"); ?>&id=<?php echo $purchase->IDCL; ?>" class="primary"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <?php
                                    echo date("d/m/Y H:m",strtotime($purchase->date));
                                    ?>
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
            "order": [[ 1, "asc" ]]
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

