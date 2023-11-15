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
require_once './model/deplacementinitial.php';
require_once './model/draftinitial.php';
?>
<button type="button" onclick="precedent()" class="btn btn-success px-5 radius-30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Retour</font></font></button>
	
	
    <h6 class="mb-0 mt-3 text-uppercase text-center">Etape 1</h6>
    <hr />
                <div class="card-body">
								
				<?php
				$cmma = new Draft($idNavire);
				$result1 = $cmma->getDraftByID($idNavire);
				foreach ($result1 as $result) {
				?>
					
		    <div class="row">
                            <div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom du Navire</font></font></span>
										<input type="text" readonly name="nomNavire" class="form-control border-start-0" id="nomNavire" value="<?= $result['nomNavire'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Call Sign</font></font></span>
										<input type="text" readonly name="callSign" class="form-control border-start-0" id="callSign" value="<?= $result['callSign'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Official N°</font></font></span>
										<input type="text" readonly name="officialN" class="form-control border-start-0" id="officialN" value="<?= $result['officialNo'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ship Management</font></font></span>
										<input type="text" readonly name="shipManagement" class="form-control border-start-0" id="shipManagement" value="<?= $result['shipManagement'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operators</font></font></span>
										<input type="text" readonly name="operators" class="form-control border-start-0" id="operators" value="<?= $result['operators'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registered Owners</font></font></span>
										<input type="text" readonly name="registeredOwners" class="form-control border-start-0" id="registeredOwners" value="<?= $result['registeredOwners'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vsa/Cso</font></font></span>
										<input type="text" readonly name="vsa" class="form-control border-start-0" id="vsa" value="<?= $result['vsa_cso'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Seo</font></font></span>
										<input type="text" readonly name="seo" class="form-control border-start-0" id="seo" value="<?= $result['seo'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Flag</font></font></span>
										<input type="text" readonly name="flag" class="form-control border-start-0" id="flag" value="<?= $result['flag'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Port Of Reg</font></font></span>
										<input type="text" readonly name="portOfReg" class="form-control border-start-0" id="portOfReg" value="<?= $result['portOfReg'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Builders</font></font></span>
										<input type="text" readonly name="builders" class="form-control border-start-0" id="builders" value="<?= $result['builders'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hull N°</font></font></span>
										<input type="number" readonly name="hull" class="form-control border-start-0" id="hull" value="<?= $result['hullNo'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Type</font></font></span>
										<input type="text" readonly name="type" class="form-control border-start-0" id="type" value="<?= $result['type'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keel Laid</font></font></span>
										<input type="text" readonly name="keelLaid" class="form-control border-start-0" id="keelLaid" value="<?= $result['keelLaid'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Delivered</font></font></span>
										<input type="text" readonly name="delivered" class="form-control border-start-0" id="delivered" value="<?= $result['delivered'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Class Society</font></font></span>
										<input type="text" readonly name="class" class="form-control border-start-0" id="class" value="<?= $result['classSociety'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">H&M Underwrirers</font></font></span>
										<input type="text" readonly name="hm" class="form-control border-start-0" id="hm" value="<?= $result['hmUnderwrirers'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">P&I Club</font></font></span>
										<input type="text" readonly name="piclub" class="form-control border-start-0" id="piclub" value="<?= $result['piClub'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loa</font></font></span>
										<input type="number" readonly name="loa" class="form-control border-start-0" id="loa" value="<?= $result['loa'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lbp</font></font></span>
										<input type="number" readonly name="lbp" class="form-control border-start-0" id="lbp" value="<?= $result['	lbp'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Breadth (moulded)</font></font></span>
										<input type="number" readonly name="breadth" class="form-control border-start-0" id="breadth" value="<?= $result['breadth_moulded'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Depth (moulded)</font></font></span>
										<input type="number" readonly name="depthMoulded" class="form-control border-start-0" id="depthMoulded" value="<?= $result['depth_moulded'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Depth (extreme)</font></font></span>
										<input type="number" readonly name="depthExterne" class="form-control border-start-0" id="depthExterne" value="<?= $result['depth_extreme'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keel plate</font></font></span>
										<input type="number" readonly name="keelPlate" class="form-control border-start-0" id="keelPlate" value="<?= $result['keelplate'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dwt</font></font></span>
										<input type="number" readonly name="dwt" class="form-control border-start-0" id="dwt" value="<?= $result['dwt'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Disp</font></font></span>
										<input type="number" readonly name="disp" class="form-control border-start-0" id="disp" value="<?= $result['disp'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lightship</font></font></span>
										<input type="number" readonly name="lightship" class="form-control border-start-0" id="lightship" value="<?= $result['lightship'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Draft (MOULDED)</font></font></span>
										<input type="number" readonly name="draftMoulded" class="form-control border-start-0" id="draftMoulded" value="<?= $result['draft_moulded'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Draft (EXTREME)</font></font></span>
										<input type="number" readonly name="draftExtreme" class="form-control border-start-0" id="draftExtreme" value="<?= $result['draft_extreme'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FP To Fore Draft Mark</font></font></span>
										<input type="number" readonly name="fp" class="form-control border-start-0" id="fp" value="<?= $result['fp_to_fore_draft_mark'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AP To Aft Draft Mark</font></font></span>
										<input type="number" readonly name="ap" class="form-control border-start-0" id="ap" value="<?= $result['ap_to_fore_draft_mark'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Midship To Mid Draft Mark</font></font></span>
										<input type="number" readonly name="midship" class="form-control border-start-0" id="midship" value="<?= $result['midship_to_mid_draft_mark	'] ?>" />
									</div>
							</div>
							<div class="col-md-6 mt-3">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Between Draft Marks</font></font></span>
										<input type="number" readonly name="between" class="form-control border-start-0" id="between" value="<?= $result['between_draft_mark'] ?>" />
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
