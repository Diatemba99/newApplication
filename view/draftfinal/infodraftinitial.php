<?php
@require_once "authentification.php";
$prenomAgent= $_SESSION["CURRENT_user"]['first_name'];
$nomAgent= $_SESSION["CURRENT_user"]['last_name'];
$idNavire= $_GET['id'];
require_once './Composant/navigation.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmafinal.php';
require_once './model/cmmfinal.php';
require_once './model/tpcfinal.php';
require_once './model/deplacementfinal.php';
require_once './model/cargaison.php';
?>

<?php
									
									$ctma = new Ctmafinal($idNavire);
									$result1 = $ctma->getCtmaInitialByID($idNavire);
									if(count($result1)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=ctmafinal&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 1</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=ctmafinal&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 1</font></font></button>
										<?php
									}
									$cmm = new Cmmfinal($idNavire);
									$result2 = $cmm->getCmmInitialByID($idNavire);
									if(count($result2)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=cmmfinal&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 2</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=cmmfinal&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 2</font></font></button>
										<?php
									}
									$tpc = new Tcpfinal($idNavire);
									$result3 = $tpc->getTpcnitialByID($idNavire);
									if(count($result3)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=tpcfinal&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 3</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=tpcfinal&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 3</font></font></button>
										<?php
									}
									$dpl = new Deplacementfinal($idNavire);
									$result4 = $dpl->getDeplacementitialByID($idNavire);
									if(count($result4)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=deplacementfinal&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 4</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=deplacementfinal&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 4</font></font></button>
										<?php
									}
									$dpl = new Cargaison($idNavire);
									$result5 = $dpl->getCargaisonlByID($idNavire);
									if(count($result5)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=cargaison&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 5</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=cargaison&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 5</font></font></button>
										<?php
									}
									
?>
 
<!-- Button trigger modal -->



	<br><br>
<h6 class="mb-0 text-uppercase">Liste des Draft</h6>
	<hr/>

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
					
				</tr>
			</thead>
			<tbody>
				<?php
				$obj_draft = new Infodraftinitial();
				$all_draft = $obj_draft->getInfoNavireByID($idNavire);
				foreach ($all_draft as $draft) {
				?>
					<tr>
						<td><?= $draft['nomNavire'] ?></td>
						<td><?= $draft['callSign'] ?></td>
						<td><?= $draft['officialNo'] ?></td>
						<td><?= $draft['shipManagement'] ?></td>
						<td><?= $draft['operators'] ?></td>
						<td>
							<button type="button" onclick="window.location.href ='?page=overviewfinal&id=<?= $idNavire ?>';" class="btn btn-primary px-3 radius-30"><i class="lni lni-eye"></i></button>
							<?php
							
							if (count($result1)!=0 && count($result2)!=0 && count($result3)!=0 && count($result4)!=0 && count($result5)!=0 && $draft['valide2']==0){
								?>
								<button type="button" onclick="window.location.href = './controller/draftinitial.php?id=<?= $idNavire ?>&activated2=<?= $draft['valide2'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valider Draft</font></font></button>	
								<?php
								
							}elseif ($draft['valide']!=0){
								echo"<button type='button' disabled='disabled' class='btn btn-success px-5 radius-30'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Valider Draft</font></font></button>";
							}else{
								echo"<button type='button' disabled='disabled' class='btn btn-success px-5 radius-30'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Valider Draft</font></font></button>";
							}
							 ?>
							
						</td>
						<td>
							<button onclick="window.location.href = '?page=rapportfinal&id=<?= $idNavire ?>';" type="button" class="btn btn-outline-dark px-5"><i class="bx bx-cloud-upload mr-1"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rapport Final</font></font></button>
						</td>
						<!-- <td>
							<?php
							if ($draft['complete']==0){
								echo"<button type='button' disabled='disabled' class='btn btn-success px-5 radius-30'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Valider Draft</font></font></button>";
							}else{
								echo"<button type='button' class='btn btn-success px-5 radius-30'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Valider Draft</font></font></button>";
							}
							 ?>
							
						</td> -->
						
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>


								 <!-- <?php
									
									$ctma = new Ctmainitial($idNavire);
									$result = $ctma->getCtmaInitialByID($idNavire);
									foreach ($result as $key => $valeur) {
										$tM = $valeur['tM'];
										$tav = $valeur['tav'];
										$tar = $valeur['tar'];
										$truetrim = $valeur['trueTrim'];
										$tEmbd = $valeur['tEmbd'];
										$tEmtd = $valeur['tEmtb'];
									}
									$tpc = new Tcpinitial($idNavire);
									$result = $tpc->getTpcnitialByID($idNavire);
									foreach ($result as $key => $valeur) {
										$TPCMbd = $valeur['TPCMbd'];
										$TPCMtd = $valeur['TPCMtd'];
										$dplCorrige = $valeur['dplCorrige'];										
									}
								?> -->




<?php
    require_once './Composant/footer.php';
?>