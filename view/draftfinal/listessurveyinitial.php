<?php
@require_once "authentification.php";
require_once './Composant/navigation.php';
require_once './model/draftinitial.php';
require_once './model/infodraftinitial.php';
$profile=$_SESSION["CURRENT_user"]['id'];
?>
 
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#AjouterUtilisateur"><i class="fa-duotone fa-plus"></i>AJOUTER</button> -->
	<br><br>
<h6 class="mb-0 text-uppercase">Liste des Draft/Draft Final</h6>
	<hr/>
<?php
	if($_SESSION["CURRENT_user"]['type'] ==='Administrateur'){
		?>
<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
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
				$all_draft = $obj_draft->getDraftInitialValide();
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 1 && $draft['valide2'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-warning"></i></span></td>
							<?php
						}elseif ($draft['valide'] == 1 && $draft['valide2'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i></span></td>
							<?php
						}
						?>
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftfinal&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<button type="button" class="btn btn-danger" onclick="showSwal('warning-message-and-cancel')"><i class="bx bxs-trash-alt"></i></button>
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
	}elseif($_SESSION["CURRENT_user"]['type'] ==='Enqueteur'){
		?>
		<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
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
				$all_draft = $obj_draft->getDraftInitialValidebyInspecteur($profile);
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 1 && $draft['valide2'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-warning"></i></span></td>
							<?php
						}elseif ($draft['valide'] == 1 && $draft['valide2'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i></span></td>
							<?php
						}
						?>
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftfinal&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<button type="button" class="btn btn-danger" onclick="showSwal('warning-message-and-cancel')"><i class="bx bxs-trash-alt"></i></button>
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
					<th>Nom Navire</th>
					<th>Call Sign</th>
					<th>Official N°</th>
					<th>Ship Management</th>
					<th>Opérators</th>
					<th>Statut</th>
					<!-- <th>Actions</th> -->
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_draft = new Draft();
				$all_draft = $obj_draft->getDraftInitialValide();
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 1 && $draft['valide2'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-warning"></i></span></td>
							<?php
						}elseif ($draft['valide'] == 1 && $draft['valide2'] == 1){
							?>
								<td class="text-center"><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i></span></td>
							<?php
						}
						?>
						<!-- <td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftfinal&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Suivant</font></font></button>&nbsp; &nbsp;
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<button type="button" class="btn btn-danger" onclick="showSwal('warning-message-and-cancel')"><i class="bx bxs-trash-alt"></i></button>
						</td> -->
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