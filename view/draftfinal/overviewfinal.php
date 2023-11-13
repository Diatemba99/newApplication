<?php
@require_once "authentification.php";
$prenomAgent = $_SESSION["CURRENT_user"]['first_name'];
$nomAgent = $_SESSION["CURRENT_user"]['last_name'];
$idNavire = $_GET['id'];
require_once './Composant/navigation.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmafinal.php';
require_once './model/cmmfinal.php';
require_once './model/tpcfinal.php';
require_once './model/deplacementfinal.php';
require_once './model/cargaison.php';
?>
<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Précédent</font></font></button>
	<h3 class="mb-0 mt-3 text-uppercase text-center">Apperçu Draft Final</h3>
	<hr />
    <h6 class="mb-0 mt-3 text-uppercase text-center">Etape 1</h6>

                <div class="card-body">
								
	
				<?php
				$cmma = new Ctmafinal($idNavire);
				$result1 = $cmma->getCtmaInitialByID($idNavire);
				foreach ($result1 as $result) {
				?>
					

					<div class="row">
								<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEavbd</font></font></span>
										<input type="number" readonly step="any" name="teavbd" value="<?= $result['tEavbd'] ?>" class="form-control border-start-0" id="teavbd" placeholder="TEavbd" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEavtb</font></font></span>
										<input type="number" readonly  step="any" name="teavtb" value="<?= $result['tEavtb'] ?>" class="form-control border-start-0" id="teavtb" placeholder="TEavtb" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEav</font></font></span>
										<input type="number" readonly step="any" name="teav" value="<?= $result['tEav'] ?>" class="form-control border-start-0" id="teav" placeholder="" />
									</div>
							</div>
							</div>
							<div class="row">
								<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEarbd</font></font></span>
										<input type="number" readonly step="any" name="tearbd" value="<?= $result['tEarbd'] ?>" class="form-control border-start-0" id="tearbd" placeholder="TEarbd" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEartb</font></font></span>
										<input type="number" readonly  step="any" name="teartb" value="<?= $result['tEartb'] ?>" class="form-control border-start-0" id="teartb" placeholder="TEartb" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEar</font></font></span>
										<input type="number" readonly step="any" name="tear" value="<?= $result['tEar'] ?>" class="form-control border-start-0" id="tear" placeholder="" />
									</div>
							</div>
							</div>
							<div class="row mt-3">
								<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEMbd</font></font></span>
										<input type="number" readonly step="any" name="tembd" value="<?= $result['tEmbd'] ?>" class="form-control border-start-0" id="tembd" placeholder="TEMbd" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEMtb</font></font></span>
										<input type="number" readonly  step="any" name="temtb" value="<?= $result['tEmtb'] ?>" class="form-control border-start-0" id="temtb" placeholder="TEMtb" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEM</font></font></span>
										<input type="number" readonly step="any" name="tem" value="<?= $result['tEm'] ?>" class="form-control border-start-0" id="tem" placeholder="" />
									</div>
							</div>
							</div>
							<h5 class="mb-0 text-primary mt-3">Calcul de l'Assiette Apparente ou (Apparent Trim)</h5>
							<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apparent Trim</font></font></span>
										<input type="number" readonly step="any" name="apparentTrim" value="<?= $result['apparentTrim'] ?>" class="form-control border-start-0" id="apparentTrim" placeholder="" />
									</div>
							</div>
							<h5 class="mb-0 text-primary mt-3">Calcul de la distance entre les marques avant et arriéres</h5>
							<div class="row">
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">L</font></font></span>
										<input type="number" readonly step="any" name="L" value="<?= $result['l'] ?>" class="form-control border-start-0" id="L" placeholder="" />
									</div>
								</div>

								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l1</font></font></span>
										<input type="number" readonly step="any" name="l1" value="<?= $result['l1'] ?>" class="form-control border-start-0" id="l1" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l2</font></font></span>
										<input type="number" readonly step="any" name="l2" value="<?= $result['l2'] ?>" class="form-control border-start-0" id="l2" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l3</font></font></span>
										<input type="number" readonly step="any"  name="l3" value="<?= $result['l3'] ?>" class="form-control border-start-0" id="l3" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l</font></font></span>
										<input type="number" step="any" readonly name="lL" value="<?= $result['lL'] ?>" class="form-control border-start-0" id="lL" placeholder="" />
									</div>
								</div>
							</div>

							<h5 class="mb-0 text-primary">Correction à apporter aux tirants apparents</h5>
							<div class="row">
								<div class="col-6">
									
								</div>

								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Corr.avant</font></font></span>
										<input type="number" readonly step="any" name="corrAv" value="<?= $result['corrAvant'] ?>" class="form-control border-start-0" id="corrAv" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Corr.arr</font></font></span>
										<input type="number" readonly step="any" name="corrAr" value="<?= $result['corrArr'] ?>" class="form-control border-start-0" id="corrAr" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Corr.mil</font></font></span>
										<input type="number" readonly step="any" name="corrM" value="<?= $result['corrMil'] ?>" class="form-control border-start-0" id="corrM" placeholder="" />
									</div>
								</div>
							</div>

							<h5 class="mb-0 text-primary">Correction des Tirants réels</h5>
							<div class="row">
								<div class="col-6">
									
								</div>

								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tav</font></font></span>
										<input type="number" readonly step="any" name="tAv" value="<?= $result['tav'] ?>" class="form-control border-start-0" id="tAv" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tar</font></font></span>
										<input type="number" readonly step="any" name="tAr" value="<?= $result['tar'] ?>" class="form-control border-start-0" id="tAr" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TM</font></font></span>
										<input type="number" readonly step="any" name="tM" value="<?= $result['tM'] ?>" class="form-control border-start-0" id="tM" placeholder="" />
									</div>
								</div>
							</div>

							<h5 class="mb-0 text-primary">Calcul de l'Assiette réelle ou True Trim</h5>
							<div class="row">
								<div class="col-6">
									
								</div>

								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True Trim</font></font></span>
										<input type="number" readonly step="any" name="trueTrim" value="<?= $result['trueTrim'] ?>" class="form-control border-start-0" id="trueTrim" placeholder="" />
									</div>
								</div>
							</div>
							<?php
						}
				?>
	</div>
</div>

    <hr />
    <h6 class="mb-0 mt-3 text-uppercase text-center">Etape 2</h6>

                <div class="card-body">
								
				<?php
				$cmma = new Cmmfinal($idNavire);
				$result1 = $cmma->getCmmInitialByID($idNavire);
				foreach ($result1 as $result) {
				?>
					
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
					
						<div class="col-4">
						
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $result['choixFinal'] ?></font></font></span>
							
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
		
	</div>

    <hr />
    <h6 class="mb-0 mt-3 text-uppercase text-center">Etape 3</h6>

                <div class="card-body">
								<h6 class="mb-5 text-uppercase">Informations Etape 4</h6>
	
				<?php
				$cmma = new Tcpfinal($idNavire);
				$result1 = $cmma->getTpcnitialByID($idNavire);
				foreach ($result1 as $result) {
				?>
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
			
</div>

    <hr />
    <h6 class="mb-0 mt-3 text-uppercase text-center">Etape 4</h6>

                       <div class="card-body">
								
	
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
										<input type="number" readonly step="any" name="densiteTable" class="form-control border-start-0" id="densiteTable" value="<?= $result['densiteTableHydrostatique'] ?>" />
									</div>
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Densité mesuré</font></font></span>
										<input type="number" readonly step="any" name="densiteMesure" class="form-control border-start-0" id="densiteMesure" value="<?= $result['densitemesure'] ?>" />
									</div>
								</div>
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Déplacement Final</font></font></span>
										<input type="number" readonly step="any" name="deplacementInitial" class="form-control border-start-0" id="deplacementInitial" value="<?= $result['deplacementFinal'] ?>" />
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
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Constantes</font></font></span>
										<input type="number" readonly step="any" name="constantes" class="form-control border-start-0" id="constantes" value="<?= $result['constantes'] ?>" />
									</div>
								</div>
							</div>

				<?php
				}
				?>
		
</div>

    <hr />
    <h6 class="mb-0 mt-3 text-uppercase text-center">Etape 5</h6>

                    <div class="card-body">
								
	
				<?php
				$dpla = new Cargaison($idNavire);
				$result1 = $dpla->getCargaisonlByID($idNavire);
				foreach ($result1 as $result) {
				?>
					

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
	</div>

    


    <script >
	function precedent() {
   window.history.back();
}

</script>

    <?php
require_once './Composant/footer.php';
?>