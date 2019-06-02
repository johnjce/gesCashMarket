<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Crear/Editar Cliente</h1>
    </div>
    <?php
    ?>
    <form id="addCustomerForm" action="./<?php echo $helper->url("Customer", "save"); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col mb-3">
                <label for="names">Nombres (*)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <input type="text" name="names" value="<?php echo $customer->names; ?>" id="names" class="form-control" placeholder="Nombres" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Nombres requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="lastname">Apellidos (*)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <input type="text" name="lastname" id="lastname" value="<?php echo $customer->lastname; ?>" class="form-control" placeholder="Apellidos" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Apellidos requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="dni">DNI / pasaporte / etc. (*)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <input type="text" name="dni" id="dni" value="<?php echo $customer->dni; ?>" class="form-control" placeholder="DNI" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        DNI requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="telephone">Telefono (*)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <input type="tel" name="telephone" id="telephone" value="<?php echo $customer->telephone; ?>" class="form-control" data-format="+34 ddd dd-dd-dd" placeholder="684000000" required="">
                    <div class="invalid-feedback" style="width: 100%;">
                        Telefono requerido.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="address">Domicilio (*)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                    <input type="text" name="address" id="address" value="<?php echo $customer->address; ?>" class="form-control" placeholder="Domicilio" required="">
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
                    <input type="email" name="email" value="<?php echo $customer->email; ?>" id="email" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row">
            <br>
            <video muted="muted" id="video"></video>
            <canvas id="canvas" style="display: none;"></canvas>
            <div class="col mb-3">
                <div>
                    <select name="deviceList" id="deviceList"></select>
                    <button id="buttonCapture" class="btn btn-primary btn-lg ligth-text" disabled>Guardar <i class="far fa-save"></i></button>
                    <p id="state">Los campos marcados con (*) significan que son obligatorios.</p>
                    <input type="hidden" value="<?php echo @$_GET['id']!=null ? $_GET['id']:""; ?>" name="IDCL" id="IDCL" />
                </div>
            </div>
        </div>
    </form>
</div>
<script src="<?php echo SERVER_NAME ?>views/assets/js/customer.js"></script>