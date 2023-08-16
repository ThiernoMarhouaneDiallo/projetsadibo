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
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-9" style="display: flex; justify-content: right;">
          <h1>ESPACE RETRAIT D'ARGENT SADIBO TRANSFERT</h1>
        </div>
        <div class="col-sm-3">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a class="btn btn-primary" href="{{route('accueil')}}">Accueil</a></li>
            <li class="breadcrumb-item active"><a class="btn btn-primary" href="{{route('listeretrait')}}">Liste Retrait</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!--Le formulaire d'ajout depot-->
  <section class="content">
    <div class="container-fluid">
      <div class="row" style="display: flex; justify-content: center;">
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
            <h2 class="text-center">Voici les infromations du retrait</h2>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul >
                @foreach ($errors->all() as $errors )
                  <li>{{$errors}}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form id="quickForm" method="post" action="{{route('retrait.ajouter')}}" novalidate="novalidate" >
              @csrf
              
              <div class="row">
              <!-- left column -->
              <div class="card-body col-6">
                  <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" name="code_dep" readonly="readonly" value="{{$depot->code_dep}}" class="form-control" id="" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Montant</label>
                    <input type="text" name="montant_dep" readonly="readonly" value="{{$depot->montant_dep}}" class="form-control" id="" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Commission</label>
                    <input type="text" name="commission_dep" readonly="readonly" value="{{$depot->commission_dep}}" class="form-control" id="" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Taux d'echange</label>
                    <input type="text" name="taux_dep" readonly="readonly" value="{{$depot->taux_dep}}" class="form-control" id="" placeholder="r">
                  </div>    
                  <input type="hidden" name="utilisateur_id" value="{{$depot->utilisateur_id}}" class="form-control" id="" placeholder="r">
                  <input type="hidden" name="client_id" value="{{$depot->client_id}}" class="form-control" id="" placeholder="r">
                  <input type="hidden" name="receveur_id" value="{{$depot->receveur_id}}" class="form-control" id="" placeholder="r">
                  <input type="hidden" name="benefice_id" value="{{$depot->benefice_id}}" class="form-control" id="" placeholder="r">    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Effectuer le paiement</button>
                  </div>
                </div>
              <!-- right column -->
                <div class="card-body col-6">     
                <div class="form-group">
                    <label for="">Utilisateur</label>
                    <input type="text" name="" value="{{$depot->utilisateur->prenom_user.' '.$depot->utilisateur->nom_user}}" readonly="readonly" class="form-control" id="" placeholder="">
                  </div>      
                  <div class="form-group">
                    <label for="">Client</label>
                    <input type="text" name="" value="{{$depot->client->prenom_client.' '.$depot->client->nom_client}}" readonly="readonly" class="form-control" id="" placeholder="">
                  </div>     
                  <div class="form-group">
                    <label for="">Receveur</label>
                    <input type="text" name="" value="{{$depot->receveur->prenom_receveur.' '.$depot->receveur->nom_receveur}}" readonly="readonly" class="form-control" id="" placeholder="">
                  </div>     
                </div>
              </div>    
              <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


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
<script src="{{asset('js/demo.js')}}"></script>
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
</body>
</html>
