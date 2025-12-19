<?php
session_start();

if (!isset($_SESSION['id_user'])) {
      header("Location: loginForm.php");
      exit();  
}

include_once '../includes/headerUser.php';
include '../logiqueMetier/crudContact.php';  

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit']) && $_GET['submit'] === 'delete') {
      deleteContact($conn);  
}

$contacts = [];
if (isset($_GET['search']) && !empty($_GET['search'])) {
      $contacts = searchContacts($conn, $_GET['search']);
} else {
      $contacts = getAllFromDataBase($conn);
}

?>

<div class="container mt-5">
      <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#contactModal" ">Ajouter Un Nouveau Contact</button>

      <!-- Formulaire de recherche -->
      <form class="d-flex mb-3" method="GET" action="">
            <input class="form-control me-2" name="search" type="search" placeholder="Rechercher par nom ou email" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>

      <h2 class="fs-1 fw-bold">Liste des contacts</h2>

      <?php if (empty($contacts)): ?>
            <p class="fs-2 fw-bold">Aucun contact trouvé.</p>
      <?php endif; ?>
      
      <table class="table table-striped mt-3" id="tableProduit">
            <thead>
                  <th>ID</th>
                  <th>Prénom</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Téléphone</th>
                  <th>Adresse</th>
                  <th colspan="2">Actions</th>
            </thead>
            <tbody id="containerProduit">
            <?php foreach ($contacts as $contact): ?>
                  <tr>
                        <td><?php echo ($contact['id']); ?></td>
                        <td><?php echo ($contact['firstname']); ?></td>
                        <td><?php echo ($contact['lastname']); ?></td>
                        <td><?php echo ($contact['email']); ?></td>
                        <td><?php echo ($contact['telephone']); ?></td>
                        <td><?php echo ($contact['adresse']); ?></td>
                        <td><button type="button" class="btn btn-primary updateBtn" data-id="<?php echo $contact['id']; ?>" data-bs-toggle="modal" data-bs-target="#contactModal" onclick="openUpdateModal(this)">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger deleteBtn" data-id="<?php echo $contact['id']; ?>" onclick="confirmDelete(<?php echo $contact['id']; ?>)">Supprimer</button></td>
                  </tr>
                  <?php endforeach; ?>
            </tbody>
      </table>
      </div>

      <!-- Modal  pour Create et Update -->
      <div class="modal fade" id="contactModal" tabindex="-1">
      <div class="modal-dialog">
            <div class="modal-content">
                  <form method="POST" action="../logiqueMetier/crudContact.php">
                  <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Ajouter un Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" name="id" id="contactId">  <!-- Pour Update, sinon vide pour Create -->
                        <div class="mb-3">
                              <label for="modalFirstname">Prénom</label>
                              <input type="text" class="form-control" name="firstname" id="modalFirstname" required>
                        </div>
                        <div class="mb-3">
                              <label for="modalLastname">Nom</label>
                              <input type="text" class="form-control" name="lastname" id="modalLastname" required>
                        </div>
                        <div class="mb-3">
                              <label for="modalEmail">Email</label>
                              <input type="email" class="form-control" name="email" id="modalEmail" required>
                        </div>
                        <div class="mb-3">
                              <label for="modalTelephone">Téléphone</label>
                              <input type="tel" class="form-control" name="telephone" id="modalTelephone" required>
                        </div>
                        <div class="mb-3">
                              <label for="modalAdresse">Adresse</label>
                              <input type="text" class="form-control" name="adresse" id="modalAdresse" required>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="submit" name="submit" id="submitBtn" value="create" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#contactModal">Ajouter</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  </div>
                  </form>
            </div>
      </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
      <script>
      // Fonction pour ouvrir le modal en mode "Create" (champs vides)
      // function openCreateModal() {
      //       document.getElementById('modalTitle').textContent = 'Ajouter un Contact';
      //       document.getElementById('contactId').value = '';
      //       document.getElementById('modalFirstname').value = '';
      //       document.getElementById('modalLastname').value = '';
      //       document.getElementById('modalEmail').value = '';
      //       document.getElementById('modalTelephone').value = '';
      //       document.getElementById('modalAdresse').value = '';
      //       document.getElementById('submitBtn').value = 'create';
      //       document.getElementById('submitBtn').textContent = 'Ajouter';
      // }

      // Fonction pour ouvrir le modal en mode "Update" (champs remplis)
      function openUpdateModal(button) {
            document.getElementById('modalTitle').textContent = 'Modifier Contact';
            const row = button.closest('tr');
            document.getElementById('contactId').value = button.getAttribute('data-id');
            document.getElementById('modalFirstname').value = row.cells[1].textContent;
            document.getElementById('modalLastname').value = row.cells[2].textContent;
            document.getElementById('modalEmail').value = row.cells[3].textContent;
            document.getElementById('modalTelephone').value = row.cells[4].textContent;
            document.getElementById('modalAdresse').value = row.cells[5].textContent;
            document.getElementById('submitBtn').value = 'update';
            document.getElementById('submitBtn').textContent = 'Mettre à jour';
      }

      // Confirmation pour Delete
      function confirmDelete(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')) {
                  window.location.href = `../logiqueMetier/crudContact.php?submit=delete&id=${id}`;
            }
      }
</script>
</body>
</html>