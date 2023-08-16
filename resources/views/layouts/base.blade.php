<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <title>Document</title>
</head>
<body>
<main>

  @yield("contenu")

</main>

  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
</body>
</html>