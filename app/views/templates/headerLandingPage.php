<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- using cdn -->
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- using local bootstrap -->
    <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css"> -->
</head>
    <title><?= $data['title']?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=BASEURL?>">To-do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL?>">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL?>/about">About</a>
                </li>
            </ul>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn border border-dark me-5" data-bs-toggle="modal" data-bs-target="#ModalLogin">
        Login
        </button>
</nav>
<?php Flasher::showFlash(); ?>


<!-- Modal -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="<?= BASEURL;?>/login/loginuser" method="post">
          <div class="modal-body">
            <label for="username">What's your username?</label>
            <input class="w-100 mt-2" name='username' id='username' type="text" required>
            <label class="mt-3" for="password">Type secretly your password here</label>
            <input class="w-100 mt-2" name='password' id='password' type="password" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn border border-dark">Login</button>
          </div>
        </form>
    </div>
  </div>
</div>