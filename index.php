<?php 


?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="css/bootstrap4.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>STORE</title>
  </head>
  <body>
    <nav class="conatiner">
      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand mx-md-4" href="#">STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-md-4 ">
            <li class="nav-item font-weight-bold text-size mx-md-1">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item font-weight-bold text-size mx-md-1">
              <a class="nav-link" style="cursor: pointer;" data-toggle="modal" data-target="#login">Login</a>
            </li>
          
        </div>
      </nav>
    </nav>
       
    <div class="modal" id="login">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title text-center">Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <button class="btn btn-dark d-block ml-auto" data-toggle="modal" data-target="#signup" data-dismiss="modal">Sign Up</button>
            <form action="" method="POST">
              <label class="my-2">Username</label>
              <input class="form-control" type="text" name="username">
              <label class="my-2">Password</label>
              <input type="password" class="form-control" name="password" id="">
              <button type="submit" class="btn btn-warning d-block mx-auto mt-3">Login</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <div class="modal" id="signup">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title text-center">SignUp</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <button class="btn btn-dark d-block ml-auto" data-dismiss="modal" data-toggle="modal" data-target="#login">Login</button>
            <form action="#" method="POST">
              <label class="my-2">Email</label>
              <input class="form-control" type="email" name="email">
              <label class="my-2">Name</label>
              <input class="form-control" type="text" name="name">
              <label class="my-2">Username</label>
              <input class="form-control" type="text" name="username">
              <label class="my-2">Password</label>
              <input type="password" class="form-control" name="password" id="">
              <label class="my-2">Age</label>
              <input class="form-control" type="number" name="age">
              <button type="submit" class="btn btn-warning d-block mx-auto mt-3">SignUp</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <div class="conatiner d-flex justify-content-center mt-md-5">
      <h1>Search Our STORE</h1>
    </div>
    <div class="container mt-5 py-5">
      
        <form class="d-flex justify-content-center">
          <input type="search" class="form-control" style="width:60%" placeholder="search..">
          <button class="form-check-inline btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
        </form>
      
      </div>
    <div class="container">
      <h2 class="text-center">OR</h2>
      <h2 class="text-center">Try our Suggestions..</h2>
      <div class="container mt-3 d-flex flex-wrap">
        <div class="m-4 ">
          <div class="card" style="width:300px">
            <img class="card-img-top" src="apps/vlc media player/VLC_media_player-Logo.wine.png" alt="Vlc media player logo" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">Vlc Media Player</h4>
              <p class="card-text">A Simple video player</p>
              <a href="#" class="btn btn-primary stretched-link">Download</a>
            </div>
          </div>
        </div>
        <div class="m-4 ">
          <div class="card" style="width:300px">
            <img class="card-img-top" src="apps/vlc media player/VLC_media_player-Logo.wine.png" alt="Vlc media player logo" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">Vlc Media Player</h4>
              <p class="card-text">A Simple video player</p>
              <a href="#" class="btn btn-primary stretched-link">Download</a>
            </div>
          </div>
        </div>
        <div class="m-4 ">
          <div class="card" style="width:300px">
            <img class="card-img-top" src="apps/vlc media player/VLC_media_player-Logo.wine.png" alt="Vlc media player logo" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">Vlc Media Player</h4>
              <p class="card-text">A Simple video player</p>
              <a href="#" class="btn btn-primary stretched-link">Download</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap4.js"></script>
  </body>
</html>