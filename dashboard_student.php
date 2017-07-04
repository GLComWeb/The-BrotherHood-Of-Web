<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- bon affichage sur mobile -->
		<meta name="description" content="Educative" />
		<meta name="author" content="The BrotherHood Of Web" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Apolearn est une plateforme e-learning LMS sociale et collaborative pour les professionnels de l'éducation et de la formation." />
		<title>ApolEarn II Plateforme social et collaborative d'auto-formation</title>
		<!-- JS -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/script_dashboard_student.js"></script>
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/styles_dashboard_student.css" />
		<link href="css/font-awesome.css" rel="stylesheet" />
		<link rel="shortcut icon" href="favicon.ico" />
	</head>

	<body>
		<!-- HEADER -->
		<header>
			<!-- NAVIGATION -->
			<div class="side-menu">
			    <nav class="navbar navbar-default" role="navigation">
			    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				        <div class="brand-wrapper">
				            <!-- Hamburger -->
				            <button type="button" class="navbar-toggle">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>

				            <!-- Brand -->
				            <div class="brand-name-wrapper">
				                <a class="navbar-brand" href="index.php">Apolearn II</a>
				            </div>

				            <!-- Search -->
				            <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>

				            <!-- Search body -->
				            <div id="search" class="panel-collapse collapse">
				                <div class="panel-body">
				                    <form class="navbar-form" role="search">
				                        <div class="form-group">
				                            <input type="text" class="form-control" placeholder="Search">
				                        </div>
				                        <button type="submit" class="btn btn-default "><i class="fa fa-check" aria-hidden="true"></i></button>
				                    </form>
				                </div>
				            </div>
				        </div> <!-- ./..brand-wrapper -->
				    </div> <!-- ./..navbar-header -->

				    <!-- Main Menu -->
				    <div class="side-menu-container">
				        <ul class="nav navbar-nav">
				            <li class="active"><a href="dashboard_student.php"><i class="fa fa-home" aria-hidden="true"></i> Tableau de bord</a></li>
				            <li><a href="dashboard_student_profil.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profil</a></li>
				            <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> Modules</a></li>
				            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messagerie</a></li>
				            <li><a href="discussion.php"><i class="fa fa-comment" aria-hidden="true"></i> Forum</a></li>
				            <li><a href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
				        </ul>
				    </div><!-- ./..side-menu-container -->
				</nav> <!-- ./..navbar navbar-default -->
   		 	</div> <!-- ./..side-menu -->
		</header>

		<!-- CONTENT -->
		<main class="container-fluid">
			<div class="side-body">
				<div class="row">
					<!-- CONTENT -->
					<div class="col-xs-12">
						<!-- CALENDAR -->
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-8 calendar">
								<h2>Agenda</h2>
									<!-- FORUM & CHAT -->
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 homework">
											<h2>Modules</h2>
										</div> <!-- ./..col-xs-12 col-sm-12 col-md-6 homework -->
										<div class="col-xs-12 col-sm-12 col-md-6 forum">
											<h2>Forum</h2>
										</div> <!-- ./..col-xs-12 col-sm-12 col-md-6 forum -->
									</div> <!-- ./..row -->
							</div> <!-- ./..col-xs-12 col-sm-12 col-md-8 calendar -->
							<div class="col-xs-12 col-sm-12 col-md-4 chat">
								<h2>Chat</h2>
							</div> <!-- ./..col-xs-12 col-sm-12 col-md-4 chat -->
						</div> <!-- ./..row calendar -->
						
					</div> <!-- ./..col-xs-12 -->
				</div> <!-- ./..row -->
			</div> <!-- ./..side-body -->
		</main> <!-- ./..container -->

		<!-- Footer -->
         <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="icon">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </p>
                    </div> <!-- ./..col-xs-12 -->
                    <div class="col-xs-12 ">
                        <p>&copy; 2017 <a href="#" class="color-primary linear">The BrotherHood Of Web</a>. All Rights Reserved. </p>
                    </div> <!-- ./..col-xs-12 -->
                    
                </div> <!-- ./..row -->
            </div> <!-- ./..container-fluid -->
         </footer><!-- /Footer -->

	</body>
</html>

	