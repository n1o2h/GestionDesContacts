<?php include_once '../includes/headerUser.php' ?>

      <!-- Formulaire d'ajout de contact -->
      <div class="container mt-5">
            <form name="AjoutContact" id="AjoutContact" class="mb-5 border p-5 rounded bg-secondary-subtle">
                  <legend class="mb-3 fs-1 text-center fw-bold ">Ajouter un Contact</legend>
                  <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Nom</label>
                        <input type="text" placeholder="Entrer le nom" class="form-control" id="username"
                              name="username">
                  </div>
                  <div class="mb-3">
                        <label for="telephone" class="form-label fw-bold">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone">
                  </div>
                  <div class="mb-3">
                        <label for="email" class="form-label fw-bold">E-mail</label>
                        <input type="text" placeholder="Entrer l'email" class="form-control" id="email" name="email">
                  </div>
                  <div class="mb-3">
                        <label for="adresse" class="form-label fw-bold">Adresse</label>
                        <input type="text" placeholder="Entrer l'adresse" class="form-control" id="adresse"
                              name="adresse">
                  </div>
                  <button type="submit" class="btn btn-success" id="submitBtn">Ajouter</button>
                  <button type="reset" class="btn btn-primary">Annuler</button>
            </form>
            <form class="d-flex" name="searchContact">
                  <input class="form-control me-2" name="search" type="search" placeholder="Search"
                        aria-label="Search" />
            </form>
            <table class="table table-striped mt-3" id="tableProduit">
                  <thead>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th collapse="2">Manager</th>
                  </thead>
                  <tbody id="containerProduit">
                        <tr>
                              <td>1</td>
                              <td>nohaila ait hammad</td>
                              <td>nohaila@gmail.com</td>
                              <td>el jadida, maroc</td>
                              <td type="button" data-id="${produit.id}" class="bg-primary updateBtn">Modifier</td>
                              <td type="button" data-id="${produit.id}" class="bg-danger delateBtn">Supprimer</td>
                        </tr>
                        <tr>
                              <td>1</td>
                              <td>nohaila ait hammad</td>
                              <td>nohaila@gmail.com</td>
                              <td>el jadida, maroc</td>
                              <td type="button" data-id="${produit.id}" class="bg-primary updateBtn">Modifier</td>
                              <td type="button" data-id="${produit.id}" class="bg-danger delateBtn">Supprimer</td>
                        </tr>
                        <tr>
                              <td>1</td>
                              <td>nohaila ait hammad</td>
                              <td>nohaila@gmail.com</td>
                              <td>el jadida, maroc</td>
                              <td type="button" data-id="${produit.id}" class="bg-primary updateBtn">Modifier</td>
                              <td type="button" data-id="${produit.id}" class="bg-danger delateBtn">Supprimer</td>
                        </tr>
                        <tr>
                              <td>1</td>
                              <td>nohaila ait hammad</td>
                              <td>nohaila@gmail.com</td>
                              <td>el jadida, maroc</td>
                              <td type="button" data-id="${produit.id}" class="bg-primary updateBtn">Modifier</td>
                              <td type="button" data-id="${produit.id}" class="bg-danger delateBtn">Supprimer</td>
                        </tr>
                        <tr>
                              <td>1</td>
                              <td>nohaila ait hammad</td>
                              <td>nohaila@gmail.com</td>
                              <td>el jadida, maroc</td>
                              <td type="button" data-id="${produit.id}" class="bg-primary updateBtn">Modifier</td>
                              <td type="button" data-id="${produit.id}" class="bg-danger delateBtn">Supprimer</td>
                        </tr>
                        <tr>
                              <td>1</td>
                              <td>nohaila ait hammad</td>
                              <td>nohaila@gmail.com</td>
                              <td>el jadida, maroc</td>
                              <td type="button" data-id="${produit.id}" class="bg-primary updateBtn">Modifier</td>
                              <td type="button" data-id="${produit.id}" class="bg-danger delateBtn">Supprimer</td>
                        </tr>
                  </tbody>
            </table>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>