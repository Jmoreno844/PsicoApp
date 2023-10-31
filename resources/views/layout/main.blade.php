<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        a {
            text-decoration: none;
            color: inherit;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer-option {
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content vertically */
            height: 100px; /* Fixed height for consistent alignment */
        }

        .footer-option a {
            color: #333; /* Link color */
            text-decoration: none; /* Remove underline */
        }

        .footer-option a:hover {
            color: #0078FF; /* Link color on hover */
        }

        .footer-option i {
            font-size: 24px;
        }

        .footer-text {
            font-size: 12px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>PsicoApp</title>
    <style>
        .img-fluid {
  width: 40%;
  height: auto;
  display: block; /* To center the image horizontally */
  margin: 0 auto; /* To center the image horizontally */


}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
@yield('psicologos')
</body>
<footer>
    <div class="footer">
        <div class="footer-option">
            <a href="views/main.php">
            <i class="fas fa-home"></i>
            <p class="footer-text">Inicio</p>
        </div>
        <div class="footer-option">
            <a href="psicologos" >
            <i class="fas fa-search"></i>
            <p class="footer-text">Psicologos</p>
        </div>
        <div class="footer-option">
            <a href="views/chats.php">
            <i class="fas fa-comment"></i>
            <p class="footer-text">Chats</p>
        </div>
        <div class="footer-option">
            <a href="views/logs.php">
            <i class="fas fa-calendar"></i>
            <p class="footer-text">Notas</p>
        </div>
        <div class="footer-option">
            <a href="views/account.php">
            <i class="fas fa-user"></i>
            <p class="footer-text">Cuenta</p>
        </div>
    </div>
</footer>
</html>
