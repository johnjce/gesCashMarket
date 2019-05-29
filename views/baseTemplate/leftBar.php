    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo APP_TITLE ?><sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Resumen -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Resumen</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Gesti&oacute;n
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-users"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones:</h6>
            <a class="collapse-item" href="<?php echo $helper->url("Customer", "createCustomer"); ?>"><i class="fas fa-user-plus"></i> Crear Cliente</a>
            <a class="collapse-item" href="<?php echo $helper->url("Customer", "SeeCustomers"); ?>"><i class="fas fa-address-book"></i> Ver Clientes</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAgreements" aria-expanded="true" aria-controls="collapseAgreements">
        <i class="fas fa-handshake"></i>
          <span>Contratos</span>
        </a>
        <div id="collapseAgreements" class="collapse" aria-labelledby="collapseAgreements" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Nuevo:</h6>
            <a class="collapse-item" href="<?php echo $helper->url("Purchase", "createPurchase"); ?>"><i class="fas fa-file-contract"></i> Nueva Compra</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseList" aria-expanded="true" aria-controls="collapseList">
        <i class="fas fa-copy"></i>
          <span>Listados</span>
        </a>
        <div id="collapseList" class="collapse" aria-labelledby="collapseList" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">listas:</h6>
            <a class="collapse-item" href="<?php echo $helper->url("Customer", "SeeCustomers"); ?>"><i class="fas fa-copy"></i> Contratos de compras</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar --> 