<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aministaration</title>
  <!-- JQVMap -->
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('accueil')}}" class="nav-link">Accueil</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-blocks">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-primary" type="submit">Deconnexion</button>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <div class="">

           <a href="/user/profile"><button class="btn btn-success" type="submit"> Profile</button></a> 
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- Activation et desactivation derk -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SADIBO TRANSFERT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar utilisateur connecté -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex bg-success">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>-->
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Administration
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accueil</p>
                </a>
              </li>
            </ul>
          </li>
          @role('Administrateur')
          <li class="nav-item">
            <a href="{{route('listeutilisateur')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Employés</p>
            </a>
          </li>
          @endrole
          <li class="nav-item">
            <a href="{{route('listeclient')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Client</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('listereceveur')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Receveur</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('listedepot')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Depôt</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('listeretrait')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Paiement</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('listepartenaire')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Partenaire</p>
            </a>
          </li>
          @role('Administrateur')
          <li class="nav-item">
            <a href="{{route('listecaisse')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Caisse</p>
            </a>
          </li>
          @endrole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="m-0">  BIENVENUE CHEZ SADIBO TRANSFERT</h1>
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Debut Row 1 -->
        <div class="row">
          <div class="col-lg-3 col-6">
          @role('Administrateur')
            <div class="small-box ">
              <div class="inner text-center">
                <h4>Total Employés</h4>
                <h5>{{$utilisateurs}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('listeutilisateur')}}" class="small-box-footer bg-info">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            @endrole
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box ">
              <div class="inner text-center">
                <h4>Total clients</h4>
                <h5>{{$clients}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('listeclient')}}" class="small-box-footer bg-success">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box ">
              <div class="inner text-center">
                <h4>Nombre de depots</h4>
                <h5>{{$depots}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('listedepot')}}" class="small-box-footer bg-warning">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box ">
              <div class="inner text-center">
                <h4>Nombre de retraits</h4>
                <h5>{{$retraits}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('listeretrait')}}" class="small-box-footer bg-danger">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- Fin row 1 -->

        <!-- Debut row 2 -->
        @role('Administrateur')
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box ">
              <div class="inner text-center">
                <h4> Montant deposé</h4>
                <h5>{{$total_dep_caisse}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('listedepot')}}" class="small-box-footer bg-success">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box ">
              <div class="inner text-center">
                <h4>Montant retiré</h4>
                <h5>{{$total_ret_caisse}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('listeretrait')}}" class="small-box-footer bg-info">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box ">
              <div class="inner text-center">
                <h4>benefice depots</h4>
                 <h5>{{$montant_benefice_depot}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('listecaisse')}}" class="small-box-footer bg-danger">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner text-center">
                <h4>benefice retraits</h4>
                <h5>{{$montant_benefice_retrait}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('listecaisse')}}" class="small-box-footer bg-warning">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        @endrole
        <!-- Debut row 3 -->
        <div class="row">
          <div class="col-lg-3 col-6">
          @role('Administrateur')
            <div class="small-box ">
              <div class="inner text-center">
                <h4>benefice en attente</h4>
                <h5>{{$montant_benefice_attente}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('listecaisse')}}" class="small-box-footer bg-info">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            @endrole
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner text-center">
                <h4>Total partenaires</h4>
                <h5>{{$partenaires}}</h5>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('listepartenaire')}}" class="small-box-footer bg-danger">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
        </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">marhouane diallo</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/pages/dashboard.js')}}"></script>
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.js')}}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
</body>
</html>
