<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="user" action="?controller=Employes&action=login" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="user" name="user" aria-describedby="userHelp" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="pass" name="pass" placeholder="Contrase&ntilde;a">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Entrar" />
                                </form>
                                <?php 
                                    if(isset($error)){
                                        echo "<div>Error: $error";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>