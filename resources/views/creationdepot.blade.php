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
          <h1>ESPACE DEPOT D'ARGENT SADIBO TRANSFERT</h1>
        </div>
        <div class="col-sm-3">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a class="btn btn-primary"  href="{{route('accueil')}}">Accueil</a></li>
            <li class="breadcrumb-item active"><a class="btn btn-primary" href="{{route('listedepot')}}">Liste depot</a></li>
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
            <h2 class="text-center">Saisir les infromations</h2>
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
            <form id="quickForm" method="post" action="{{route('depot.ajouter')}}" novalidate="novalidate" >
              @csrf
              <div class="row">
              <!-- left column -->
                <div class="card-body col-6">
                  <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" name="code_dep" class="form-control" id="" placeholder="Nom receveur">
                  </div>
                  <div class="form-group">
                    <label for="">Montant</label>
                    <input type="text" name="montant_dep" class="form-control" id="" placeholder="Prenom receveur">
                  </div>
                  <div class="form-group">
                    <label for="">Commission</label>
                    <input type="text" name="commission_dep" class="form-control" id="" placeholder="Prenom receveur">
                  </div>
                  <div class="form-group">
                    <label for="">Taux d'echange</label>
                    <input type="text" name="taux_dep" class="form-control" id="" placeholder="Prenom receveur">
                  </div>            
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                  </div>
                </div>
              <!-- right column -->
                <div class="card-body col-6">
                 <div class="form-group">
                    <label for="">Utilisateur</label>
                    <select class="form-control" name="utilisateur_id">
                      <option value="">Selectionner l'utilisateur</option>
                       @foreach($utilisateurs as $utilisateur)
                      <option value="{{$utilisateur->id}}">{{$utilisateur->prenom_user}}</option>
                      @endforeach -->
                    </select>
                  </div>  
                  <div class="card-body col-6">
                 <div class="form-group">
                    <label for="">Caisse</label>
                    <select class="form-control" name="benefice_id">
                      <option value="">Selectionner la caisse</option>
                       @foreach($benefices as $benefice)
                      <option value="{{$benefice->id}}">{{$benefice->nom_caisse}}</option>
                      @endforeach -->
                    </select>
                  </div>     
                  <div class="form-group">
                    <label for="">Client</label>
                    <select class="form-control" name="client_id">
                      <option value="">Selectionner le client</option>
                       @foreach($clients as $client)
                      <option value="{{$client->id}}">{{$client->prenom_client}}</option>
                      @endforeach -->
                    </select>
                  </div>     
                  <div class="form-group">
                    <label for="">Receveur</label>
                    <select class="form-control" name="receveur_id">
                      <option value="">Selectionner le receveur</option>
                      @foreach($receveurs as $receveur)
                      <option value="{{$receveur->id}}">{{$receveur->prenom_receveur}}</option>
                      @endforeach
                    </select>
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
