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

								$tpc = new Tcpfinal($idNavire);
									$result = $tpc->getTpcnitialByID($idNavire);
									foreach ($result as $key => $valeur) {
										$dCorr = $valeur['deplCorrige'];
										
									}
?>

<?php
		$dpla = new Deplacementfinal($idNavire);
			$result1 = $dpla->getDeplacementitialByID($idNavire);
			if(count($result1)==0){
?>
			<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
			<h6 class="mb-0 mt-3 text-uppercase">Etape 4</h6>
	<hr/>

    <h6 class="mb-0 text-uppercase">Information Draft Final</h6>
		<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Déplacement Final</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/deplacementfinal.php">
                                <input type="number" hidden name="idNavire" value="<?=$idNavire?>" class="form-control border-start-0" id="idNavire" placeholder="" />
								<input type="number" hidden name="dCorr" value="<?=@$dCorr?>" class="form-control border-start-0" id="dCorr" placeholder="" />
							<div class="card-body border">
								<div class="row">
								<h5 class="mb-0 text-primary">Densité eau de mer</h5>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Densité table hydrostatique</font></font></span>
										<input type="number" required step="any" onkeyup="calculDeplamentInitial();" name="densiteTable" class="form-control border-start-0" id="densiteTable" placeholder="" />&nbsp; kg/m3
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Densité mesuré</font></font></span>
										<input type="number" required onkeyup="calculDeplamentInitial();" step="any" name="densiteMesure" class="form-control border-start-0" id="densiteMesure" placeholder="" />&nbsp; kg/m3
									</div>
								</div>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Déplacement Densité</font></font></span>
										<input type="number" readonly step="any" name="deplacementInitial" class="form-control border-start-0" id="deplacementInitial" placeholder="" />&nbsp; t
									</div>
								</div>
							</div>
							</div>
							<h5 class="mb-0 text-primary">Calcul des déductibles et des constantes</h5>
							<div class="card-body border">
								<div class="row">
								
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fuel Oil</font></font></span>
										<input type="number" required step="any" onkeyup="calculConstantes();" name="fuelOil" class="form-control border-start-0" id="fuelOil" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diesel Oil</font></font></span>
										<input type="number" required step="any" onkeyup="calculConstantes();" name="dieselOil" class="form-control border-start-0" id="dieselOil" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lubrifiant Oil</font></font></span>
										<input type="number" required step="any" onkeyup="calculConstantes();" name="lubrifiantOil" class="form-control border-start-0" id="lubrifiantOil" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fresh Water</font></font></span>
										<input type="number" required step="any" onkeyup="calculConstantes();" name="freshWater" class="form-control border-start-0" id="freshWater" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ballast Water</font></font></span>
										<input type="number" required step="any" onkeyup="calculConstantes();" name="ballastWater" class="form-control border-start-0" id="ballastWater" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LS (LightShip)</font></font></span>
										<input type="number" required step="any" onkeyup="calculConstantes();" name="lsLightship" class="form-control border-start-0" id="lsLightship" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">OTHERS</font></font></span>
										<input type="number" required onkeyup="calculConstantes();" step="any" name="others" class="form-control border-start-0" id="others" placeholder="" />
									</div>
								</div>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">K</font></font></span>
										<input type="number" readonly step="any" name="constantes" class="form-control border-start-0" id="constantes" placeholder="" />
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
						var deplacementInitial=document.getElementById('deplacementInitial').value;
						var constantes=document.getElementById('constantes').value;

						// Fonction calcul deplacement initial
						function calculDeplamentInitial(){
							var dCorr=Number(document.getElementById('dCorr').value);
							var densiteTable=Number(document.getElementById('densiteTable').value);
							var densiteMesure=Number(document.getElementById('densiteMesure').value);
							var deplacementInitial=Math.round(Number((dCorr*densiteMesure)/densiteTable)*10000)/10000;
							document.getElementById('deplacementInitial').value=deplacementInitial;
						}

						// Fonction calcul des Constantes
						function calculConstantes(){
							var deplacementInitial=Number(document.getElementById('deplacementInitial').value);
							var fuelOil=Number(document.getElementById('fuelOil').value);
							var dieselOil=Number(document.getElementById('dieselOil').value);
							var lubrifiantOil=Number(document.getElementById('lubrifiantOil').value);
							var freshWater=Number(document.getElementById('freshWater').value);
							var ballastWater=Number(document.getElementById('ballastWater').value);
							var lsLightship=Number(document.getElementById('lsLightship').value);
							var others=Number(document.getElementById('others').value);
							var constantes=Math.round(Number(deplacementInitial-(fuelOil+dieselOil+lubrifiantOil+freshWater+ballastWater+lsLightship+others))*10000)/10000;
							document.getElementById('constantes').value=constantes;
						}

					</script>
<?php
			}else{
?>
			<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
			<div class="card-body">
								<h6 class="mb-5 text-uppercase">Informations Etape 4</h6>
	
				<?php
				$dpla = new Deplacementfinal($idNavire);
				$result1 = $dpla->getDeplacementitialByID($idNavire);
				foreach ($result1 as $result) {
				?>
					
					<div class="row">
								<h5 class="mb-0 text-primary">Densité eau de mer</h5>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Densité table hydrostatique</font></font></span>
										<input type="number" readonly step="any" name="densiteTable" class="form-control border-start-0" id="densiteTable" value="<?= $result['densiteTableHydrostatique'] ?>" />&nbsp; kg/m3
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Densité mesuré</font></font></span>
										<input type="number" readonly step="any" name="densiteMesure" class="form-control border-start-0" id="densiteMesure" value="<?= $result['densitemesure'] ?>" />&nbsp; kg/m3
									</div>
								</div>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Déplacement Densité</font></font></span>
										<input type="number" readonly step="any" name="deplacementInitial" class="form-control border-start-0" id="deplacementInitial" value="<?= $result['deplacementFinal'] ?>" />&nbsp; t
									</div>
								</div>
							</div>

							<div class="row">
								<h5 class="mb-0 text-primary">Calcul des déductibles et des constantes</h5>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fuel Oil</font></font></span>
										<input type="number" readonly step="any" name="fuelOil" class="form-control border-start-0" id="fuelOil" value="<?= $result['fuelOil'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diesel Oil</font></font></span>
										<input type="number" readonly step="any" name="dieselOil" class="form-control border-start-0" id="dieselOil" value="<?= $result['dieselOil'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lubrifiant Oil</font></font></span>
										<input type="number" readonly step="any" name="lubrifiantOil" class="form-control border-start-0" id="lubrifiantOil" value="<?= $result['lubrifiantOil'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fresh Water</font></font></span>
										<input type="number" readonly step="any" name="freshWater" class="form-control border-start-0" id="freshWater" value="<?= $result['freshWater'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ballast Water</font></font></span>
										<input type="number" readonly step="any" name="ballastWater" class="form-control border-start-0" id="ballastWater" value="<?= $result['ballastWater'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LS (LightShip)</font></font></span>
										<input type="number" readonly step="any" name="lsLightship" class="form-control border-start-0" id="lsLightship" value="<?= $result['ls'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">OTHERS</font></font></span>
										<input type="number" readonly step="any" name="others" class="form-control border-start-0" id="others" value="<?= $result['others'] ?>" />
									</div>
								</div>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">K</font></font></span>
										<input type="number" readonly step="any" name="constantes" class="form-control border-start-0" id="constantes" value="<?= $result['constantes'] ?>" />
									</div>
								</div>
							</div>

				<?php
				}
				?>
			<!-- </tbody>
		</table>
	</div> -->
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