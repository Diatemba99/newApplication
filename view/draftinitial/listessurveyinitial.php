<?php
@require_once "authentification.php";
require_once './Composant/navigation.php';
require_once './model/draftinitial.php';
require_once './model/infodraftinitial.php';
require_once './model/ports.php';
require_once './model/navires.php';
$profile=$_SESSION["CURRENT_user"]['id'];
?>

<!-- Button trigger modal -->
<?php
if ($_SESSION["CURRENT_user"]['type']==='Administrateur' or $_SESSION["CURRENT_user"]['type']==='Enqueteur'){
	?>
	<button type="button" class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#NouveauDraft"><i class="fa-duotone fa-plus"></i>AJOUTER NOUVEAU DRAFT</button>
	<?php
}
?>

	<br><br>
<h6 class="mb-0 text-uppercase">Liste des Draft</h6>
	<hr/>
	<!-- <?php echo $profile?> -->
	<?php
	if($_SESSION["CURRENT_user"]['type'] =='Administrateur'){
		?>
		<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Port</th>
					<th>Nom Navire</th>
					<th>Call Sign</th>
					<th>Official N°</th>
					<th>Ship Management</th>
					<th>Opérators</th>
					<th>Statut</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_draft = new Draft();
				$all_draft = $obj_draft->getDraftInitial();
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['port'] ?></td>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-warning"></i></span></td>
							<?php
						}elseif ($draft['valide'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i></span></td>
							<?php
						}
						?>
						
						<td class="d-flex">

							<?php
						if ($draft['valide'] == 0){
							?>
								<button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<?php
						}elseif ($draft['valide'] == 1){
							?>
								<button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-secondary px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<?php
						}
						?>
							
							<!-- <button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Continuer Draft</font></font></button>&nbsp; &nbsp; -->
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<a href="./controller/draftinitial.php?idsup=<?= $draft['id'] ?>" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment supprimer ce Draft?')"><i class="bx bxs-trash-alt"></i></a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
	<?php	
	}elseif($_SESSION["CURRENT_user"]['type'] =='Enqueteur'){
		?>
		<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Port</th>
					<th>Nom Navire</th>
					<th>Call Sign</th>
					<th>Official N°</th>
					<th>Ship Management</th>
					<th>Opérators</th>
					<th>Statut</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_draft = new Infodraftinitial();
				$all_draft = $obj_draft->getDraftInitialbyInspecteur($profile);
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['port'] ?></td>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-warning"></i></span></td>
							<?php
						}elseif ($draft['valide'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i></span></td>
							<?php
						}
						?>
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<a href="./controller/draftinitial.php?idsup=<?= $draft['id'] ?>" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment supprimer ce Draft?')"><i class="bx bxs-trash-alt"></i></a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
	<?php
	}elseif($_SESSION["CURRENT_user"]['type'] =='Superviseur'){
		?>
		<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Port</th>
					<th>Nom Navire</th>
					<th>Call Sign</th>
					<th>Official N°</th>
					<th>Ship Management</th>
					<th>Opérators</th>
					<th>Statut</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_draft = new Draft();
				$all_draft = $obj_draft->getDraftInitial();
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['port'] ?></td>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-warning"></i></span></td>
							<?php
						}elseif ($draft['valide'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i></span></td>
							<?php
						}
						?>
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<!-- <button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<a href="./controller/draftinitial.php?idsup=<?= $draft['id'] ?>" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment supprimer ce Draft?')"><i class="bx bxs-trash-alt"></i></a> -->
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
	<?php	
	}
	?>




	<!-- Modal d'ajout -->
	<div class="modal fade" id="NouveauDraft" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Survey Initial - Etape 1/6</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<h6 class="mb-0 text-uppercase">Information Du Navire</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Nouveau Draft</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/draftinitial.php">
								
								<input type="text" hidden name="idUser" value="<?=$profile?>" class="form-control border-start-0" id="idUser" placeholder="" />
								<!-- Sélecteur Port -->
								 <div class="col-md-6">
									<div class="input-group ">
								<span class="input-group-text">Port</span>
								<select name="port" id="port" class="form-select">
									<option disabled selected>Sélectionner un port</option>
									<?php
									$obj_port = new Ports();
									$ports = $obj_port->getPort();
									foreach ($ports as $port) {
									?>
									<option value="<?= $port['id'] ?>" data-nom="<?= $port['nom'] ?>"><?= $port['nom'] ?></option>
									<?php } ?>
								</select>
								<input type="hidden" name="port_nom" id="port_nom">
								</div>
								 </div>
								

							<!-- Sélecteur Navire -->
							<div class="col-md-6">
								<div class="input-group ">
									<span class="input-group-text">Navire</span>
								<select id="nomNavire" name="nomNavire" class="form-select">
									<option value="">Sélectionner un navire</option>
								</select>
								</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Call Sign</font></font></span>
										<input type="text" required name="callSign" class="form-control border-start-0" id="callSign" placeholder="Call Sign" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Official N°</font></font></span>
										<input type="text" required name="officialN" class="form-control border-start-0" id="officialN" placeholder="Official N°" />
									</div>
							</div>
							
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operators</font></font></span>
										<input type="text" required name="operators" class="form-control border-start-0" id="operators" placeholder="Operators" />
									</div>
							</div>
							
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lbp</font></font></span>
										<input type="number" step="any" required name="lbp" class="form-control border-start-0" id="lbp" placeholder="LBP" />
									</div>
							</div>
							
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keel plate</font></font></span>
										<input type="number" step="any" required name="keelPlate" class="form-control border-start-0" id="keelPlate" placeholder="Keel plate" />
									</div>
							</div>
							
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Disp</font></font></span>
										<input type="number" step="any" required name="disp" class="form-control border-start-0" id="disp" placeholder="DISP" />
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

<!-- Script AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Script récupération des valeurs pour une  modification -->
<script>
	
    $('#port').on('change', function () {
    const idPort = $(this).val(); // Pour charger les navires
  const nomPort = $('#port option:selected').data('nom'); // Pour stocker le nom
  $('#port_nom').val(nomPort); // Remplit le champ caché

  // Charger les navires en fonction de l’ID du port

    $.ajax({
      url: 'controller/draftinitial.php',
      method: 'POST',
      data: {
        action: 'getNavires',
        idPort: idPort
      },
      success: function (response) {
        $('#nomNavire').html(response);
      },
      error: function () {
        alert("Erreur lors du chargement des navires.");
      }
    });
  });
  
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