<!doctype html>
<html lang="en">
<!-- Mirrored from codervent.com/amdash/demo/vertical/authentication-signin.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 15:16:06 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="./page/assets/images/NIMBA.png" type="image/png" />
	<!--plugins-->
	<link href="./page/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="./page/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="./page/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="./page/assets/css/pace.min.css" rel="stylesheet" />
	<script src="./page/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="./page/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="./page/assets/css/app.css" rel="stylesheet">
	<link href="./page/assets/css/icons.css" rel="stylesheet">
	<title>NIMBA APPLICATION</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="./page/assets/images/NIMBA.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Connexion</h3>
										<p>
                                       Vous n'avez pas encore de compte? 
										</p>
									</div>
									
									<div class="login-separater text-center mb-4"> <span>OU CONNECTEZ-VOUS AVEC EMAIL</span>
										<hr/>
									</div>
									<!-- Message d'erreur -->
									<?php
										if (isset($_GET['erreur'])) {
											echo " <div class='alert alert-danger d-flex align-items-center' role='alert'>
											
														<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/>
															<symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
															<path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
															</symbol>
														</svg>
														<div>
															Email ou mots de passe incorrect
														</div>
													</div>";
										}
										?>
									<!-- Fin message d'erreur -->
									<div class="form-body">
										<form class="row g-3" method="POST" action="controller/personnelController.php">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Adresse Email</label>
												<input type="email" name="email" class="form-control" id="email" placeholder="Adresse Email">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Mot de Passe</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="mot_de_passe" class="form-control border-end-0" id="mot_de_passe" placeholder="Enter votre Mot de Passe"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Souviens-toi de moi</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="authentication-forgot-password.php">
                                                                               Mot de passe oublié ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="btn_connexion" class="btn btn-primary"><i class="bx bxs-lock-open"> Connecter</i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="./page/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="./page/assets/js/jquery.min.js"></script>
	<script src="./page/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="./page/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="./page/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="./page/assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/amdash/demo/vertical/authentication-signin.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 15:16:08 GMT -->
</html>