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
require_once './model/deplacementinitial.php';
require_once './model/cargaison.php';

								$tpc = new Tcpfinal($idNavire);
									$result = $tpc->getTpcnitialByID($idNavire);
									foreach ($result as $key => $valeur) {
										$dCorr = $valeur['deplCorrige'];
										
									}
                                    $dpl=new Deplacementfinal($idNavire);
                                    $result=$dpl->getDeplacementitialByID($idNavire);
                                    foreach($result as $key => $valeur){
                                        $deplacementFinal=$valeur['deplacementFinal'];
                                        $fuelOil=$valeur['fuelOil'];
                                        $dieselOil=$valeur['dieselOil'];
                                        $lubrifiantOil=$valeur['lubrifiantOil'];
                                        $freshWater=$valeur['freshWater'];
                                        $ballastWater=$valeur['ballastWater'];
                                        $ls=$valeur['ls'];
                                        $constantesf=$valeur['constantes'];
                                    }
									$const=new Deplacementinitial($idNavire);
									$result=$const->getDeplacementinitialByID($idNavire);
									foreach($result as $key => $valeur){
										$constantes=$valeur['constantes'];
									}
?>

<?php
			$carg = new Cargaison($idNavire);
			$result1 = $carg->getCargaisonlByID($idNavire);
			if(count($result1)==0){
?>
			<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
			<h6 class="mb-0 mt-3 text-uppercase">Etape 5</h6>
	<hr/>

    <h6 class="mb-0 text-uppercase">Information Draft Final</h6>
		<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Calcul de la cargaison</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/cargaison.php">
                                <input type="number" hidden name="idNavire" value="<?=$idNavire?>" class="form-control border-start-0" id="idNavire" placeholder=""/>
								<input type="number" hidden name="deplacementFinal" value="<?=$deplacementFinal?>" class="form-control border-start-0" id="deplacementFinal" placeholder=""/>
                                <input type="number" hidden name="fuelOil" value="<?=$fuelOil?>" class="form-control border-start-0" id="fuelOil" placeholder="" />
                                <input type="number" hidden name="dieselOil" value="<?=$dieselOil?>" class="form-control border-start-0" id="dieselOil" placeholder=""/>
                                <input type="number" hidden name="lubrifiantOil" value="<?=$lubrifiantOil?>" class="form-control border-start-0" id="lubrifiantOil" placeholder=""/>
                                <input type="number" hidden name="freshWater" value="<?=$freshWater?>" class="form-control border-start-0" id="freshWater" placeholder=""/>
                                <input type="number" hidden name="ballastWater" value="<?=$ballastWater?>" class="form-control border-start-0" id="ballastWater" placeholder=""/>
                                <input type="number" hidden name="ls" value="<?=$ls?>" class="form-control border-start-0" id="ls" placeholder="" />
                                <input type="number" hidden  name="constantes" value="<?=$constantes?>" class="form-control border-start-0" id="constantes" placeholder="" />
								<input type="number" hidden  name="constantesf" value="<?=$constantesf?>" class="form-control border-start-0" id="constantesf" placeholder="" />
							<div class="card-body border">
								<div class="row mt-3">
								
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Poids Cargaison</font></font></span>
										<input type="number" required onkeyup="calculpCargaisonMMG();" step="any" name="pcargaison" class="form-control border-start-0" id="pcargaison" placeholder="" />
									</div>
									
                                    
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Poids Cargaison adopté</font></font></span>
										<input type="number" required onkeyup="calculpCargaisonMMG();"  step="any" name="pcargaisonA" class="form-control border-start-0" id="pcargaisonA" placeholder="" />
									</div>
								</div>
                                <div class="col-4"></div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Poids Cargaison MMG</font></font></span>
										<input type="number" readonly step="any" name="pcargaisonMMG" class="form-control border-start-0" id="pcargaisonMMG" placeholder="" />
									</div>
                                    
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Intervalle de confiance</font></font></span>
										<input type="number" readonly step="any" name="intervalleC" class="form-control border-start-0" id="intervalleC" placeholder="" />
									</div>
								</div>
							</div>
							</div>

							
							
							
												
							
								<div >
									<button name="btn_ajout_etape6" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

								</div>
							</form>
						</div>
					</div>

					<script type="text/javascript">
						var pcargaisonMMG=document.getElementById('pcargaisonMMG').value;
						var intervalleC=document.getElementById('intervalleC').value;

						// Fonction calcul MMG et Intervalle de confiance
						function calculpCargaisonMMG(){
							var deplacementFinal=Number(document.getElementById('deplacementFinal').value);
							var fuelOil=Number(document.getElementById('fuelOil').value);
							var dieselOil=Number(document.getElementById('dieselOil').value);
                            var lubrifiantOil=Number(document.getElementById('lubrifiantOil').value);
							var freshWater=Number(document.getElementById('freshWater').value);
                            var ballastWater=Number(document.getElementById('ballastWater').value);
							var ls=Number(document.getElementById('ls').value);
                            var constantes=Number(document.getElementById('constantes').value);
							var constantesf=Number(document.getElementById('constantesf').value);
							var pcargaisonMMG=Math.round(Number(deplacementFinal-(fuelOil+dieselOil+lubrifiantOil+freshWater+ballastWater+ls)-constantes)*1000)/1000;
							document.getElementById('pcargaisonMMG').value=pcargaisonMMG;
						}

						// // Fonction calcul des Constantes
						// function calculConstantes(){
						// 	var fuelOil=Number(document.getElementById('fuelOil').value);
						// 	var dieselOil=Number(document.getElementById('dieselOil').value);
						// 	var lubrifiantOil=Number(document.getElementById('lubrifiantOil').value);
						// 	var freshWater=Number(document.getElementById('freshWater').value);
						// 	var ballastWater=Number(document.getElementById('ballastWater').value);
						// 	var lsLightship=Number(document.getElementById('lsLightship').value);
						// 	var constantes=Number(deplacementInitial-(fuelOil+dieselOil+lubrifiantOil+freshWater+ballastWater)-lsLightship);
						// 	document.getElementById('constantes').value=constantes;
						// }

					</script>
<?php
			}else{
?>
			<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
			<div class="card-body">
								<h6 class="mb-5 text-uppercase">Informations Etape 5</h6>
	
				<?php
				$dpla = new Cargaison($idNavire);
				$result1 = $dpla->getCargaisonlByID($idNavire);
				foreach ($result1 as $result) {
				?>
					<!-- <tr>
						<td><?= $result['poidsCargaison'] ?></td>
						<td><?= $result['poidsCargaisonAdopte'] ?></td>
						<td><?= $result['poidsCargaisonMMG'] ?></td>
						<td><?= $result['intervalleConfiance'] ?></td>
						
						
						
					</tr> -->

					<div class="row mt-3">
								
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Poids Cargaison</font></font></span>
										<input type="number" required step="any" name="pcargaison" class="form-control border-start-0" id="pcargaison" readonly value="<?= $result['poidsCargaison'] ?>" />
									</div>
									
                                    
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Poids Cargaison adopté</font></font></span>
										<input type="number" required   step="any" name="pcargaisonA" class="form-control border-start-0" id="pcargaisonA" readonly value="<?= $result['poidsCargaisonAdopte'] ?>" />
									</div>
								</div>
                                <div class="col-4"></div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Poids Cargaison MMG</font></font></span>
										<input type="number" readonly step="any" name="pcargaisonMMG" class="form-control border-start-0" id="pcargaisonMMG" readonly value="<?= $result['poidsCargaisonMMG'] ?>" />
									</div>
                                    
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Intervalle de confiance</font></font></span>
										<input type="number" readonly step="any" name="intervalleC" class="form-control border-start-0" id="intervalleC" readonly value="<?= $result['intervalleConfiance'] ?>" />
									</div>
								</div>
							</div>
				</div>
				<?php
					}
					?>		
		<!-- </div> -->
	</div>
<?php
}
?>

<script >
	function precedent() {
   window.history.back();
}

// 	function suivant() {
//    window.history.go();
// }
</script>
					

        <?php
    require_once './Composant/footer.php';
?>