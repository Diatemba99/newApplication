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
?>

<?php
			$ctma = new Ctmafinal($idNavire);
			$result1 = $ctma->getCtmaInitialByID($idNavire);
			if(count($result1)==0){
?>
<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Précédent</font></font></button>
<h6 class="mb-0 mt-3 text-uppercase">Etape 2</h6>
	<hr/>

    <h6 class="mb-0 text-uppercase">Information Draft Final</h6>
					
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Calcul des tirants moyens apparents</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/ctmafinal.php">
                                <input type="number" hidden name="idNavire" value="<?=$idNavire?>" class="form-control border-start-0" id="idNavire" placeholder="" />
								<input type="date" hidden readonly name="dateSurveyFinal" class="form-control border-start-0" id="dateSurveyFinal" placeholder="" />
										<script>
                                		document.getElementById("dateSurveyFinal").valueAsDate = new Date();
                                		</script>
										<input type="text" hidden readonly name="heureSurveyFinal" class="form-control border-start-0" id="heureSurveyFinal" placeholder="Heure Survey Initial" />
										<script>
											var d = new Date();
											var hours = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
											
                                			document.getElementById("heureSurveyFinal").value = hours;
                                		</script>
							<div class="row">
								<div class="col-4">
								
								<div class="input-group mt-3">
                                    <span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEavbd</font></font></span>
										<input type="number" required step="any" name="teavbd" class="form-control border-start-0" id="teavbd" placeholder="TEavbd" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEavtb</font></font></span>
										<input type="number" required onkeyup="calculerTEav();" step="any" name="teavtb" class="form-control border-start-0" id="teavtb" placeholder="TEavtb" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEav</font></font></span>
										<input type="number" readonly step="any" name="teav" class="form-control border-start-0" id="teav" placeholder="" />
									</div>
							</div>
							</div>
							<div class="row">
								<div class="col-4">
								
								<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEarbd</font></font></span>
										<input type="number" required step="any" name="tearbd" class="form-control border-start-0" id="tearbd" placeholder="TEarbd" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEartb</font></font></span>
										<input type="number" required onkeyup="calculerTEar();" step="any" name="teartb" class="form-control border-start-0" id="teartb" placeholder="TEartb" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEar</font></font></span>
										<input type="number" readonly step="any" name="tear" class="form-control border-start-0" id="tear" placeholder="" />
									</div>
							</div>
							</div>
							<div class="row">
								<div class="col-4">
								
								<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEMbd</font></font></span>
										<input type="number" required step="any" name="tembd" class="form-control border-start-0" id="tembd" placeholder="TEMbd" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEMtb</font></font></span>
										<input type="number" required onkeyup="calculerTEM();" step="any" name="temtb" class="form-control border-start-0" id="temtb" placeholder="TEMtb" />
									</div>
							</div>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TEM</font></font></span>
										<input type="number" readonly step="any" name="tem" class="form-control border-start-0" id="tem" placeholder="" />
									</div>
							</div>
							</div>
							<h5 class="mb-0 text-primary">Calcul de l'Assiette Apparente ou (Apparent Trim)</h5>
							<div class="col-4">
								
								<div class="input-group mt-3">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apparent Trim</font></font></span>
										<input type="number" readonly step="any" name="apparentTrim" class="form-control border-start-0" id="apparentTrim" placeholder="" />
									</div>
							</div>
							<h5 class="mb-0 text-primary">Calcul de la distance entre les marques avant et arriéres</h5>
							<div class="row">
								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">L</font></font></span>
										<input type="number" required step="any" name="L" class="form-control border-start-0" id="L" placeholder="" />
									</div>
								</div>

								<div class="col-6">
									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l1</font></font></span>
										<input type="number" required step="any" name="l1" class="form-control border-start-0" id="l1" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l2</font></font></span>
										<input type="number" required step="any" name="l2" class="form-control border-start-0" id="l2" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l3</font></font></span>
										<input type="number" required step="any" onkeyup="calculerl();calculerCorrection();calculerCorrectionTirants();" name="l3" class="form-control border-start-0" id="l3" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">l</font></font></span>
										<input type="number" required step="any" readonly name="lL" class="form-control border-start-0" id="lL" placeholder="" />
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
										<input type="number" readonly step="any" name="corrAv" class="form-control border-start-0" id="corrAv" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Corr.arr</font></font></span>
										<input type="number" readonly step="any" name="corrAr" class="form-control border-start-0" id="corrAr" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Corr.mil</font></font></span>
										<input type="number" readonly step="any" name="corrM" class="form-control border-start-0" id="corrM" placeholder="" />
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
										<input type="number" readonly step="any" name="tAv" class="form-control border-start-0" id="tAv" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tar</font></font></span>
										<input type="number" readonly step="any" name="tAr" class="form-control border-start-0" id="tAr" placeholder="" />
									</div>

									
									<div class="input-group mt-3">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TM</font></font></span>
										<input type="number" readonly step="any" name="tM" class="form-control border-start-0" id="tM" placeholder="" />
									</div>
								</div>
							</div>

							<h5 class="mb-0 text-primary">Calcul de l'Assiette réelle ou True Trim</h5>
							<div class="row mt-3">
								<div class="col-6">
									
								</div>

								<div class="col-6">
									
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">True Trim</font></font></span>
										<input type="number" readonly step="any" name="trueTrim" class="form-control border-start-0" id="trueTrim" placeholder="" />
									</div>
								</div>
							</div>
												
							
								<div >
									<button name="btn_ajout_etape3" type="submit" class="btn btn-primary px-5">Valider</button>
									<button type="reset" class="btn btn-secondary px-5" data-bs-dismiss="modal">Annuler</button>

								</div>
							</form>
						</div>
					</div>
				</div>

                <script type="text/javascript">
						var tEav=document.getElementById('teav');
						var tEar=document.getElementById('tear');
						var tEM=document.getElementById('tem');
						var apparentTrim= document.getElementById('apparentTrim');
						var L= document.getElementById('L');
						var l1= document.getElementById('l1');
						var l2= document.getElementById('l2');
						var l3= document.getElementById('l3');
						var lL= document.getElementById('l');
						var corrAv=document.getElementById('corrAv');
						var corrAr=document.getElementById('corrAr');
						var corrM=document.getElementById('corrM');
						var tAv= document.getElementById('tAv');
						var tAr= document.getElementById('tAr');
						var tM= document.getElementById('tM');
						var trueTrim= document.getElementById('trueTrim');

						// Fonction pour calculer TEav
						function calculerTEav(){
							var teavbd =Number(document.getElementById('teavbd').value);
							var teavtb =Number(document.getElementById('teavtb').value);
							var tEav =Number((teavbd + teavtb)/2);
							document.getElementById("teav").value = tEav;
						};
						// Fonction pour calculer TEar
						function calculerTEar(){
							var tearbd =Number(document.getElementById('tearbd').value);
							var teartb =Number(document.getElementById('teartb').value);
							var tEar =Number((tearbd + teartb)/2);
							document.getElementById("tear").value = tEar;
						};
						// Fonction pour calculer TEM et apparent trim
						function calculerTEM(){
							var tEav=Number(document.getElementById('teav').value);
							var tEar=Number(document.getElementById('tear').value);
							var tembd =Number(document.getElementById('tembd').value);
							var temtb =Number(document.getElementById('temtb').value);
							var tEM =Number((tembd + temtb)/2);
							var apparentTrim = Number(tEar-tEav);
							document.getElementById("tem").value = tEM;
							document.getElementById("apparentTrim").value = apparentTrim;
						};
						// Fonction pour calculer l
						function calculerl(){
							var L =Number(document.getElementById('L').value);
							var l1 =Number(document.getElementById('l1').value);
							var l3 =Number(document.getElementById('l3').value);
							var lL =Number(document.getElementById('lL').value);
						
							var lL =Number(L-(l1 + l3));
						
							document.getElementById("lL").value = lL;
						
						};
						// Fonction pour calculer correction
						function calculerCorrection(){
							var apparentTrim= Number(document.getElementById('apparentTrim').value);
							var L =Number(document.getElementById('L').value);
							var l1 =Number(document.getElementById('l1').value);
							var l2 =Number(document.getElementById('l2').value);
							var l3 =Number(document.getElementById('l3').value);
							var lL =Number(document.getElementById('lL').value);
							var tEav=Number(document.getElementById('teav').value);
							var tEar=Number(document.getElementById('tear').value);
							var tEM=Number(document.getElementById('tem').value);
						
							var corrAv =Number((apparentTrim*l1)/lL);
							var corrAr =Number((apparentTrim*l3)/lL);
							var corrM =Number((apparentTrim*l2)/lL);
						
							document.getElementById("corrAv").value = corrAv;
							document.getElementById("corrAr").value = corrAr;
							document.getElementById("corrM").value = corrM;
						};
						// Fonction pour calculer correction tirants réels et true trim
						function calculerCorrectionTirants(){
							var tEav=Number(document.getElementById('teav').value);
							var tEar=Number(document.getElementById('tear').value);
							var tEM=Number(document.getElementById('tem').value);
							var corrAv=Number(document.getElementById('corrAv').value);
							var corrAr=Number(document.getElementById('corrAr').value);
							var corrM=Number(document.getElementById('corrM').value);
						
							var tAv =Number(tEav+corrAv);
							var tAr =Number(tEar+corrAr);
							var tM =Number(tEM+corrM);
							var trueTrim =Number(tAr-tAv);
						
							document.getElementById("tAv").value = tAv;
							document.getElementById("tAr").value = tAr;
							document.getElementById("tM").value = tM;
							document.getElementById("trueTrim").value = trueTrim;
					};
				</script>
<?php
			}else{
?>
<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Précédent</font></font></button>
			<div class="card-body">
								<h6 class="mb-5 text-uppercase">Informations Etape 2</h6>
	
				<?php
				$cmma = new Ctmafinal($idNavire);
				$result1 = $cmma->getCtmaInitialByID($idNavire);
				foreach ($result1 as $result) {
				?>
					<!-- <tr>
						<td><?= $result['tEavbd'] ?></td>
						<td><?= $result['tEavtb'] ?></td>
						<td><?= $result['tEav'] ?></td>
						<td><?= $result['tEarbd'] ?></td>
						<td><?= $result['tEartb'] ?></td>
						
						
					</tr> -->

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