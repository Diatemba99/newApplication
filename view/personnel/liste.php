<?php
@require_once "authentification.php";
require_once './Composant/navigation.php';
require_once './model/utilisateur.php';
?>

<?php
if(isset($_GET['erreur_insersionmdp'])){
	echo " <div class='alert alert-danger d-flex align-items-center' role='alert'>
                  
                             <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/>
                                <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                                  <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                                </symbol>
                             </svg>
                              <div>
                                  Les deux mots de passes ne correspondent pas!
                              </div>
                           </div>";
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#AjouterUtilisateur"><i class="fa-duotone fa-plus"></i>AJOUTER</button>
	<br><br>
<h6 class="mb-0 text-uppercase">Liste des utilisateurs</h6>
	<hr/>

<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Email</th>
					<th>Type</th>
					<th>Activé</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_user = new Utilisateur();
				$les_users = $obj_user->getAllUtilisateur();
				foreach ($les_users as $user) {
				?>
					<tr>
						<td><?= $user['id'] ?></td>
						<td><?= $user['first_name'] ?></td>
						<td><?= $user['last_name'] ?></td>
						<td><?= $user['email'] ?></td>
						<td><?= $user['type'] ?></td>
						<td>
							<?php
							if ($user['activated'] == 1) {
								echo "<a class='btn btn-success' href='./controller/personnelController.php?idUser=$user[id]&activated=$user[activated]'>";
								echo '<i class="bx bx-toggle-right" title="Utilisateur Activé"></i>';
							} else {
								echo "<a class='btn btn-secondary' href='./controller/personnelController.php?idUser=$user[id]&activated=$user[activated]'>";
								echo '<i class="bx bx-toggle-left" title="Utilisateur Désactivé"></i>';
							}
							?>
							</a>
						</td>
						<td class="d-flex">
							
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<a href="./controller/personnelController.php?idsup=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment supprimer cet Utilisateur?')"><i class="bx bxs-trash-alt"></i></a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>



	<!-- Modal d'ajout -->
	<div class="modal fade" id="AjouterUtilisateur" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Personnel/Utilisateur</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">	
				<h6 class="mb-0 text-uppercase">Formulaire d'ajout</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Nouveau Utilisateur</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="controller/personnelController.php">
							<div class="col-12">
								<label for="inputLastName1" class="form-label">TYPE d'UTILISATEUR</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
									<select required name="typeUser" id="type_utilisateur" class="form-select">
										<option value="" disabled="disabled" selected="selected">- - Selectionner le type- -</option>
										<option value="Administrateur">Administrateur</option>
										<option value="Enquêteur">Enquêteur</option>
										<option value="Superviseur">Superviseur</option>
									</select>
								</div>
							</div>
								<div class="col-12">
									<label for="inputLastName1" class="form-label">PRENOM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" required name="prenom" class="form-control border-start-0" id="prenom" placeholder="Prenom" />
									</div>
								</div>
								<div class="col-12">
									<label for="inputLastName2" class="form-label">NOM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" required name="nom" class="form-control border-start-0" id="nom" placeholder="Nom" />
									</div>
								</div>
								
								<div class="col-12">
									<label for="inputEmailAddress" class="form-label">E-MAIL</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-envelope'></i></span>
										<input type="email" required name="email" class="form-control border-start-0" id="email" placeholder=".......@exemple.com" />
									</div>
								</div>
								
								<div class="col-12">
									<label for="inputChoosePassword" class="form-label">Mot de passe</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock'></i></span>
										<input type="text" required name="mot_de_passe" class="form-control border-start-0" id="mot_de_mot" placeholder="Mot de passe" />
									</div>
								</div>

								<div class="col-12">
									<label for="inputChoosePassword" class="form-label"> Confirmation Mot de passe</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock'></i></span>
										<input type="text" required name="Cmot_de_passe" class="form-control border-start-0" id="Cmot_de_mot" placeholder="Mot de passe" />
									</div>
								</div>
							
								<div >
									<button name="btn_ajout" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
</div>
<!-- Fin Modal Ajout Utilisateur -->



<!-- Modal Modifier Utilisateur -->
<div class="modal fade" id="ModifierUtilisateur" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Personnel/Utilisateur</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">	
				<h6 class="mb-0 text-uppercase">Formulaire de Modification</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-pencil-alt me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Modifier Utilisateur</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="controller/personnelController.php">
							<div class="col-12">
									
									<div class="input-group">
										<input type="hidden" name="idUser_modif" class="form-control border-start-0" id="idUser_modif" placeholder="ID" />
									</div>
								</div>
							<div class="col-12">
								<label for="inputLastName1" class="form-label">TYPE D'UTILISATEUR</label>
								<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
									<select name="typeUser_modif" id="type_utilisateur_modif" class="form-select" required>
										<option value="" disabled="disabled" selected="selected">- - Selectionner le type- -</option>
										<option value="Administrateur">Administrateur</option>
										<option value="User">User</option>
										
									</select>
								</div>
							</div>
								<div class="col-12">
									<label for="inputLastName1" class="form-label">PRENOM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="prenom_modif" class="form-control border-start-0" id="prenom_modif" placeholder="Prenom" required />
									</div>
								</div>
								<div class="col-12">
									<label for="inputLastName2" class="form-label">NOM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="nom_modif" class="form-control border-start-0" id="nom_modif" required/>
									</div>
								</div>
								
								
								<div class="col-12">
									<label for="inputEmailAddress" class="form-label">E-MAIL</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-envelope'></i></span>
										<input type="email" name="email_modif" class="form-control border-start-0" id="email_modif" required/>
									</div>
								</div>
								
								<div class="col-12">
									<label for="inputChoosePassword" class="form-label">MOT DE PASSE</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-lock'></i></span>
										<input type="password" name="mot_de_passe_modif" class="form-control border-start-0" id="mot_de_passe_modif" required />
									</div>
								</div>
								
								
								<div >
									<button name="btn_modif_utilisateur" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<!-- Fin Modal Modifier Utilisateur -->
<!-- Script récupération des valeurs pour une  modification -->
<script>
  function recupererValeur(idUser,typeUser,prenomUser,nomUser,email) {
    document.getElementById("idUser_modif").value = idUser;
    document.getElementById("prenom_modif").value = prenomUser;
	document.getElementById("nom_modif").value = nomUser;
    document.getElementById("email_modif").value = email;
	// document.getElementById("mot_de_passe_modif").value = motdepasse;
	document.getElementById("typeUser_modif").value = typeUser;
  }
</script>
<!-- Fin Script récupération des valeurs pour une  modification -->
<?php
require_once './Composant/footer.php';
?>