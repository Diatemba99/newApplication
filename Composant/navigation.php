<?php
@require_once "authentification.php";
$prenomAgent= $_SESSION["CURRENT_user"]['first_name'];
$nomAgent= $_SESSION["CURRENT_user"]['last_name'];
$profile=$_SESSION["CURRENT_user"]['first_name'].' '.$_SESSION["CURRENT_user"]['last_name'];
?>
<!doctype html>
<html lang="fr">


<!-- Mirrored from codervent.com/amdash/demo/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 15:03:22 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<!-- icon -->
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="./page/assets/images/NIMBA.png" type="image/png" />
	<!--plugins-->
	<link href="./page/assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/>
	<link href="./page/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="./page/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="./page/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="./page/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="./page/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="./page/assets/css/pace.min.css" rel="stylesheet" />
	<script src="./page/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="./page/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="./page/assets/css/app.css" rel="stylesheet">
	<link href="./page/assets/css/icons.css" rel="stylesheet">
	<!-- font-awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="./page/assets/css/dark-theme.css" />
	<link rel="stylesheet" href="./page/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="./page/assets/css/header-colors.css" />
	<!-- manifest -->
	<link rel="manifest" href="./manifest.json">
	 <!-- jQuery -->
	 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
   <!-- jQuery -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   
   
	<title>NIMBA DRAFT SURVEY</title>

	<script>
		window.addEventListener('load', () => {
			if ("serviceWorker" in navigator){
				navigator.serviceWorker.register("./sw.js")
			}
		})
	</script>
</head>

<!-- <body onload="info_noti()"> -->
<body >
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="./page/assets/images/NIMBA.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text" style="color:#a02923;">NIMBA</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<?php
				if ($_SESSION["CURRENT_user"]["type"]==='Administrateur'){
			?>
			<ul class="metismenu" id="menu">
				<li>
					<a href="?page=dashboard" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Tableau de bord</div>
					</a>
					 
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-regular fa-building"></i>
						</div>
						<div class="menu-title">DRAFT INITIAL</div>
					</a>
					<ul>
						
						<li> <a href="?page=listessurveyinitial"><i class="bx bx-right-arrow-alt"></i>Liste Draft Initial</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-regular fa-building"></i>
						</div>
						<div class="menu-title">DRAFT FINAL</div>
					</a>
					<ul>
						
						<li> <a href="?page=draftfinal"><i class="bx bx-right-arrow-alt"></i>Liste Draft Final</a>
						</li>
						
					</ul>
				</li>
				

				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><img src="./view/img/personnel.png" width="25" height="25">
						</div>
						<div class="menu-title">Gestion Utilisateurs</div>
					</a>
					<ul>
						<li> <a href="?page=liste_personnel"><i class="bx bx-right-arrow-alt"></i>Listes Utilisateurs</a>
						</li>
						
					</ul>
				</li>
			 
			</ul>
			<?php
			}elseif ($_SESSION["CURRENT_user"]["type"]==='Superviseur'){
			 ?>
			<ul class="metismenu" id="menu">
				<li>
					<a href="?page=dashboard" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Tableau de bord</div>
					</a>
					 
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-regular fa-building"></i>
						</div>
						<div class="menu-title">DRAFT INITIAL</div>
					</a>
					<ul>
						
						<li> <a href="?page=listessurveyinitial"><i class="bx bx-right-arrow-alt"></i>Liste Draft Initial</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-regular fa-building"></i>
						</div>
						<div class="menu-title">DRAFT FINAL</div>
					</a>
					<ul>
						
						<li> <a href="?page=draftfinal"><i class="bx bx-right-arrow-alt"></i>Liste Draft Final</a>
						</li>
						
					</ul>
				</li>
			 
			</ul>
			<?php
			}else{
			?>
			<ul class="metismenu" id="menu">
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-regular fa-building"></i>
						</div>
						<div class="menu-title">DRAFT INITIAL</div>
					</a>
					<ul>
						
						<li> <a href="?page=listessurveyinitial"><i class="bx bx-right-arrow-alt"></i>Liste Draft Initial</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-regular fa-building"></i>
						</div>
						<div class="menu-title">DRAFT FINAL</div>
					</a>
					<ul>
						
						<li> <a href="?page=draftfinal"><i class="bx bx-right-arrow-alt"></i>Liste Draft Final</a>
						</li>
						
					</ul>
				</li>
			 
			</ul>
			<?php
			}
			?>
			
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Rechercher..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-notifications-list">
										
									</div>
									
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-message-list">
										
									</div>
									
								</div>
							</li>
						</ul>
					</div>

					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="./page/assets/images/NIMBA.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?=$nomAgent?></p>
								
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							
							<li><a class="dropdown-item" href='?page=dashboard';><i class='bx bx-home-circle'></i><span>Tableau de Bord</span></a>
							</li>
							
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="?page=deconnexion"><i class='bx bx-log-out-circle'></i><span>Se Déconnecter</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
        <div class="page-wrapper">
			<div class="page-content">
