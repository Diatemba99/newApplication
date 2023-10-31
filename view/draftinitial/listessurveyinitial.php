<?php
@require_once "authentification.php";
require_once './Composant/navigation.php';
require_once './model/draftinitial.php';
require_once './model/infodraftinitial.php';
$profile=$_SESSION["CURRENT_user"]['id'];
?>
 
<!-- Button trigger modal -->
<?php
if ($_SESSION["CURRENT_user"]['type']==='Administrateur' or $_SESSION["CURRENT_user"]['type']==='Enqueteur'){
	?>
	<button type="button" class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#AjouterUtilisateur"><i class="fa-duotone fa-plus"></i>AJOUTER NOUVEAU DRAFT</button>
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
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>En cours</span></td>
							<?php
						}elseif ($draft['valide'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i>Terminé</span></td>
							<?php
						}
						?>
						
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Continuer Draft</font></font></button>&nbsp; &nbsp;
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
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
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>En cours</span></td>
							<?php
						}elseif ($draft['valide'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i>Terminé</span></td>
							<?php
						}
						?>
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Continuer Draft</font></font></button>&nbsp; &nbsp;
							<button type="button" onclick="recupererValeur(<?= $user['id'] ?>,'<?= $user['type'] ?>','<?= $user['first_name'] ?>','<?= $user['last_name'] ?>','<?= $user['email'] ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModifierUtilisateur"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
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
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<?php
						if ($draft['valide'] == 0){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>En cours</span></td>
							<?php
						}elseif ($draft['valide'] == 1){
							?>
								<td><span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i>Terminé</span></td>
							<?php
						}
						?>
						<td class="d-flex">
							
							<button type="button" onclick="window.location.href = '?page=infodraftinitial&id=<?= $draft['id'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Continuer Draft</font></font></button>&nbsp; &nbsp;
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
	<div class="modal fade" id="AjouterUtilisateur" tabindex="-1" aria-hidden="true">
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
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom du Navire</font></font></span>
										<input type="text" required name="nomNavire" class="form-control border-start-0" id="nomNavire" placeholder="Nom du Navire" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CALL SIGN</font></font></span>
										<input type="text" required name="callSign" class="form-control border-start-0" id="callSign" placeholder="Call Sign" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">OFFICIAL N°</font></font></span>
										<input type="text" required name="officialN" class="form-control border-start-0" id="officialN" placeholder="Official N°" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SHIP MANAGEMENT</font></font></span>
										<input type="text" required name="shipManagement" class="form-control border-start-0" id="shipManagement" placeholder="Ship Management" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">OPERATORS</font></font></span>
										<input type="text" required name="operators" class="form-control border-start-0" id="operators" placeholder="Operators" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">REGISTERED OWNERS</font></font></span>
										<input type="text" required name="registeredOwners" class="form-control border-start-0" id="registeredOwners" placeholder="Registered Owners" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VSA/CSO</font></font></span>
										<input type="text" required name="vsa" class="form-control border-start-0" id="vsa" placeholder="VSA/CCSO" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SEO</font></font></span>
										<input type="text" required name="seo" class="form-control border-start-0" id="seo" placeholder="SEO" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FLAG</font></font></span>
										<input type="text" required name="flag" class="form-control border-start-0" id="flag" placeholder="Flag" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PORT OF REG</font></font></span>
										<input type="text" required name="portOfReg" class="form-control border-start-0" id="portOfReg" placeholder="Port Of Reg" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BUILDERS</font></font></span>
										<input type="text" required name="builders" class="form-control border-start-0" id="builders" placeholder="Builders" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HULL N°</font></font></span>
										<input type="number" required name="hull" class="form-control border-start-0" id="hull" placeholder="Hull N°" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TYPE</font></font></span>
										<input type="text" required name="type" class="form-control border-start-0" id="type" placeholder="Type" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">KEEL LAID</font></font></span>
										<input type="text" required name="keelLaid" class="form-control border-start-0" id="keelLaid" placeholder="Keel Laid" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DELIVERED</font></font></span>
										<input type="text" required name="delivered" class="form-control border-start-0" id="delivered" placeholder="Delivered" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CLASS SOCIETY</font></font></span>
										<input type="text" required name="class" class="form-control border-start-0" id="class" placeholder="Class Society" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">H&M Underwrirers</font></font></span>
										<input type="text" required name="hm" class="form-control border-start-0" id="hm" placeholder="H&M Underwrirers " />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">P&I CLUB</font></font></span>
										<input type="text" required name="piclub" class="form-control border-start-0" id="piclub" placeholder="P&I Club" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LOA</font></font></span>
										<input type="number" required name="loa" class="form-control border-start-0" id="loa" placeholder="LOA" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LBP</font></font></span>
										<input type="number" required name="lbp" class="form-control border-start-0" id="lbp" placeholder="LBP" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Breadth (moulded)</font></font></span>
										<input type="number" required name="breadth" class="form-control border-start-0" id="breadth" placeholder="Breadth (moulded)" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Depth (moulded)</font></font></span>
										<input type="number" required name="depthMoulded" class="form-control border-start-0" id="depthMoulded" placeholder="Depth (moulded)" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Depth (extreme)</font></font></span>
										<input type="number" required name="depthExterne" class="form-control border-start-0" id="depthExterne" placeholder="Depth (extreme)" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keel plate</font></font></span>
										<input type="number" required name="keelPlate" class="form-control border-start-0" id="keelPlate" placeholder="Keel plate" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DWT</font></font></span>
										<input type="number" required name="dwt" class="form-control border-start-0" id="dwt" placeholder="DWT" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DISP</font></font></span>
										<input type="number" required name="disp" class="form-control border-start-0" id="disp" placeholder="DISP" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LIGHTSHIP</font></font></span>
										<input type="number" required name="lightship" class="form-control border-start-0" id="lightship" placeholder="LIGHTSHIP" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DRAFT (MOULDED)</font></font></span>
										<input type="number" required name="draftMoulded" class="form-control border-start-0" id="draftMoulded" placeholder="DRAFT (MOULDED)" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DRAFT (EXTREME)</font></font></span>
										<input type="number" required name="draftExtreme" class="form-control border-start-0" id="draftExtreme" placeholder="DRAFT (EXTREME)" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FP TO FORE DRAFT MARK</font></font></span>
										<input type="number" required name="fp" class="form-control border-start-0" id="fp" placeholder="FP TO FORE DRAFT MARK" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AP TO AFT DRAFT MARK</font></font></span>
										<input type="number" required name="ap" class="form-control border-start-0" id="ap" placeholder="AP TO AFT DRAFT MARK" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MIDSHIP TO MID DRAFT MARK</font></font></span>
										<input type="number" required name="midship" class="form-control border-start-0" id="midship" placeholder="MIDSHIP TO MID DRAFT MARK" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BETWEEN DRAFT MARKS</font></font></span>
										<input type="number" required name="between" class="form-control border-start-0" id="between" placeholder="BETWEEN DRAFT MARKS" />
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