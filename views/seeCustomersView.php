<?php
include_once("baseTemplate/header.php");
?>
<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<?php
include_once("baseTemplate/leftBar.php");
include_once("baseTemplate/topBar.php");
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Listado de Clientes</h1>
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
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>telefono</th>
                            <th>DNI</th>
                            <th>Foto DNI</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allcustomers as $customer) { ?>
                            <tr>
                                <td><?php echo ucwords($customer->nombres); ?> <?php echo ucwords($customer->apellidos); ?> <?php echo ucwords($customer->ape2); ?></td>
                                <td><?php echo ucwords($customer->domicilio); ?></td>
                                <td><?php echo $customer->telefono; ?></td>
                                <td><?php echo strtoupper($customer->dni); ?></td>
                                <td><img src="<?php echo $customer->img_dni; ?>" height="100px" height="50px"/></td>
                                <td>
                                    <a href="<?php echo $helper->url("Customer", "updateCustomer"); ?>&id=<?php echo $customer->IDCL; ?>" class="primary"> <i class="fas fa-user-edit"></i></a>
                                    &nbsp;
                                    <a href="<?php echo $helper->url("Customer", "delCustomer"); ?>&id=<?php echo $customer->IDCL; ?>" class="primary"><i class="fas fa-user-times"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
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
            }
        });
    } );
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<?php include_once("baseTemplate/footer.php"); ?>