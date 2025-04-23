<?php
@require_once "authentification.php";
require_once './Composant/navigation.php';
require_once './model/ports.php';
require_once './model/navires.php';
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
<button type="button" class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#AjouterNavires"><i class="fa-duotone fa-plus"></i>AJOUTER</button>
	<br><br>
<h6 class="mb-0 text-uppercase">Liste des Navires</h6>
	<hr/>

<div class="card-body">
	<div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>Nom Navires</th>
                    <th>Ports</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_port = new Navires();
				$navires = $obj_port->getNavire();
				foreach ($navires as $navire) {
				?>
					<tr>
						<td><?= $navire['id'] ?></td>
						<td><?= $navire['nom'] ?></td>
                        <td><?= $navire['idport'] ?></td>
						
						<td class="d-flex">
							
							<button type="button" onclick="recupererValeur(<?= $navire['id'] ?>,'<?= $navire['nom'] ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModifierNavire"><i class="bx bxs-edit"></i></button>&nbsp; &nbsp;
							<a href="./controller/navires.php?idsup=<?= $navire['id'] ?>" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment supprimer ce navire?')"><i class="bx bxs-trash-alt"></i></a>
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
	<div class="modal fade" id="AjouterNavires" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Navire</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">	
				<h6 class="mb-0 text-uppercase">Formulaire d'ajout</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Ajouter Navire</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="controller/navires.php">
							
								<div class="col-12">
									<label for="inputLastName1" class="form-label">Nom du Navire</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" required name="nom" class="form-control border-start-0" id="nom" placeholder="Nom Navire" />
									</div>
								</div>

                                <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                                <select name="idPort"  class="form-control">
                                                    <option disabled="disabled" selected="selected">Sélectionner Le Port</option>
                                                    <?php 
                                                        $obj_user=new Ports();
                                                        $Ports= $obj_user->getPort();
                                                        foreach($Ports as $Port)  {
                                                    ?>
                                                    <option value="<?=$Port['id']?>"><?=$Port['nom']?></option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
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
<!-- Fin Modal Ajout Navire -->



<!-- Modal Modifier Navire -->
<div class="modal fade" id="ModifierNavire" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Navire</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">	
				<h6 class="mb-0 text-uppercase">Formulaire de Modification</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-pencil-alt me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Modifier Navire</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="controller/navires.php">
							<div class="col-12">
									
									<div class="input-group">
										<input type="hidden" name="idNavire_modif" class="form-control border-start-0" id="idNavire_modif" placeholder="ID" />
									</div>
								</div>
							
								<div class="col-12">
									<label for="inputLastName1" class="form-label">NOM</label>
									<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
										<input type="text" name="nom_modif" class="form-control border-start-0" id="nom_modif" placeholder="nom" required />
									</div>
								</div>
								
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                                <select name="idPort_modif" id="idPort_modif"  class="form-control">
                                                    <option disabled="disabled" selected="selected">Sélectionner La Zone</option>
                                                    <?php 
                                                        $obj_user=new Ports();
                                                        $Ports= $obj_user->getPort();
                                                        foreach($Ports as $Port)  {
                                                    ?>
                                                    <option value="<?=$Port['id']?>"><?=$Port['nom']?></option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                 </div>
								
								<div >
									<button name="btn_modif_navire" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<!-- Fin Modal Modifier Navire -->
<!-- Script récupération des valeurs pour une  modification -->
<script>
  function recupererValeur(idNavire,nomNavire,idPport) {
    document.getElementById("idNavire_modif").value = idNavire;
    document.getElementById("nom_modif").value = nomNavire;
    document.getElementById("idPort_modif").value = idPort;
  }
</script>
<!-- Fin Script récupération des valeurs pour une  modification -->
<?php
require_once './Composant/footer.php';
?>