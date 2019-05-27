<?php
include_once("baseTemplate/header.php");
include_once("baseTemplate/leftBar.php");
include_once("baseTemplate/topBar.php");
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Crear/Editar Customeres</h1>
    </div>

    <form action="<?php echo $helper->url("customers", "addCustomer"); ?>" method="post">
        <div class="row">
            <div class="col mb-3">
                <label for="nombres">Nombres</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Nombre requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="apellidos">Apellidos</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Apellido requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="telefono">Telefono</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Telefono requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="domicilio">Domicilio</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                    <input type="text" name="domicilio" id="domicilio" class="form-control" placeholder="Domicilio" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Domicilio requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
        <button type="submit" value="Guardar" class="btn btn-primary btn-lg">Guardar <i class="far fa-save"></i></button>
    </form>
    <hr />
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de Customeres</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableUsers" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Domicilio</th>
                            <th>telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allcustomers as $customer) { ?>
                            <tr>
                                <td><?php echo ucwords($customer->nombre); ?> <?php echo ucwords($customer->ape1); ?> <?php echo ucwords($customer->ape2); ?></td>
                                <td><?php echo strtoupper($customer->dni); ?></td>
                                <td><?php echo ucwords($customer->domicilio); ?></td>
                                <td><?php echo $customer->telefono; ?></td>
                                <td>
                                    <a href="<?php echo $helper->url("Customer", "viewEditCustomer"); ?>&id=<?php echo $customer->IDCL; ?>" class="primary"> <i class="fas fa-user-edit"></i></a>
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
<!-- Page level plugins -->
<script src="<?php echo SERVER_NAME ?>views/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo SERVER_NAME ?>views/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<?php include_once("baseTemplate/footer.php"); ?>