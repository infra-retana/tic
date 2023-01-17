<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soporte-Tools</title>
  <link href="<?= base_url('css/bootstrap.css'); ?>" rel="stylesheet">
  <script src="<?= base_url('js/bootstrap.js') ?>"></script>
  <script src="https://kit.fontawesome.com/b6cf32b05e.js" crossorigin="anonymous"></script>
  <style>
    td.fit,th.fit{
      width: 1px;
      white-space: nowrap;
    }
  </style>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><b>INFRASAL T.I.C</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= url_to("\App\Controllers\Home::printers") ?>"> 
              <i class="fa-solid fa-print mx-2"></i> Impresoras
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= url_to("\App\Controllers\Home::orders") ?>">
              <i class="fa-solid fa-box mx-2"></i> Pedidos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= url_to("\App\Controllers\Home::assignments") ?>">
            <i class="fa-solid fa-key"></i>
              Asignaciones
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-5">
    <?= $this->renderSection('content'); ?>
  </div>
  <?= $this->renderSection('scripts'); ?>
</body>
</html>