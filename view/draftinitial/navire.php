<?php
@require_once "authentification.php";
$prenomAgent= $_SESSION["CURRENT_user"]['first_name'];
$nomAgent= $_SESSION["CURRENT_user"]['last_name'];
// $idNavire= $_GET['id'];
require_once './Composant/navigation.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmainitial.php';
require_once './model/cmminitial.php';
require_once './model/tpcinitial.php';
$profile=$_SESSION["CURRENT_user"]['id'];
?>


<div class="card-body">
    <h6 class="mb-0 text-uppercase text-center mb-3">Information Du Navire</h6>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="lni lni-plus me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Information Du Navire</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="./controller/infonavire.php">
								<input type="text" hidden name="idUser" value="<?=$profile?>" class="form-control border-start-0" id="idUser" placeholder="" />
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name of The Ship</font></font></span>
										<input type="text" required name="nomNavire" class="form-control border-start-0" id="nomNavire" placeholder="Name of The Ship" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IMO Number</font></font></span>
										<input type="text" required name="imoNumber" class="form-control border-start-0" id="imoNumber" placeholder="IMO Number" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">INMC Number</font></font></span>
										<input type="text" required name="inmcNumber" class="form-control border-start-0" id="inmcNumber" placeholder="INMC Number" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operator</font></font></span>
										<input type="text"  name="operator" readonly value='<?=$prenomAgent ?>&nbsp;<?=$nomAgent?>' class="form-control border-start-0" id="operator" placeholder="Operator" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keel Plate</font></font></span>
										<input type="text" required name="keelPlate" class="form-control border-start-0" id="keelPlate" placeholder="Keel Plate" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LBP</font></font></span>
										<input type="text" required name="lbp" class="form-control border-start-0" id="lbp" placeholder="LBP" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Distance between Perpendiculars and Marks</font></font></span>
										<input type="text" required name="dbpm" class="form-control border-start-0" id="dbpm" placeholder="Distance between Perpendiculars and Marks" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lightship</font></font></span>
										<input type="text" required name="lightship" class="form-control border-start-0" id="lightship" placeholder="lightship" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Density (Rho)</font></font></span>
										<input type="text" required name="densityRho" class="form-control border-start-0" id="densityRho" placeholder="Density (Rho)" />
									</div>
							</div>
							<div class="col-md-6">
								
								<div class="input-group">
									<span class="input-group-text" id="basic-addon3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Number of the wedges</font></font></span>
										<input type="text" required name="numbWedges" class="form-control border-start-0" id="numbWedges" placeholder="Number of the wedges" />
									</div>
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





<script >
	function precedent() {
   window.history.back();
}


</script>

			
					

        <?php
    require_once './Composant/footer.php';
?>