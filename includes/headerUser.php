<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Gestion des Contacts</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

      <style>
            :root {
                  --primary: #1E3C72;
                  --secondary: #2A5298;
                  --accent: #4DA3FF;
                  --bg-light: #F5F7FA;
                  --text-dark: #2E2E2E;
            }

            nav {
                  background-color: #e3f2fd;
            }

            .textinfo {
                  color: var(--text-dark);
            }

            .textnom {
                  color: var(--primary);
            }

            .hero {
                  height: calc(100vh - 56px);
                  background: linear-gradient(135deg, #1E3C72, #2A5298);
            }
      </style>
</head>

<body class="">

      <!-- Navbar -->

      <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                  <a href="index.php" class="navbar-brand fw-bold">Gestion des Contacts</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                        <div class="navbar-nav">
                              <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                              <a class="nav-link" href="contact.php">Contact</a>
                              
                        </div>
                        <div>
                              <a href="../pages/logout.php" class="btn btn-danger">Deconnexion</a>
                        </div>
                        
                  </div>
            </div>
      </nav>
