
<!DOCTYPE "HTML 4.01 Transitional EN" "http://www.w3.org/">
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
	<!--<![endif]-->
	<!-- start: HEAD --><head>
<!-- InstanceBeginEditable name="EditRegionPHP" -->
<?php
session_start();

require_once('../../../clases_conexion/cls_seguridad.php');
$obj_seg = new Seguridad;

if(!$obj_seg->MET_checkAcceso(0))
{
	echo"<script>window.location = '../../../login.php';</script>";
	exit();
}

require_once('../clases_datos/cls_metodos_comunes.php');
require_once('../clases_datos/cls_consulta_datos.php');

$obj_met = new Metodos_comunes;
$obj_cls = new Consulta_datos;

$menu_home="";
$menu_mantenimientos="";
$menu_agendamiento="";
$menu_paciente="class='active open'";
$menu_doctor="";
$menu_reportes="";
$menu_seguridad="";

?>
<!-- InstanceEndEditable -->


<title>DrClick || Software de Gestión Médico || Powered by Itecnogest</title>
<!-- start: META -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<!-- end: META -->
<!-- start: MAIN CSS -->
<link rel="stylesheet" href="../../../assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../../assets/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../../../assets/fonts/style.css">
<link rel="stylesheet" href="../../../assets/css/main.css">
<link rel="stylesheet" href="../../../assets/css/main-responsive.css">
<link rel="stylesheet" href="../../../assets/plugins/iCheck/skins/all.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
<link rel="stylesheet" href="../../../assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
<link rel="stylesheet" href="../../../assets/css/theme_light.css" type="text/css" id="skin_color">
<link rel="stylesheet" href="../../../assets/css/print.css" type="text/css" media="print"/>
<!--[if IE 7]>
		<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
<!-- end: MAIN CSS -->
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<!-- InstanceBeginEditable name="css" -->
<link rel="stylesheet" type="text/css" href="../../../assets/plugins/select2/select2.css" />
<link rel="stylesheet" href="../../../assets/plugins/DataTables/media/css/DT_bootstrap.css" />

<link rel="stylesheet" type="text/css" href="../../../assets/plugins/select2/select2.css" />
<link rel="stylesheet" href="../../../assets/plugins/DataTables/media/css/DT_bootstrap.css" />

<link rel="stylesheet" href="../../../assets/plugins/select2/select2.css">
<link rel="stylesheet" href="../../../assets/plugins/datepicker/css/datepicker.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
<link rel="stylesheet" href="../../../assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<link rel="stylesheet" href="../../../assets/plugins/summernote/build/summernote.css">
<!-- InstanceEndEditable -->
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: FAVICON PAGE -->
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- end: FAVICON PAGE -->
</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>

	<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container">
		  <div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
                        <img src="../../../assets/images/logo_drclick.png" width="100" height="49">
                    <!-- end: LOGO -->
			  </div>
				<div class="navbar-tools">
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right">
						<!-- start: USER DROPDOWN -->
						<li class="dropdown current-user">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#"> <img src="../../../assets/images/drclick.jpg" class="circle-img" alt=""> <span class="username"><?php echo $_SESSION['avpusr_name']; ?></span> <i class="clip-chevron-down"></i> </a>
							<ul class="dropdown-menu">
								<li>
									<a href="../../../logout.php"> <i class="clip-exit"></i> &nbsp;Cerrar Sesión </a>
								</li>
							</ul>
						</li>
						<!-- end: USER DROPDOWN -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
	</div>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<div class="navbar-content">
				<!-- start: SIDEBAR -->
				<div class="main-navigation navbar-collapse collapse">
					<!-- start: MAIN MENU TOGGLER BUTTON -->
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
					</div>
					<!-- end: MAIN MENU TOGGLER BUTTON -->
					<!-- start: MAIN NAVIGATION MENU -->
					<ul class="main-navigation-menu">
						<li <?php echo $menu_home; ?> >
							<a href="../../home/frm_home.php"><i class="clip-home-3"></i>
								<span class="title"> Menú </span><span class="selected"></span>
							</a>
						</li>
                        <!-- INICIO MANTENIMIENTOS -->
                        <li <?php echo $menu_mantenimientos; ?>>
							<a href="../../../menu/mantenimientos/frm_menu_mantenimientos.php"><i class="clip-wrench"></i>
								<span class="title">Mantenimientos</span>
								<span class="selected"></span>
							</a>
						</li>
                        <!-- FIN MANTENIMIENTOS -->
                        
                        <!-- INICIO AGENDAMIENTO -->
                        <li <?php echo $menu_agendamiento; ?>>
							<a href="../../../menu/agendamiento/frm_menu_agendamiento.php"><i class="fa fa-calendar"></i>
								<span class="title">Agendamiento</span>
								<span class="selected"></span>
							</a>
						</li>
                        <!-- FIN AGENDAMIENTO -->
                        
                        <!-- INICIO PACIENTE -->
                        <li <?php echo $menu_paciente; ?>>
							<a href="../../../menu/paciente/frm_menu_paciente.php"><i class="clip-user-5"></i>
								<span class="title">Paciente</span>
								<span class="selected"></span>
							</a>
						</li>
                        <!-- FIN PACIENTE -->

                        <!-- INICIO DOCTOR -->
                        <li <?php echo $menu_doctor; ?>>
							<a href="../../../menu/doctor/frm_menu_doctor.php"><i class="fa fa-user-md"></i>
								<span class="title">Doctor</span>
								<span class="selected"></span>
							</a>
						</li>
                        <!-- FIN DOCTOR -->

                        <!-- INICIO REPORTES -->
                        <li <?php echo $menu_reportes; ?>>
							<a href="../../../menu/reportes/frm_menu_reportes.php"><i class="fa fa-clipboard"></i>
								<span class="title">Consultas y Reportes</span>
								<span class="selected"></span>
							</a>
						</li>
                        <!-- FIN REPORTES -->

                        <!-- INICIO SEGURIDAD -->
                        <li <?php echo $menu_seguridad; ?>>
							<a href="../../../menu/seguridad/frm_menu_seguridad.php"><i class="clip-key"></i>
								<span class="title">Seguridad</span>
								<span class="selected"></span>
							</a>
						</li>
                        <!-- FIN SEGURIDAD -->
					</ul>
					<!-- end: MAIN NAVIGATION MENU -->
				</div>
				<!-- end: SIDEBAR -->
			</div>

            <!-- start: PAGE -->
			<div class="main-content">
            	<div class="container">
				<!-- InstanceBeginEditable name="contenido" -->
                	<!-- start: PAGE HEADER -->
					<div class="row">
                    <div class="col-sm-12">
                        <!-- start: PAGE TITLE & BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-user-md"></i>
                                <a href="#"> Paciente </a>
                            </li>
                            <li class="active">
                                Permisos
                            </li>
                        </ol>
                        <div class="page-header">
                            <h1> Listado de Pacientes </h1>
                        </div>
                        <!-- end: PAGE TITLE & BREADCRUMB -->
                    </div>
                </div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
																		<div class="row">
										<div class="col-md-12 space20">
											<div class="btn-group pull-right">
												<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
													Export <i class="fa fa-download"></i>
												</button>
												<ul class="dropdown-menu dropdown-light pull-right">
													<li>
														<a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="1"> Save as PDF </a>
													</li>
													<li>
														<a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="1"> Save as PNG </a>
													</li>
													<li>
														<a href="#" class="export-csv" data-table="#sample-table-2" data-ignoreColumn ="1"> Save as CSV </a>
													</li>
													<li>
														<a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="1"> Save as TXT </a>
													</li>
													<li>
														<a href="#" class="export-xml" data-table="#sample-table-2" data-ignoreColumn ="1"> Save as XML </a>
													</li>
													<li>
														<a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="1"> Save as SQL </a>
													</li>
													<li>
														<a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="1"> Save as JSON </a>
													</li>
													<li>
														<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="1"> Export to Excel </a>
													</li>
													<li>
														<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="1"> Export to Word </a>
													</li>
													<li>
														<a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="1"> Export to PowerPoint </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
                                    
                                    <form action="frm_permisos_paciente.php" role="form" id="form" method="post">
                                    <input id="txt_id" name="txt_id" type="hidden" value="">
									<div class="table-responsive" id="grid">
										    	<?php 
	  												$grid = $obj_cls->MET_llenaGridConsultaPaciente();
													echo $grid;
	  											?>											
									</div>
                                    </form>
								</div>
							</div>

						</div>
					</div>
				<!-- InstanceEndEditable -->
                </div>
          </div>
            <!-- end: PAGE -->
</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<div class="footer clearfix">
			<div class="footer-inner">
				2016 &copy; DrClick Todos los derechos reservados.
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
		<!-- end: FOOTER -->
        <!-- start: MAIN JAVASCRIPTS -->
	<!--[if lt IE 9]>
		<script src="../assets/plugins/respond.min.js"></script>
		<script src="../assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="../assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="../../../assets/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
	<script src="../../../assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script src="../../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../../assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
	<script src="../../../assets/plugins/blockUI/jquery.blockUI.js"></script>
	<script src="../../../assets/plugins/iCheck/jquery.icheck.min.js"></script>
	<script src="../../../assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
	<script src="../../../assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
	<script src="../../../assets/plugins/less/less-1.5.0.min.js"></script>
	<script src="../../../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<script src="../../../assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
	<script src="../../../assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- InstanceBeginEditable name="javascript" -->
		<script type="text/javascript" src="../../../assets/plugins/select2/select2.min.js"></script>
		
        <script src="../../../assets/plugins/bootbox/bootbox.min.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>		<script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>

		<script src="../../../assets/plugins/tableExport/tableExport.js"></script>
		<script src="../../../assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="../../../assets/plugins/tableExport/html2canvas.js"></script>
		<script src="../../../assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="../../../assets/plugins/tableExport/jspdf/libs/sprintf.js"></script>
		<script src="../../../assets/plugins/tableExport/jspdf/jspdf.js"></script>
		<script src="../../../assets/plugins/tableExport/jspdf/libs/base64.js"></script>
		<script src="../../../assets/js/table-export.js"></script>
        
        
		<script type="text/javascript" src="../../../assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="../../../assets/js/table-data.js"></script>
        
        <script src="../../../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../../../assets/js/form-validation.js"></script>
        
        <script src="../../../assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="../../../assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="../../../assets/plugins/select2/select2.min.js"></script>
		<script src="../../../assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
		<script src="../../../assets/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
		<script src="../../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../../../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="../../../assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
		<script src="../../../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="../../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="../../../assets/plugins/bootstrap-colorpicker/js/commits.js"></script>
		<script src="../../../assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
		<script src="../../../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="../../../assets/plugins/summernote/build/summernote.min.js"></script>
		<script src="../../../assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="../../../assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="../../../assets/js/form-elements.js"></script>
		<!-- InstanceEndEditable -->
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- InstanceBeginEditable name="ready js" -->
	<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
				TableExport.init();	
			});
		</script>

	<!-- InstanceEndEditable -->
</body>
	<!-- end: BODY -->

<!-- InstanceEnd --></html>
