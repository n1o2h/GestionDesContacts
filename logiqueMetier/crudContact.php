<?php
session_start();  

include "../config/connexion.php";

if (!isset($_SESSION['id_user'])) {
      header("Location:../pages/loginForm.php");
}

$conn = getConnexion();
global $id_user;
$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      switch ($_POST['submit']) {
            case 'create':
            createContact($conn);
            break;
            case 'update':
            updateContact($conn);
            break;
}
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit']) && $_GET['submit'] === 'delete') {
      deleteContact($conn);
}

function createContact($conn) {
      $firstname = trim($_POST["firstname"]);
      $lastname = trim($_POST["lastname"]);
      $email = trim($_POST['email']);
      $telephone = trim($_POST['telephone']);
      $adresse = trim($_POST['adresse']);
      $id_user = $_SESSION['id_user'];

      // Validation simple
      if (empty($firstname) || empty($lastname) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Erreur : Champs invalides.";
            return;
      }

      $sql = "INSERT INTO contacts (firstname, lastname, email, telephone, adresse, id_user) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      if ($stmt->execute([$firstname, $lastname, $email, $telephone, $adresse, $id_user])) {
            header("Location: ../pages/contact.php?success=created");
            exit();
      } else {
            echo "Erreur lors de l'ajout.";
      }
}

function updateContact($conn) {
      global $id_user;
      $id = $_POST['id'];
      $firstname = trim($_POST["firstname"]);
      $lastname = trim($_POST["lastname"]);
      $email = trim($_POST['email']);
      $telephone = trim($_POST['telephone']);
      $adresse = trim($_POST['adresse']);

      if (empty($firstname) || empty($lastname) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Erreur : Champs invalides.";
            return;
      }

      $sql = "UPDATE contacts SET firstname = ?, lastname = ?, email = ?, telephone = ?, adresse = ? WHERE id = ? AND id_user = ?";
      $stmt = $conn->prepare($sql);
      if ($stmt->execute([$firstname, $lastname, $email, $telephone, $adresse, $id, $id_user])) {
            header("Location: ../pages/contact.php?success=updated");
            exit();
      } else {
            echo "Erreur lors de la mise à jour.";
      }
}

function deleteContact($conn) {
      $id = $_GET['id'];
      $id_user = $_SESSION['id_user'];

      $sql = "DELETE FROM contacts WHERE id = ? AND id_user = ?";
      $stmt = $conn->prepare($sql);
      if ($stmt->execute([$id, $id_user])) {
            header("Location: ../pages/contact.php?success=deleted");
            exit();
      } else {
            echo "Erreur lors de la suppression.";
      }
}

function getAllFromDataBase($conn) {
      $id_user = $_SESSION['id_user'];
      $sql = "SELECT * FROM contacts WHERE id_user = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id_user]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchContacts($conn, $query) {
      $id_user = $_SESSION['id_user'];
      $sql = "SELECT * FROM contacts WHERE id_user = ? AND (firstname LIKE ? OR lastname LIKE ? OR email LIKE ?)";
      $stmt = $conn->prepare($sql);
      $searchTerm = "%$query%";
      $stmt->execute([$id_user, $searchTerm, $searchTerm, $searchTerm]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>


