<?php 
include_once '../includes/headerUser.php';
// require '../logiqueMetier/CrudSQL.php';
session_start();
$username = $_SESSION['username'];
$inscriptiondate = $_SESSION['inscription_date'];
$login =  $_SESSION["login_time"];
// var_dump(
// $_SESSION);
?>
      <!-- Section centrale -->
      <section class="container-fluid d-flex justify-content-center align-items-center bg-primary text-white hero">
            <div class="text-center col-md-8 col-lg-6">

                  <h1 class="fw-bold mb-4">
                        BienVenue <?php echo $username; ?>
                  </h1>

                  <p class="mb-3">
                        Vous êtes inscrit(e) depuis le <?php echo $inscriptiondate; ?>
                  </p>
                  <p class="mb-5">
                        Votre heure d'inscription  actuelle est <?php echo $login; ?>
                  </p>

                  <div class="d-flex justify-content-center gap-4">
                        <a href="contact.php" class="btn btn-primary btn-lg ">Voir Vos Contacts</a>
                  </div>

            </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>