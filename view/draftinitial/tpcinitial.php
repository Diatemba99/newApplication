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
									$MAD=(6*@$tM+@$tav+@$tar)/8;
									$t1=$MAD-0.5;
									$t2=$MAD+0.5;
									$cmm = new Cmminitial($idNavire);
									$result = $cmm->getCmmInitialByID($idNavire);
									foreach ($result as $key => $valeur) {
										$dMAD = $valeur['deplacementMad'];
										$firstTrimCorrection = $valeur['firstTrimCorrection'];
										$secondTrimCorrection = $valeur['secondTrimCorrection'];
									}
?>

<?php
			$tpc = new Tcpinitial($idNavire);
			$result1 = $tpc->getTpcnitialByID($idNavire);
			if(count($result1)==0){
?>
<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
<h6 class="mb-0 mt-3 text-uppercase">Etape 5</h6>
	<hr/>

    <h6 class="mb-0 text-uppercase">Information Draft Initial</h6>
		<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Calcul des TPC pour TEMdb</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/tpcinitial.php">
                                <input type="number" hidden  name="idNavire" value="<?=$idNavire?>" class="form-control border-start-0" id="idNavire" placeholder="" />
								<input type="number" hidden  name="tEmbd" value="<?=$tEmbd?>" class="form-control border-start-0" id="tEmbd" placeholder="" />
								<input type="number" hidden  name="tEmtd" value="<?=$tEmtd?>" class="form-control border-start-0" id="tEmtd" placeholder="" />
								<input type="number" hidden  name="dmad" value="<?=@$dMAD?>" class="form-control border-start-0" id="dmad" placeholder="" />
								<input type="number" hidden  name="firstTrimCorrection" value="<?=@$firstTrimCorrection?>" class="form-control border-start-0" id="firstTrimCorrection" placeholder="" />
								<input type="number" hidden  name="secondTrimCorrection" value="<?=@$secondTrimCorrection?>" class="form-control border-start-0" id="secondTrimCorrection" placeholder="" />
							<div class="card-body border">
								<div class="row mt-3">
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
										<input type="number" required step="any" onkeyup="calculeMTC1();" name="x1MTC1" class="form-control border-start-0" id="x1MTC1" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
										<input type="number" required step="any" onkeyup="calculeMTC1();" name="x2MTC1" class="form-control border-start-0" id="x2MTC1" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
										<input type="number" required step="any" onkeyup="calculeMTC1();" name="y1MTC1" class="form-control border-start-0" id="y1MTC1" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
										<input type="number" required step="any" onkeyup="calculeMTC1();" name="y2MTC1" class="form-control border-start-0" id="y2MTC1" placeholder="" />
									</div>
								</div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TPCMbd</font></font></span>
										<input type="number" required readonly  step="any" name="mtc1" class="form-control border-start-0" id="mtc1" placeholder="" />&nbsp; t/cm
									</div>
								</div>
							</div>
							</div>
							<h5 class="mb-0 text-primary">Calcul des TPC pour TEMtd</h5>
							<hr/>
							<div class="card-body border">
								<div class="row">
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
										<input type="number" required step="any" onkeyup="calculeMTC2();" name="x1MTC2" class="form-control border-start-0" id="x1MTC2" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
										<input type="number" required step="any"onkeyup="calculeMTC2();" name="x2MTC2" class="form-control border-start-0" id="x2MTC2" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
										<input type="number" required step="any" onkeyup="calculeMTC2();" name="y1MTC2" class="form-control border-start-0" id="y1MTC2" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
										<input type="number" required step="any" onkeyup="calculeMTC2();" name="y2MTC2" class="form-control border-start-0" id="y2MTC2" placeholder="" />
									</div>
								</div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TPCMtd</font></font></span>
										<input type="number" required readonly step="any" name="mtc2" class="form-control border-start-0" id="mtc2" placeholder="" />&nbsp; t/cm
									</div>
								</div>
							</div>
							</div>
							<h5 class="mb-0 text-primary">Déplacement Corrigé</h5>
							<div class="row">
								<div class="col-8"></div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hell Correction</font></font></span>
										<input type="number" readonly step="any" name="hellCorrection" class="form-control border-start-0" id="hellCorrection" placeholder="" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dépl.Corrigé</font></font></span>
										<input type="number" readonly step="any" name="deplCorrige" class="form-control border-start-0" id="deplCorrige" placeholder="" />
									</div>
								</div>
							</div>
												
							
								<div >
									<button name="btn_ajout_etape5" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

								</div>
							</form>
						</div>
					</div>
					
					
					<script type="text/javascript">
						// var firstTrimCorrection=document.getElementById('firstTrimCorrection').value;
						// var secondTrimCorrection=document.getElementById('secondTrimCorrection').value;
						var TPCMbd=document.getElementById('mtc1').value;
						var TPCMtd=document.getElementById('mtc2').value;
						var HellCorr=document.getElementById('hellCorrection').value;
						var deplCorr=document.getElementById('deplCorrige').value;

						// fonction pour calcul MTC1 TPC
						function calculeMTC1(){
							var TEMbd=Number(document.getElementById('tEmbd').value);
							// var TEMtd=Number(document.getElementById('tEmtd').value);
							var x1MTC1 = Number(document.getElementById('x1MTC1').value);
							var x2MTC1 = Number(document.getElementById('x2MTC1').value);
							var y1MTC1 = Number(document.getElementById('y1MTC1').value);
							var y2MTC1 = Number(document.getElementById('y2MTC1').value);
							var TPCMbd = Math.round(Number((TEMbd-x1MTC1)/(x2MTC1-x1MTC1)*(y2MTC1-y1MTC1)+y1MTC1)*1000)/1000;
							document.getElementById('mtc1').value=TPCMbd;
						}

						// fonction pour calcul MTC2 TPC
						function calculeMTC2(){
							// var TEMbd=Number(document.getElementById('tEmbd').value);
							var TEMtd=Number(document.getElementById('tEmtd').value);
							var x1MTC2 = Number(document.getElementById('x1MTC2').value);
							var x2MTC2 = Number(document.getElementById('x2MTC2').value);
							var y1MTC2 = Number(document.getElementById('y1MTC2').value);
							var y2MTC2 = Number(document.getElementById('y2MTC2').value);
							var TPCMtd = Math.round(Number((TEMtd-x1MTC2)/(x2MTC2-x1MTC2)*(y2MTC2-y1MTC2)+y1MTC2)*1000)/1000;
							document.getElementById('mtc2').value=TPCMtd;

							var TPCMbd=Number(document.getElementById('mtc1').value);
							var TPCMtd=Number(document.getElementById('mtc2').value);
							var TEMbd=Number(document.getElementById('tEmbd').value);
							var HellCorr=Math.round(Number((TEMbd-TEMtd)*(TPCMbd-TPCMtd)*6)*1000)/1000;
							document.getElementById('hellCorrection').value=HellCorr;

							var dplMAD=Number(document.getElementById('dmad').value);
							var firstTrimCorrection=Number(document.getElementById('firstTrimCorrection').value);
							var secondTrimCorrection=Number(document.getElementById('secondTrimCorrection').value);
							// var HellCorr=Number(document.getElementById('hellCorrection').value);
							var deplCorr=Math.round(Number(dplMAD+firstTrimCorrection+secondTrimCorrection+HellCorr)*1000)/1000;
							document.getElementById('deplCorrige').value=deplCorr;

						}

						// fonction deplacement corrige
						// function calculDplCorrige(){
						// 	var dplMAD=Number(document.getElementById('dMAD').value);
						// 	var firstTrimCorrection=Number(document.getElementById('firstTrimCorrection').value);
						// 	var secondTrimCorrection=Number(document.getElementById('secondTrimCorrection').value);
						// 	var HellCorr=Number(document.getElementById('hellCorrection').value);
						// 	var deplCorr=Number(dplMAD+firstTrimCorrection+secondTrimCorrection+HellCorr);
						// 	document.getElementById('deplCorrige').value=deplCorr;
						// }
					</script>
<?php
}else{
?>
<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
<div class="card-body">
								<h6 class="mb-5 text-uppercase">Informations Etape 5</h6>
	<!-- <div class="table-responsive">
		<table id="example2" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>x1</th>
					<th>x2</th>
					<th>y1</th>
					<th>y2</th>
					<th>TPCMbd</th>
					
				</tr>
			</thead>
			<tbody> -->
				<?php
				$cmma = new Tcpinitial($idNavire);
				$result1 = $cmma->getTpcnitialByID($idNavire);
				foreach ($result1 as $result) {
				?>
					<!-- <tr>
						<td><?= $result['x1TPCMbd'] ?></td>
						<td><?= $result['x2TPCMbd'] ?></td>
						<td><?= $result['y1TPCMbd'] ?></td>
						<td><?= $result['y2TPCMbd'] ?></td>
						<td><?= $result['TPCMbd'] ?></td>
						
						
					</tr> -->

					<div class="row mt-3">
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
										<input type="number" readonly step="any" name="x1MTC1" class="form-control border-start-0" id="x1MTC1" value="<?= $result['x1TPCMbd'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
										<input type="number" readonly step="any" name="x2MTC1" class="form-control border-start-0" id="x2MTC1" value="<?= $result['x2TPCMbd'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
										<input type="number" readonly step="any" name="y1MTC1" class="form-control border-start-0" id="y1MTC1" value="<?= $result['y1TPCMbd'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
										<input type="number" readonly step="any" name="y2MTC1" class="form-control border-start-0" id="y2MTC1" value="<?= $result['y2TPCMbd'] ?>" />
									</div>
								</div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TPCMbd</font></font></span>
										<input type="number" readonly readonly  step="any" name="mtc1" class="form-control border-start-0" id="mtc1" value="<?= $result['TPCMbd'] ?>" />
									</div>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x1</font></font></span>
										<input type="number" readonly step="any" name="x1MTC2" class="form-control border-start-0" id="x1MTC2" value="<?= $result['x1TPCMtd'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">x2</font></font></span>
										<input type="number" readonly step="any" name="x2MTC2" class="form-control border-start-0" id="x2MTC2" value="<?= $result['x2TPCMtd'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y1</font></font></span>
										<input type="number" readonly step="any" name="y1MTC2" class="form-control border-start-0" id="y1MTC2" value="<?= $result['y1TPCMtd'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y2</font></font></span>
										<input type="number" readonly step="any" name="y2MTC2" class="form-control border-start-0" id="y2MTC2" value="<?= $result['y2TPCMtd'] ?>" />
									</div>
								</div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TPCMtd</font></font></span>
										<input type="number" readonly readonly step="any" name="mtc2" class="form-control border-start-0" id="mtc2" value="<?= $result['TPCMtd'] ?>" />
									</div>
								</div>
							</div>
							<h5 class="mb-0 text-primary">Déplacement Corrigé</h5>
							<div class="row">
								<div class="col-8"></div>
								<div class="col-4">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hell Correction</font></font></span>
										<input type="number" readonly step="any" name="hellCorrection" class="form-control border-start-0" id="hellCorrection" value="<?= $result['hellCorrection'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dépl.Corrigé</font></font></span>
										<input type="number" readonly step="any" name="deplCorrige" class="form-control border-start-0" id="deplCorrige" value="<?= $result['deplCorrige'] ?>" />
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