<?php
@require_once "authentification.php";
$prenomAgent = $_SESSION["CURRENT_user"]['first_name'];
$nomAgent = $_SESSION["CURRENT_user"]['last_name'];
$idNavire = $_GET['id'];
require_once './Composant/navigation.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmainitial.php';
require_once './model/cmminitial.php';
require_once './model/tpcinitial.php';


$ctma = new Ctmainitial($idNavire);
$result = $ctma->getCtmaInitialByID($idNavire);
foreach ($result as $key => $valeur) {
	$tM = $valeur['tM'];
	$tav = $valeur['tav'];
	$tar = $valeur['tar'];
	$truetrim = $valeur['trueTrim'];
	$tEmbd = $valeur['tEmbd'];
	$tEmtd = $valeur['tEmtb'];
	$L = $valeur['l'];
}
$tpc = new Tcpinitial($idNavire);
$result = $tpc->getTpcnitialByID($idNavire);
foreach ($result as $key => $valeur) {
	$TPCMbd = $valeur['TPCMbd'];
	$TPCMtd = $valeur['TPCMtd'];
	$dplCorrige = $valeur['deplCorrige'];
}
$MAD = (6 * @$tM + @$tav + @$tar) / 8;
$t1 = $MAD - 0.5;
$t2 = $MAD + 0.5;
?>

<?php
$cmma = new Cmminitial($idNavire);
$result1 = $cmma->getCmmInitialByID($idNavire);
if (count($result1) == 0) {
?>
	<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
	<h6 class="mb-0 mt-3 text-uppercase">Etape 4</h6>
	<hr />

	<h6 class="mb-0 text-uppercase">Information Draft Initial</h6>
	<div class="card border-top border-0 border-4 border-primary">
		<div class="card-body p-5">
			<div class="card-title d-flex align-items-center">
				<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
				</div>
				<h5 class="mb-0 text-primary">Calcul de la moyenne des moyennes ou MAD</h5>
			</div>
			<hr>
			<form class="row g-3" method="POST" action="./controller/cmminitial.php">
				<input type="number" hidden name="idNavire" value="<?= $idNavire ?>" class="form-control border-start-0" id="idNavire" placeholder="" />
				<input type="number" hidden name="truetrim" value="<?= $truetrim ?>" class="form-control border-start-0" id="truetrim" placeholder="" />
				<input type="number" hidden name="l" value="<?= $L ?>" class="form-control border-start-0" id="l" placeholder="" />
				
				<div class="card-body border">
					<div class="row">
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
							<input type="number" onkeyup="calculerdeplacementMAD();" step="any" name="x1" class="form-control border-start-0" id="x1" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
							<input type="number" onkeyup="calculerdeplacementMAD();" step="any" name="x2" class="form-control border-start-0" id="x2" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MAD</font></font></span>
							<input type="number" readonly step="any" name="mad" value="<?= $MAD ?>" class="form-control border-start-0" id="mad" placeholder="" />
						</div>
					</div>
				</div>
				</div>

				<div class="row mt-3">
					<h5 class="mb-0 text-primary">Calcul déplacement correspondant à Keel=0</h5>
					<div class="card-body border mt-3">
						<div class="row">
							<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" onkeyup="calculerdeplacementMAD();" step="any" name="y1" class="form-control border-start-0" id="y1" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" onkeyup="calculerdeplacementMAD();" step="any" name="y2" class="form-control border-start-0" id="y2" placeholder="" />
						</div>
					</div>
					<!-- <div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Déplacement MAD</font></font></span>
							<input type="number" readonly step="any" name="deplacementMad" class="form-control border-start-0" id="deplacementMad" placeholder="" />
						</div>
					</div> -->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Déplacement MAD</font></font></span>
							<input type="number" readonly step="any" name="deplacementMad" class="form-control border-start-0" id="deplacementMad" placeholder="" />&nbsp; m
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<h5 class="mb-0 text-primary">Calcul déplacement correspondant à Keel≠0</h5>
					<div class="card-body border mt-3">
						<div class="row">
							<div class="col-md-3">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" onkeyup="calculerdeplacementMADkeel();" step="any" name="y1keel" class="form-control border-start-0" id="y1keel" placeholder="" />
						</div>
					</div>
					<div class="col-md-3">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" onkeyup="calculerdeplacementMADkeel();" step="any" name="y2keel" class="form-control border-start-0" id="y2keel" placeholder="" />
						</div>
					</div>
					<div class="col-md-2">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keel</font></font></span>
							<input type="number" step="any" name="keel" class="form-control border-start-0" id="keel" placeholder="" />
						</div>
						
					</div>
					<div class="col-md-2">
						<div class="form-check mt-4">
							<input class="form-check-input" onclick="calculerMADkeel();" type="radio" name="keeldif" id="keeldif" value="">
							<label class="form-check-label" for="lcf1">Keel ≠ 0</label>
						</div>
					</div>
					<!-- <div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Déplacement MAD</font></font></span>
							<input type="number" readonly step="any" name="deplacementMad" class="form-control border-start-0" id="deplacementMadkeel" placeholder="" />
						</div>
					</div> -->
						</div>
					</div>
				</div>
				
				<div class="row mt-4">
					<h5 class="mb-0 text-primary">Calcul du LCF</h5>
					<div class="card-body border mt-3">
						<div class="row">
							<div class="col-md-3">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" step="any" onkeyup="calculeLCF();" name="y1LCF" class="form-control border-start-0" id="y1LCF" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" step="any" onkeyup="calculeLCF();" name="y2LCF" class="form-control border-start-0" id="y2LCF" placeholder="" />
						</div>
					</div>
					<!-- <div class="col-4 mt-2">
						<div>
							<div class="form-check">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftoap" value="LCF to AP">
								<label class="form-check-label" for="lcf1">LCF to AP</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftofp" value="LCF to FP">
								<label class="form-check-label" for="lcf2">LCF to FP</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftomidship" value="LCF to midship">
								<label class="form-check-label" for="lcf3">LCF to midship</label>
							</div>
						</div>
						
										
					</div> -->
					<div class="col-md-5">
						<div>
											
											<div class="form-check">
												<input class="form-check-input" onclick="calculeLCF();calculerCorrection();" type="radio" name="lcfto" id="lcftomidship" value="LCF to FP">
												<label class="form-check-label" for="lcf1">LCF to Midship</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" onclick="calculeLCF();calculerCorrection();" type="radio" name="lcfto" id="lcffrommidship" value="LCF to AP">
												<label class="form-check-label" for="lcf2">LCF from Midship</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" onclick="calculeLCF();calculerCorrection();" type="radio" name="lcfto" id="lcffromap" value="LCF to midship">
												<label class="form-check-label" for="lcf3">LCF from AP et LCF < LBP/2</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" onclick="calculeLCF();calculerCorrection();" type="radio" name="lcfto" id="lcftoap" value="LCF to midship">
												<label class="form-check-label" for="lcf4">LCF from AP et LCF > LBP/2</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" onclick="calculeLCF();calculerCorrection();" type="radio" name="lcfto" id="lcffromfp" value="LCF to midship">
												<label class="form-check-label" for="lcf5">LCF from FP et LCF < LBP/2</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" onclick="calculeLCF();calculerCorrection();" type="radio" name="lcfto" id="lcftofp" value="LCF to midship">
												<label class="form-check-label" for="lcf6">LCF from FP et LCF > LBP/2</label>
											</div>
										</div>
					</div>

					<div class="col-md-2">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LCF</font></font></span>
							<input type="number" readonly step="any" name="lcfto" class="form-control border-start-0" id="lcfto" placeholder="" />
						</div>
					</div>
					<div class="row">
						<h5 class="mb-0 text-primary">Cas où LCA est données</h5>
						<div class="col-md-3">
							<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LCA 1</font></font></span>
							<input type="number" step="any" onkeyup="calculey1();" name="lca1" class="form-control border-start-0" id="lca1" placeholder="" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LCA 2</font></font></span>
							<input type="number" step="any" onkeyup="calculey2();" name="lca2" class="form-control border-start-0" id="lca2" placeholder="" />
							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul du TPC pour MAD</h5>
				<div class="card-body border">
					<div class="row">
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" required onkeyup="calculeTPCMAD();calculefirsttrimcorr();" step="any" name="y1tpcmad" class="form-control border-start-0" id="y1tpcmad" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" required onkeyup="calculeTPCMAD();calculefirsttrimcorr();" step="any" name="y2tpcmad" class="form-control border-start-0" id="y2tpcmad" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TPC</font></font></span>
							<input type="number" readonly step="any" name="tpcmad" class="form-control border-start-0" id="tpcmad" placeholder="" />&nbsp; m
						</div>
					</div>
				</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul First Trim Correction</h5>
				<div class="card-body border">
					<div class="row">
					<div class="col-md-8">

					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">First Trim Correction</font></font></span>
							<input type="number" readonly step="any" name="firstTrimCorrection" class="form-control border-start-0" id="firstTrimCorrection" placeholder="" />&nbsp; m
						</div>
					</div>
				</div>
				</div>
				<div class="row">
					<h5 class="mb-0 text-primary">Calcul des MAD + 0,5 et MAD - 0,5</h5>
					<div class="card-body border mt-3">
						<div class="row">
							<div class="col-md-4">

					</div>
					<div class="col-md-4">

					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">t1</font></font></span>
							<input type="number" readonly step="any" value="<?= $t1 ?>" name="t1" class="form-control border-start-0" id="t1" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">t2</font></font></span>
							<input type="number" readonly step="any" value="<?= $t2 ?>" name="t2" class="form-control border-start-0" id="t2" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">

					</div>
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul Second Trim Correction</h5>

				<div class="card-body border">
					<div class="row">
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
							<input type="number" required step="any" onkeyup="calculeMTC1();" name="x1secondtrim" class="form-control border-start-0" id="x1secondtrim" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
							<input type="number" required step="any" onkeyup="calculeMTC1();" name="x2secondtrim" class="form-control border-start-0" id="x2secondtrim" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" required step="any" onkeyup="calculeMTC1();" name="y1secondtrim" class="form-control border-start-0" id="y1secondtrim" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" step="any" onkeyup="calculeMTC1();" name="y2secondtrim" class="form-control border-start-0" id="y2secondtrim" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MTC1</font></font></span>
							<input type="number" required readonly step="any" name="mtc1" class="form-control border-start-0" id="mtc1" placeholder="" />&nbsp; tm/cm
						</div>
					</div>
				</div>
				</div>

				<div class="card-body border">
					<div class="row">
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
							<input type="number" required step="any" onkeyup="calculeMTC2();" name="x1secondtrim2" class="form-control border-start-0" id="x1secondtrim2" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
							<input type="number" required step="any" onkeyup="calculeMTC2();" name="x2secondtrim2" class="form-control border-start-0" id="x2secondtrim2" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" required step="any" onkeyup="calculeMTC2();" name="y1secondtrim2" class="form-control border-start-0" id="y1secondtrim2" placeholder="" />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" required step="any" onkeyup="calculeMTC2();" name="y2secondtrim2" class="form-control border-start-0" id="y2secondtrim2" placeholder="" />
						</div>
					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
						<div class="input-group ">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MTC2</font></font></span>
							<input type="number" required readonly step="any" name="mtc2" class="form-control border-start-0" id="mtc2" placeholder="" />&nbsp; tm/cm
						</div>

					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-md-8">

					</div>
					<div class="col-md-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Second Trim Correction</font></font></span>
							<input type="number" readonly step="any" name="secondTrimCorrection" class="form-control border-start-0" id="secondTrimCorrection" placeholder="" />&nbsp; m
						</div>
					</div>
				</div>

				<div>
					<button name="btn_ajout_etape4" type="submit" class="btn btn-primary px-5">Valider</button>
					<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

				</div>
			</form>



		</div>
	</div>

	<script type="text/javascript">
		var L = document.getElementById('l').value;
		var deplacementMAD = document.getElementById('deplacementMad');
		var deplacementMADkeel = document.getElementById('deplacementMadkeel');
		var LCF = document.getElementById('lcfto');
		var TPCMAD = document.getElementById('tpcmad');
		var FirstTrimCorr = document.getElementById('firstTrimCorrection');
		var MTC1 = document.getElementById('mtc1');
		var MTC2 = document.getElementById('mtc2');
		var secondTrimCorr = document.getElementById('secondTrimCorrection');
		var y1keel = document.getElementById('y1keel');
		var y2keel = document.getElementById('y2keel');
		var keel = document.getElementById('keel');

		// Fonction pour calculer déplacement MAD
		function calculerdeplacementMAD() {
			var MAD = Number(document.getElementById('mad').value);
			var x1 = Number(document.getElementById('x1').value);
			var x2 = Number(document.getElementById('x2').value);
			var y1 = Number(document.getElementById('y1').value);
			var y2 = Number(document.getElementById('y2').value);
			var y1keel = Number(document.getElementById('y1keel').value);
			var y2keel = Number(document.getElementById('y2keel').value);
			var deplacementMAD = Math.round(Number((MAD - x1) / (x2 - x1) * (y2 - y1) + y1)*100)/100;
			document.getElementById('deplacementMad').value = deplacementMAD;
		};
		// Fonction pour calculer déplacement MAD Keel
		function calculerdeplacementMADkeel() {
			var MAD = Number(document.getElementById('mad').value);
			var x1 = Number(document.getElementById('x1').value);
			var x2 = Number(document.getElementById('x2').value);
			var y1keel = Number(document.getElementById('y1keel').value);
			var y2keel = Number(document.getElementById('y2keel').value);
			var keel = Number(document.getElementById('keel').value);
			var deplacementMAD = Math.round(Number(((MAD-keel) - x1) / (x2 - x1) * (y2keel - y1keel) + y1keel)*100)/100;
			document.getElementById('deplacementMad').value = deplacementMAD;
		};
		// Fonction pour calculer MAD si keel différent de 0
		function calculerMADkeel() {
			var mMAD = Number(document.getElementById('mad').value);
			var mt1 = Number(document.getElementById('t1').value);
			var mt2 = Number(document.getElementById('t2').value);
			var keel = Number(document.getElementById('keel').value);
			var mMAD = Math.round((Number(mMAD-keel))*1000000000000)/1000000000000;
			document.getElementById('mad').value = mMAD;
			var mt1 = Math.round((Number(mt1-keel))*1000000000000)/1000000000000;
			var mt2 = Math.round((Number(mt2-keel))*1000000000000)/1000000000000;
			document.getElementById('t1').value = mt1;
			document.getElementById('t2').value = mt2;
			//Math.round(Number((L / 2) - lca1)*1000)/1000;
		};
		// Fonction pour calcule LCF
		function calculeLCF() {
			var MAD = Number(document.getElementById('mad').value);
			var x1 = Number(document.getElementById('x1').value);
			var x2 = Number(document.getElementById('x2').value);
			var y1 = Number(document.getElementById('y1').value);
			var y1LCF = Number(document.getElementById('y1LCF').value);
			var y2LCF = Number(document.getElementById('y2LCF').value);
			var L = Number(document.getElementById('l').value);
			// if (document.getElementById('lcftoap').checked) {
			// 	var LCF = Math.round(Number((L / 2) - (MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1)*1000)/1000;
			// 	document.getElementById('lcfto').value = LCF;
			// } else if (document.getElementById('lcftofp').checked) {
			// 	var LCF = Math.round(Number(((MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1) - L / 2)*1000)/1000;
			// 	document.getElementById('lcfto').value = LCF;
			// } else if (document.getElementById('lcftomidship').checked) {
			// 	var LCF = (Math.round(((MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1) - L / 2)*1000)/1000;
			// 	document.getElementById('lcfto').value = LCF;
			// }
			// var LCFA = Math.round(Number((MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1)*1000)/1000;
			var LCFA = Math.round(Number((MAD - x1) / (x2 - x1) * (y2LCF - y1LCF) + y1LCF)*1000)/1000;
				// document.getElementById('lcfto').value = LCFA;
			if (document.getElementById('lcffrommidship').checked) {
				// var LCF = Math.round(Number((L / 2) + LCF)*1000)/1000;
				var LCF = LCFA;
				document.getElementById('lcfto').value = LCF;
			} else if (document.getElementById('lcftomidship').checked) {
				// var LCF = Math.round(Number((L / 2) - LCF)*1000)/1000;
				var LCF = -LCFA;
				document.getElementById('lcfto').value = LCF;
			} else if (document.getElementById('lcffromap').checked) {
				// var LCF = Math.round(Number((L / 2) + LCF)*1000)/1000;
				var LCF = Math.round(Number((L / 2) - LCFA)*1000)/1000;
				document.getElementById('lcfto').value = LCF;
			} else if (document.getElementById('lcftoap').checked) {
				// var LCF = Math.round(Number((L / 2) - LCF)*1000)/1000;
				var LCF = Math.round(Number(LCFA-(L / 2))*1000)/1000;
				document.getElementById('lcfto').value = LCF;
			} else if (document.getElementById('lcffromfp').checked) {
				// var LCF = Math.round(Number((L / 2) - LCF)*1000)/1000;
				var LCF = Math.round(Number(LCFA-(L / 2))*1000)/1000;
				document.getElementById('lcfto').value = LCF;
			} else if (document.getElementById('lcftofp').checked) {
				// var LCF = Math.round(Number((L / 2) + LCF)*1000)/1000;
				var LCF = Math.round(Number((L / 2) - LCFA)*1000)/1000;
				document.getElementById('lcfto').value = LCF;
			}
		}
		//Fonction pour calculer Y1
		function calculey1(){
			var L = Number(document.getElementById('l').value);
			var lca1 = Number(document.getElementById('lca1').value);
			var y1LCF = Math.round(Number((L / 2) - lca1)*1000)/1000;
			document.getElementById('y1LCF').value = y1LCF;
		}
		//Fonction pour calculer Y2
		function calculey2(){
			var L = Number(document.getElementById('l').value);
			var lca2 = Number(document.getElementById('lca2').value);
			var y1LCF = Math.round(Number((L / 2) - lca2)*1000)/1000;
			document.getElementById('y2LCF').value = y1LCF;
		}
		// Fonction pour calcule du TPC pour MAD
		function calculeTPCMAD() {
			var MAD = Number(document.getElementById('mad').value);
			var x1 = Number(document.getElementById('x1').value);
			var x2 = Number(document.getElementById('x2').value);
			var y1tpcmad = Number(document.getElementById('y1tpcmad').value);
			var y2tpcmad = Number(document.getElementById('y2tpcmad').value);
			var y1 = Number(document.getElementById('y1').value);
			var TPCMAD = Math.round(Number(((MAD - x1) / (x2 - x1)) * (y2tpcmad - y1tpcmad) + y1tpcmad)*100)/100;
			document.getElementById('tpcmad').value = TPCMAD;
		}
		// Fonction pour calcule First Trim Correction
		function calculefirsttrimcorr() {
			var LCF = Number(document.getElementById('lcfto').value);
			var TPCMAD = Number(document.getElementById('tpcmad').value);
			var truetrim = Number(document.getElementById('truetrim').value);
			var L = Number(document.getElementById('l').value);
			var TPCMAD = Number(document.getElementById('tpcmad').value);
			var FirstTrimCorr = Math.round(Number((LCF * TPCMAD * truetrim * 100) / L)*100)/100;
			document.getElementById('firstTrimCorrection').value = FirstTrimCorr;
		}
		// Fonction calcule MTC1
		function calculeMTC1() {
			var x1Mtc1 = Number(document.getElementById('x1secondtrim').value);
			var x2Mtc1 = Number(document.getElementById('x2secondtrim').value);
			var y1Mtc1 = Number(document.getElementById('y1secondtrim').value);
			var y2Mtc1 = Number(document.getElementById('y2secondtrim').value);
			var y1 = Number(document.getElementById('y1').value);
			var t1 = Number(document.getElementById('t1').value);
			var t2 = Number(document.getElementById('t2').value);
			var MTC1 = Math.round(Number(((t1 - x1Mtc1) / (x2Mtc1 - x1Mtc1)) * (y2Mtc1 - y1Mtc1) + y1Mtc1)*100)/100;
			document.getElementById('mtc1').value = MTC1;
		}
		// Fonction calcule MTC2
		function calculeMTC2() {
			var x1Mtc2 = Number(document.getElementById('x1secondtrim2').value);
			var x2Mtc2 = Number(document.getElementById('x2secondtrim2').value);
			var y1Mtc2 = Number(document.getElementById('y1secondtrim2').value);
			var y2Mtc2 = Number(document.getElementById('y2secondtrim2').value);
			var y1 = Number(document.getElementById('y1').value);
			var t1 = Number(document.getElementById('t1').value);
			var t2 = Number(document.getElementById('t2').value);
			var MTC2 = Math.round((((t2 - x1Mtc2) / (x2Mtc2 - x1Mtc2)) * (y2Mtc2 - y1Mtc2) + y1Mtc2)*100)/100;
			document.getElementById('mtc2').value = MTC2;

			var truetrim = Number(document.getElementById('truetrim').value);
			var L = Number(document.getElementById('l').value);
			var MTC1 = Number(document.getElementById('mtc1').value);
			var secondTrimCorr = Math.round(Number(((truetrim * truetrim) * (MTC2 - MTC1) * 50) / L)*100)/100;
			document.getElementById('secondTrimCorrection').value = secondTrimCorr;
		}
	</script>
<?php
} else {
?>
	<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
	<div class="card-body">
		<h6 class="mb-5 text-uppercase">Informations Etape 4</h6>
		<!-- <div class="table-responsive"> -->
			<!-- <table id="example2" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>x1Mmoyenne</th>
						<th>x2Mmoyenne</th>
						<th>MAD</th>
						<th>y1Deplacement</th>
						<th>y2Deplacement</th>
						<th>Déplacement MAD</th>
					</tr>
				</thead>
				<tbody> -->
					<?php
					$cmma = new Cmminitial($idNavire);
					$result1 = $cmma->getCmmInitialByID($idNavire);
					foreach ($result1 as $result) {
					?>
						<!-- <tr>
							<td><?= $result['x1Mmoyenne'] ?></td>
							<td><?= $result['x2Mmoyenne'] ?></td>
							<td><?= $result['mad'] ?></td>
							<td><?= $result['y1Deplacement'] ?></td>
							<td><?= $result['y2Deplacement'] ?></td>
							<td><?= $result['deplacementMad'] ?></td>

						</tr>
					<?php
					// }
					?>
				</tbody>
			</table> -->
			<div class="row">
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
							<input type="number" readonly step="any" name="x1" class="form-control border-start-0" id="x1" value="<?= $result['x1Mmoyenne'] ?>" />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
							<input type="number" readonly step="any" name="x2" class="form-control border-start-0" id="x2" value=<?= $result['x2Mmoyenne'] ?> />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MAD</font></font></span>
							<input type="number" readonly step="any" name="mad" class="form-control border-start-0" id="mad" value=<?= $result['mad'] ?> />
						</div>
					</div>
				</div>
				<div class="row">
					<h5 class="mb-0 text-primary">Calcul déplacement correspndant à D=0</h5>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" readonly step="any" name="y1" class="form-control border-start-0" id="y1" value=<?= $result['y1Deplacement'] ?> />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" readonly step="any" name="y2" class="form-control border-start-0" id="y2" value=<?= $result['y2Deplacement'] ?> />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Déplacement MAD</font></font></span>
							<input type="number" readonly step="any" name="deplacementMad" class="form-control border-start-0" id="deplacementMad" value=<?= $result['deplacementMad'] ?> />
						</div>
					</div>
				</div>
				<div class="row">
					<h5 class="mb-0 text-primary">Calcul des MAD + 0,5 et MAD - 0,5</h5>
					<div class="col-4">

					</div>
					<div class="col-4">

					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">t1</font></font></span>
							<input type="number" readonly step="any"  name="t1" class="form-control border-start-0" id="t1" value=<?= $result['t1'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">t2</font></font></span>
							<input type="number" readonly step="any"  name="t2" class="form-control border-start-0" id="t2" value=<?= $result['t2'] ?> />
						</div>
					</div>
					<div class="col-4">

					</div>
				</div>
				<div class="row">
					<h5 class="mb-0 text-primary">Calcul du LCF</h5>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" readonly step="any" name="y1LCF" class="form-control border-start-0" id="y1LCF" value=<?= $result['y1LCF'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" readonly step="any" name="y2LCF" class="form-control border-start-0" id="y2LCF" value=<?= $result['y2LCF'] ?> />
						</div>
					</div>
					<!-- <div class="col-4 mt-3">
						<div>
							<div class="form-check">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftoap" value="LCF to AP">
								<label class="form-check-label" for="lcf1">LCF to AP</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftofp" value="LCF to FP">
								<label class="form-check-label" for="lcf2">LCF to FP</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" onclick="calculeLCF();" type="radio" name="lcf" id="lcftomidship" value="LCF to midship">
								<label class="form-check-label" for="lcf3">LCF to midship</label>
							</div>
						</div>
						
					</div> -->
						<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $result['choixFinal'] ?></font></font></span>
							<!-- <input type="number" readonly step="any" name="lcfto" class="form-control border-start-0" id="choix" value=<?= $result['choixFinal'] ?> /> -->
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LCF to</font></font></span>
							<input type="number" readonly step="any" name="lcfto" class="form-control border-start-0" id="lcfto" value=<?= $result['lcf'] ?> />
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul du TPC pour MAD</h5>
				<div class="row">
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" readonly step="any" name="y1tpcmad" class="form-control border-start-0" id="y1tpcmad" value=<?= $result['y1TPCmad'] ?> />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" readonly step="any" name="y2tpcmad" class="form-control border-start-0" id="y2tpcmad" value=<?= $result['y2TPCmad'] ?> />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TPC</font></font></span>
							<input type="number" readonly step="any" name="tpcmad" class="form-control border-start-0" id="tpcmad" value=<?= $result['TPC'] ?> />
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul First Trim Correction</h5>
				<div class="row">
					<div class="col-8">

					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">First Trim Correction</font></font></span>
							<input type="number" readonly step="any" name="firstTrimCorrection" class="form-control border-start-0" id="firstTrimCorrection" value=<?= $result['firstTrimCorrection'] ?> />
						</div>
					</div>
				</div>
				<h5 class="mb-0 text-primary">Calcul Second Trim Correction</h5>

				<div class="row">
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
							<input type="number" readonly step="any" name="x1secondtrim" class="form-control border-start-0" id="x1secondtrim" value=<?= $result['x1MCTC1'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
							<input type="number" readonly step="any" name="x2secondtrim" class="form-control border-start-0" id="x2secondtrim" value=<?= $result['x2MCTC1'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" readonly step="any" name="y1secondtrim" class="form-control border-start-0" id="y1secondtrim" value=<?= $result['y1MCTC1'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" step="any" readonly name="y2secondtrim" class="form-control border-start-0" id="y2secondtrim" value=<?= $result['y2MCTC1'] ?> />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MTC1</font></font></span>
							<input type="number" readonly step="any" name="mtc1" class="form-control border-start-0" id="mtc1" value=<?= $result['MCTC1'] ?> />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
							<input type="number" readonly step="any" name="x1secondtrim2" class="form-control border-start-0" id="x1secondtrim2" value=<?= $result['x1MCTC2'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
							<input type="number" readonly step="any" name="x2secondtrim2" class="form-control border-start-0" id="x2secondtrim2" value=<?= $result['x2MCTC2'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
							<input type="number" readonly step="any" name="y1secondtrim2" class="form-control border-start-0" id="y1secondtrim2" value=<?= $result['y1MCTC2'] ?> />
						</div>
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
							<input type="number" readonly step="any" name="y2secondtrim2" class="form-control border-start-0" id="y2secondtrim2" value=<?= $result['y2MCTC2'] ?> />
						</div>
					</div>
					<div class="col-4">
						
						<div class="input-group mt-3">
						<div class="input-group ">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MTC2</font></font></span>
							<input type="number"  readonly step="any" name="mtc2" class="form-control border-start-0" id="mtc2" value=<?= $result['MCTC2'] ?> />
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-6">

					</div>
					<div class="col-6">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Second Trim Correction</font></font></span>
							<input type="number" readonly step="any" name="secondTrimCorrection" class="form-control border-start-0" id="secondTrimCorrection" value=<?= $result['secondTrimCorrection'] ?> />
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