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
        <div class="col-sm-6">
          <h1>Espace ajout utilisateur</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item active">Liste d'utilisateurs</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!--Le formulaire d'ajout utilisateur-->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"><small>Modifier les infromations de l'utilisateur</small></h3>
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
            <form id="quickForm" method="post" action="{{route('utilisateur.modifier')}}" novalidate="novalidate" >
              @csrf
              <input type="hidden" name="_method" value="put">
              <div class="row">
              <!-- left column -->
                <div class="card-body col-3">
                  <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" name="nom_user" class="form-control" id="" placeholder="Nom utilisateur" value="$utilisateur->nom_user">
                  </div>
                  <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" name="prenom_user" class="form-control" id="" placeholder="Prenom utilisateur" value="$utilisateur->prenom_user">
                  </div>
                  <div class="form-group">
                    <label for="">Nationnalitée</label>
                    <select class="form-control" name="nationnalite_user">
                      <option value="Guinée" selected="selected">Guinée</option>
                      <option value="Mali">Mali</option>
                      <option value="France">France</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Liberia">Liberia</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email_user" class="form-control" id="" placeholder="Email utilisateur" value="$utilisateur->email_user">
                  </div>
                  <div class="form-group">
                    <label for="">Num Piéce</label>
                    <input type="text" name="num_piece_user" class="form-control" id="" placeholder="Num utilisateur" value="$utilisateur->num_piece_user">
                  </div>
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                  </div>
                </div>
              <!-- right column -->
                <div class="card-body col-3">
                <div class="form-group">
                    <label for="">Telephone</label>
                    <input type="tel" name="telephone_user" class="form-control" id="" placeholder="Telephone utilisateur" value="$utilisateur->telephone_user">
                  </div>
                  <div class="form-group">
                    <label for="">Adresse</label>
                    <input type="text" name="adresse_user" class="form-control" id="" placeholder="adresse utilisateur" value="$utilisateur->adresse_user">
                  </div>
                  <div class="form-group">
                    <label for="">Fonction</label>
                    <select class="form-control" name="fonction_user">
                      <option value="Administrateur" selected="selected">Administrateur</option>
                      <option value="Caissier">Caissier</option>
                      <option value="Partenaire">Partenaire</option>
                      <option value="Utilisateur">Utilisateur</option>
                      <option value="Livreur">Livreur</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Année de naissance</label>
                    <input type="date" name="naissance_user" class="form-control" id="" placeholder="Naissance utilisateur" value="$utilisateur->naissance_user">
                  </div>
                  <div class="form-group">
                    <label for="">Mot de passe</label>
                    <input type="password" name="password_user" class="form-control" id="" placeholder="" value="$utilisateur->password_user">
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
