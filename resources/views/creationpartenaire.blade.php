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
          <h1>ESPACE CREATION DES PARTENAIRES SADIBO TRANSFERT</h1>
        </div>
        <div class="col-sm-3">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a class="btn btn-primary" href="{{route('accueil')}}">Accueil</a></li>
            <li class="breadcrumb-item active"> <a class="btn btn-primary" href="{{route('listepartenaire')}}">Liste partenaire</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!--Le formulaire d'ajout utilisateur-->
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
            <form id="quickForm" method="post" action="{{route('partenaire.ajouter')}}" novalidate="novalidate" >
              @csrf
              <div class="row">
              <!-- left column -->
                <div class="card-body col-6">
                  <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" name="nom_partenaire" class="form-control" id="" placeholder="Nom partenaire">
                  </div>
                  <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" name="prenom_partenaire" class="form-control" id="" placeholder="Prenom partenaire">
                  </div>
                  <div class="form-group">
                    <label for="">Nationnalitée</label>
                    <select class="form-control" name="nationnalite_partenaire">
                      <option value="Guinée" selected="selected">Guinée</option>
                      <option value="Mali">Mali</option>
                      <option value="France">France</option>
                      <option value="Senegal">Senegal</option> 
                      <option value="Liberia">Liberia</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Utilisateur</label>
                    <select class="form-control" name="utilisateur_id">
                      <option value="">Selectionner l'utilisateur</option>
                      @foreach($utilisateurs as $utilisateur)
                      <option value="{{$utilisateur->id}}">{{$utilisateur->prenom_user}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email_partenaire" class="form-control" id="" placeholder="Email partenaire">
                  </div>
                  <div class="form-group">
                    <label for="">Num Piéce</label>
                    <input type="text" name="num_piece_partenaire" class="form-control" id="" placeholder="Num partenaire">
                  </div>
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                  </div>
                </div>
              <!-- right column -->
                <div class="card-body col-6">
                <div class="form-group">
                    <label for="">Telephone</label>
                    <input type="tel" name="telephone_partenaire" class="form-control" id="" placeholder="Telephone partenaire">
                  </div>
                  <div class="form-group">
                    <label for="">Adresse</label>
                    <input type="text" name="adresse_partenaire" class="form-control" id="" placeholder="adresse partenaire">
                  </div>
                  <div class="form-group">
                    <label for="">Fonction</label>
                    <select class="form-control" name="fonction_partenaire">
                      <option value="Administrateur" selected="selected">Administrateur</option>
                      <option value="Caissier">Caissier</option>
                      <option value="Partenaire">Partenaire</option>
                      <option value="Utilisateur">Utilisateur</option>
                      <option value="Livreur">Livreur</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Année de naissance</label>
                    <input type="date" name="naissance_partenaire" class="form-control" id="" placeholder="Naissance partenaire">
                  </div>
                  <div class="form-group">
                    <label for="">Mot de passe</label>
                    <input type="password" name="password_partenaire" class="form-control" id="" placeholder="">
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
