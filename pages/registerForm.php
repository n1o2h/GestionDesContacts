<?php  
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Gestion des Contacts</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <style>
            .box-area {
                  width: 600px;
            }
      </style>
</head>

<body class="bg-secondary-subtle">
      <div class="container d-flex justify-content-center align-items-center min-vh-100 ">
            <div class="row">
                  <div class="col-md-6 rounded-5 bg-white p-3 shadow box-area bg-white">
                        <form action="../logiqueMetier/auth.php" method="post" class="row align-items-center">
                              <legend class="text-center fs-1 fw-bold mb-4">S'inscrire</legend>
                              <?php if(isset($_SESSION["register_error"])) : ?>
                                    <p class=" alert alert-danger d-flex justify-content-center">
                                          <?= $_SESSION["register_error"] ?>
                                    </p>
                              <?php endif ?>

                              <div class="form-group pb-3 px-5">
                                    <label for="username" class="form-label">Nom Utilisateur</label>
                                    <input type="text" placeholder="Entrer nom utilisateur" id="username"
                                          name="username" class="form-control" value="" >
                              </div>
                              <div class="form-group pb-3 px-5">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" placeholder="Entrer Email" id="email"
                                          name="email" class="form-control" value="" >
                              </div>
                              <div class="form-group pb-3 px-5">
                                    <label for="password" class="form-label">Mot de Pass</label>
                                    <input type="password" id="password" name="password"
                                          placeholder="Entrer mot de pass" class="form-control" value="" >

                              </div>
                              <div class="form-group pb-3 px-5 d-flex align-items-center justify-content-end gap-4">
                                    <button class="btn btn-success w-100 fw-bold" name="submit" type="submit" value="register">S'inscrire</button>
                              </div>
                        </form>
                  </div>
            </div>

      </div>
</body>

</html>