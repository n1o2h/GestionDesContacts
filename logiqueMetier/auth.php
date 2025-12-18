<?php 

require '../config/connexion.php';
session_start();
$conn = getConnexion();

if(!isset($_POST['submit'])){
      session_unset();
      session_destroy();
      header('Location: index.php');
}

switch ($_POST['submit']){
      case 'register': 
            register($conn);
            break;
      case 'login' :
            login($conn);
            break;
}


function register($conn){

            $username =  $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $inscription_date = date('Y-m-d');

      // == validation cote serveur == //
      $errors = validate_registration_fields($username, $email, $password);

      if (!empty($errors)) {
            // Stocke les erreurs dans la session et redirige
            $_SESSION["register_error"] = implode("<br>", $errors);  // Concatène les erreurs pour affichage
            header("Location: ../pages/registerForm.php");
            exit();
      }

      $password = password_hash($password, PASSWORD_DEFAULT);

      $sql="INSERT INTO users (username, email, password, inscription_date) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      try {
            $stmt->execute([$username, $email, $password, $inscription_date]);
            
            // Succès : set sessions pour connexion automatique
            $user_id = $conn->lastInsertId();  // Récupère l'ID du nouvel utilisateur
            $_SESSION["id_user"] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION["inscription_date"] = $inscription_date;
            $_SESSION["login_time"] = date('H:i:s');  // Heure de connexion pour affichage
            
            unset($_SESSION["register_error"]);
            header("Location: ../pages/profile.php");  // Redirection directe vers profil
            exit();
      } catch (PDOException $e) {
            $_SESSION["register_error"] = "Erreur lors de l'inscription : " . $e->getMessage();
            header("Location: ../pages/registerForm.php");
            exit();
      }
}

function login($conn){
      $username= $_POST['username'];
      $password = $_POST['password'];

            // Validation des champs
      $errors = validate_login_fields($username, $password);
      if (!empty($errors)) {
            $_SESSION["login_error"] = implode("<br>", $errors);
            redirectToLogin();
            exit();  // Empêche l'exécution suivante
      }

      // Requête DB optimisée avec gestion d'erreurs
      try {
            $sql = "SELECT id, username, password, inscription_date FROM users WHERE username = ?";  // Sélectionne seulement ce qui est nécessaire
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérification sécurisée : user existe ET mot de passe correct
            if ($user && password_verify($password, $user['password'])) {
                  // Succès : set sessions et redirige
                  $_SESSION["id_user"] = $user["id"];
                  $_SESSION['username'] = $user["username"];
                  $_SESSION["inscription_date"] = $user["inscription_date"];
                  unset($_SESSION["login_error"]);
                  redirectToProfile();
                  exit();  // Important : stop l'exécution
            } else {
                  // Échec : message générique pour sécurité
                  $_SESSION['login_error'] = "Identifiants invalides.";
                  redirectToLogin();
                  exit();
            }
      } catch (PDOException $e) {
            // Erreur DB : log interne et message générique
            error_log("Erreur DB dans login : " . $e->getMessage());  // Pour debug, pas affiché à l'utilisateur
            $_SESSION['login_error'] = "Erreur serveur. Réessayez.";
            redirectToLogin();
            exit();
      }
}


function redirectToLogin(){
      header("Location: ../pages/loginForm.php");
}

function redirectToProfile(){
      header("Location: ../pages/profile.php?all=true");
}

function validate_login_fields($username, $password) {
      $errors = [];
      
      if (empty($username) || empty($password) || $username === "" || $password === "") {
            $errors[] = 'All fields required';
      } else {
            if (!is_valid_username($username)) {
                  $errors[] = 'Il faut avoir un nom contenant plus de 3 caractères';
            }
            if (!is_valid_password($password)) {
                  $errors[] = 'Il faut avoir un mot de passe de plus que 6 caractères';
            }
      }
      
      return $errors;
}
// Fonctions de validation (si pas déjà définies ailleurs, ajoute-les ici)
function is_valid_username($username) {
    return preg_match('/^[a-zA-Z0-9]{3,}$/', $username);  // ≥3 caractères alphanumériques
}

function is_valid_password($password) {
    return strlen($password) >= 6;  // ≥6 caractères
}

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);  // Format email valide
}

// Fonction principale de validation pour l'inscription
function validate_registration_fields($username, $email, $password) {
      $errors = [];
      
      // Vérification des champs vides (comme dans ton code commenté)
      if (empty($username) || empty($email) || empty($password) || $username === "" || $email === "" || $password === "") {
            $errors[] = 'All fields required';  // Message adapté (ton code avait 'All filds required')
      } else {
            // Validations spécifiques si les champs ne sont pas vides
            if (!is_valid_username($username)) {
                  $errors[] = 'Il faut avoir un nom contenant plus de 3 caractères';  // Ton message original
            }
            if (!is_valid_password($password)) {
                  $errors[] = 'Il faut avoir un mot de passe de plus que 6 caractères';  // Ton message original
            }
            if (!is_valid_email($email)) {
                  $errors[] = 'Email est non valide';  // Ton message original
            }
            
      }
      
    return $errors;  // Retourne l'array d'erreurs (vide si valide)
}

// ... (le reste de ton code)


?>
