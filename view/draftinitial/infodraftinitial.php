<?php
@require_once "authentification.php";
$prenomAgent= $_SESSION["CURRENT_user"]['first_name'];
$nomAgent= $_SESSION["CURRENT_user"]['last_name'];
$idNavire= $_GET['id'];
require_once './Composant/navigation.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmainitial.php';
require_once './model/cmminitial.php';
require_once './model/tpcinitial.php';
require_once './model/deplacementinitial.php';
?>
 
<!-- Button trigger modal -->
<?php
									$cmma = new Infodraftinitial($idNavire);
									$result1 = $cmma->getInfoDraftByID($idNavire);
									if(count($result1)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=infonavire&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 2</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=infonavire&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 2</font></font></button>
										<?php
									}
									$ctma = new Ctmainitial($idNavire);
									$result2 = $ctma->getCtmaInitialByID($idNavire);
									if(count($result2)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=ctmainitial&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 3</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=ctmainitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 3</font></font></button>
										<?php
									}
									$cmm = new Cmminitial($idNavire);
									$result3 = $cmm->getCmmInitialByID($idNavire);
									if(count($result3)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=cmminitial&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 4</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=cmminitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 4</font></font></button>
										<?php
									}
									$tpc = new Tcpinitial($idNavire);
									$result4 = $tpc->getTpcnitialByID($idNavire);
									if(count($result4)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=tpcinitial&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 5</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=tpcinitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 5</font></font></button>
										<?php
									}
									$dpl = new Deplacementinitial($idNavire);
									$result5 = $dpl->getDeplacementinitialByID($idNavire);
									if(count($result5)==0){
										?>
										<button type="button" onclick="window.location.href = '?page=deplacementinitial&id=<?= $idNavire ?>';" class="btn btn-danger px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 6</font></font></button>
										<?php
									}else{
										?>
										<button type="button" onclick="window.location.href = '?page=deplacementinitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 6</font></font></button>
										<?php
									}
									
?>
<!-- <button type="button" onclick="window.location.href = '?page=infonavire&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 2</font></font></button> -->
<!-- <button type="button" onclick="window.location.href = '?page=ctmainitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 3</font></font></button> -->
<!-- <button type="button" onclick="window.location.href = '?page=cmminitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 4</font></font></button> -->
<!-- <button type="button" onclick="window.location.href = '?page=tpcinitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 5</font></font></button> -->
<!-- <button type="button" onclick="window.location.href = '?page=deplacementinitial&id=<?= $idNavire ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etape 6</font></font></button> -->
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
							<?php
							
							if (count($result1)!=0 && count($result2)!=0 && count($result3)!=0 && count($result4)!=0 && count($result5)!=0 && $draft['valide']==0){
								?>
								<button type="button" onclick="window.location.href = './controller/draftinitial.php?id=<?= $idNavire ?>&activated=<?= $draft['valide'] ?>';" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valider Draft</font></font></button>	
								<?php
								
							}elseif ($draft['valide']!=0){
								echo"<button type='button' disabled='disabled' class='btn btn-success px-5 radius-30'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Valider Draft</font></font></button>";
							}else{
								echo"<button type='button' disabled='disabled' class='btn btn-success px-5 radius-30'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>Valider Draft</font></font></button>";
							}
							 ?>
							
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
									// $id = $_GET['id'];
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
										$dplCorrige = $valeur['deplCorrige'];										
									}
								?>

<!-- Fin Modal Ajout information sur le draft Etape 6-->




<?php
    require_once './Composant/footer.php';
?>