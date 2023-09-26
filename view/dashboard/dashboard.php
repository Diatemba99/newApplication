<?php
	@require_once "authentification.php";
 	require_once './Composant/navigation.php';
	require_once './model/dashbord.php';

			$all_draft = new DraftDashbords();
			$result1 = $all_draft->getAllDraft();
			$drafts=count($result1);

			$all_draftNoValide = new DraftDashbords();
			$result2 = $all_draftNoValide->getAllDraftInitialNo();
			$draftsNoValide=count($result2);

			$all_draftValide = new DraftDashbords();
			$result3 = $all_draftValide->getAllDraftInitialValide();
			$draftsvalide=count($result3);

			$all_draftFinaleValide = new DraftDashbords();
			$result4 = $all_draftFinaleValide->getAllDraftFinalValide();
			$draftsFinal=count($result4);
?>


		<!--start page wrapper -->

				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
                   <div class="col">
					 <div class="card radius-10 bg-gradient-cosmic">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="me-auto">
									<p class="mb-0 text-white">Draft Initial Non Validé</p>
									<h4 class="my-1 text-white"><?=$draftsNoValide?></h4>
									<p class="mb-0 font-13 text-white"></p>
								</div>
								<div id="chart1"></div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 bg-gradient-ibiza">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div class="me-auto">
								   <p class="mb-0 text-white">Draft Initial Validé</p>
								   <h4 class="my-1 text-white"><?=$draftsvalide?></h4>
								   <p class="mb-0 font-13 text-white"></p>
							   </div>
							   <div id="chart2"></div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 bg-gradient-ohhappiness">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div class="me-auto">
								   <p class="mb-0 text-white">Draft Final</p>
								   <h4 class="my-1 text-white"><?=$draftsFinal?></h4>
								   <p class="mb-0 font-13 text-white"></p>
							   </div>
							   <div id="chart3"></div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 bg-gradient-kyoto">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div class="me-auto">
								   <p class="mb-0 text-dark">Total Draft</p>
								   <h4 class="my-1 text-dark"><?=$drafts?></h4>
								   <p class="mb-0 font-13 text-dark"></p>
							   </div>
							   <div id="chart4"></div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div>
				<!--end row-->

				<div class="row">
                   <div class="col-12 col-lg-12">
                      <div class="card radius-10">
						  <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Surveys Overview</h6>
								</div>
								<div class="dropdown ms-auto">
									<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										
									</ul>
								</div>
							</div>
							<div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>Initials</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-danger"></i>Finals</span>
							</div>
							<div class="chart-container-1">
								<canvas id="chart5"></canvas>
							  </div>
						  </div>
						  <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-0 row-group text-center border-top">
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">08</h4>
								<small class="mb-0">WIKIS <span> <i class="bx bx-up-arrow-alt align-middle"></i> </span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">08</h4>
								<small class="mb-0">NAVIRES <span> <i class="bx bx-up-arrow-alt align-middle"></i></span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">08</h4>
								<small class="mb-0">SITES <span> <i class="bx bx-up-arrow-alt align-middle"></i></span></small>
							  </div>
							</div>
							<div class="col">
								<div class="p-3">
								  <h4 class="mb-0">08</h4>
								  <small class="mb-0">ENQUETEURS <span> <i class="bx bx-up-arrow-alt align-middle"></i> </span></small>
								</div>
							  </div>
						  </div>
					  </div>
				   </div>
				</div>
				<!--end row-->

				
		
<?php
	require_once './Composant/footer.php';
?>