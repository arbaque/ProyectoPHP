
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
$menu_paciente="";
$menu_doctor="class='active open'";
$menu_reportes="";
$menu_seguridad="";

date_default_timezone_set('America/Guayaquil');	
$fecha_hoy=date("Y-m-d");
$hora_actual=date('H:i');
	
$id_paciente=0;
$id_consulta=0;

if(isset($_REQUEST['txt_id'])){
	$id_paciente=$_REQUEST['txt_id'];
}

if(isset($_REQUEST['txt_id_consulta'])){
	$id_consulta=$_REQUEST['txt_id_consulta'];
}

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
<link rel="stylesheet" href="../../../assets/plugins/ladda-bootstrap/dist/ladda-themeless.min.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-social-buttons/social-buttons-3.css">
<link rel="stylesheet" href="../../../assets/plugins/select2/select2.css">
<link rel="stylesheet" href="../../../assets/plugins/datepicker/css/datepicker.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
<link rel="stylesheet" href="../../../assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
<link rel="stylesheet" href="../../../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<link rel="stylesheet" href="../../../assets/plugins/summernote/build/summernote.css">

<link rel="stylesheet" type="text/css" href="../../../assets/plugins/select2/select2.css" />
<link rel="stylesheet" href="../../../assets/plugins/DataTables/media/css/DT_bootstrap.css" />

<link rel="stylesheet" type="text/css" href="../../../css/slider/jquery-ui-slider-pips.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/flick/jquery-ui.css">

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
                                <a href="#"> Doctor </a>
                            </li>
                            <li class="active">
                                Crear Consulta
                            </li>
                        </ol>
                        <div class="page-header">
                            <h1> Crear Consulta </h1>
                        </div>
                        <!-- end: PAGE TITLE & BREADCRUMB -->
                    	</div>
                	</div>
					<!-- end: PAGE HEADER -->
                     <!-- start: Modal -->
                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
                         <div class="modal-dialog">
                               <div class="modal-content">
                               	<div class="panel panel-default">
								<div class="panel-body buttons-widget">
                               		<div class="row">
                                    	<div class="col-md-12">
                                              <h2><i class="fa fa-pencil-square teal">
                                              	</i> Enfermedades </h2>
                                              <hr>
                                              <div class="row">
                                              	<div class="col-md-12">
                                                  	<div class="table-responsive" id="grid">
													  	<?php 
                                                          $grid = $obj_cls->MET_llenaGridConsultaEnfermedad();
                                                          echo $grid;
                                                      	?>											
                                                  	</div>
                                                 </div>
                                              </div>
                                              
                                              <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div>
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="modal-footer">
          <button aria-hidden="true" data-dismiss="modal" class="btn btn-default">
                  Cerrar
          </button>
                                                                        </div>
                                                                    </div>
                                                                    
                                        </div>
                                    </div>
                               </div>
                               </div>
                     </div>
                          </div>
                     </div>
                     <!-- end: Modal -->
                    <!-- start: PAGE CONTENT -->
					<div class="row" style="width:95%; margin-left:2.5%">
						<div class="col-sm-12">
							<div class="tabbable">
								<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
									<li class="active">
										<a data-toggle="tab" href="#panel_datos_consulta">
											Datos de la Consulta
										</a>
									</li>
                                    <li>
										<a data-toggle="tab" href="#panel_datos_paciente">
											Datos del Paciente
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#panel_enfermedades">
											Enfermedades
										</a>
									</li>
								</ul>
                                 <form id="form" enctype="multipart/form-data" >
								<div class="tab-content">
                               
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="errorHandler alert alert-danger no-display">
                                                   <i class="fa fa-times-sign"></i>
                                                   <div id="mensaje_error">
                                                   		Ud tiene algunos errores de ingreso. Por Favor verificar.
                                                   </div>
                                                </div>
												<div class="successHandler alert alert-success no-display">
													<i class="fa fa-ok"></i>
                                                    <div id="mensaje_correcto">
                                                    	Formulario Validado con Éxito!!
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                    
                                    <div id="panel_datos_consulta" class="tab-pane in active">
                                    	<div class="panel panel-default">
											<div class="panel-body">
												<div class="space12">
                                    	            <div class="form-group">
                                                    	<div class="row">
                                                  			<div class="col-md-6">
                                                            	<div class="row">
                                                                     <div class="col-md-5">
                                                                        <div class="form-group">
                                                                            <label class="control-label">
                                                                                Código:
                                                                            </label>
                                                                            <input type="text" class="form-control" id="txt_cod_consulta" name="txt_cod_consulta" disabled>
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                                
                                                                <div class="form-group">    
                                                                    <label class="control-label">
                                                                        Doctor: <span class="symbol required"></span>
                                                                    </label>
                                                <select id="cbx_doctor" name="combo" class="form-control search-select">
                                                       <option value='0' selected="selected" >Selecciona una Opción</option>
                                  <?php 
                                        $combo = $obj_met->MET_llena_combo("dr_doctor", "id", "concat(apellidos,' ',nombres) as descripcion", "and estado!='E'","descripcion");
                                        echo $combo;
                                  ?>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                            	<div class="row">
                                                                     <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                                <label for="form-field-mask-1">
                                                                                                    Fecha: <span class="symbol required"> </span>
                                                                                                </label>
                                                                                                <div class="input-group">
                                                <input id="txt_fecha" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="fecha_entrada" class="form-control date-picker" value="<?php echo $fecha_hoy; ?>" readonly>
                                                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                            </div>
                                                                                            </div>
                                                                     </div>                                                                 </div>    
                                                                     
                                                                 <div class="row">    	
                                                                      <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                        <label for="form-field-mask-1">
                                                                                            Hora: <span class="symbol required"> </span>
                                                                                        </label>
                                                                                       <div class="input-group input-append bootstrap-timepicker">
										<input type="text" name="hora" class="form-control time-picker" id="txt_hora" value="<?php echo $hora_actual; ?>" readonly>
										<span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span>
									</div>
                                                                                    </div>
                                                                      </div> 
                                                                 </div>           
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="row">
            												<div class="col-md-12">
                                           						<div class="form-group">
                                           							<label for="form-field-mask-2">
                                                       					Motivo de la Consulta: <span class="symbol required">
                                                    				</label>
                                    							<textarea name="motivo" id="txt_motivo" rows="5" data-original-title="Motivo" class="form-control tooltips"></textarea>
                                    							</div>
                                                			</div>
                                                        </div>
                                                		
                                                        <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div>
                                                                                <span class="symbol required"></span> Campos Requeridos
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                                                                                        
                                                                    <div class="row">
                                                                        <div class="modal-footer">
                                                                            <button aria-hidden="true" data-dismiss="modal" class="btn btn-default" onClick="limpiar_form1();">
                                                                                Cancelar
           
                                                                            </button>
                                                                            
           <button id="btn_guardar_ordentrabajo" class="btn btn-default" type="submit">
                  Guardar<i class="fa fa-arrow-circle-right"></i>
          </button>
          
                                                                        </div>
                                                                    </div>
                                                                    
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
									<div id="panel_datos_paciente" class="tab-pane">
                                    	<div class="panel panel-default">
											<div class="panel-body">
												<div class="space12">
                                    	            <div class="form-group">
                                    					<div class="row">
                                                  			<div class="col-md-6">
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                            <div class="form-group">
                                                                            <label class="control-label">
                                                                                Código:
                                                                            </label>
                                                                            <input type="text" class="form-control" id="txt_cod_paciente" name="txt_cod_paciente" disabled>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                                    <label for="form-field-mask-1">
                                                                                        Cédula: <span class="symbol required"></span>
                                                                                    </label>
                                                                                        <input type="text" placeholder="Cédula" id="txt_cedula" name="cedula" maxlength="10" class="form-control">
                                                                                      
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                
                                                                        <div class="form-group">
                                                                            <label class="control-label">
                                                                                Apellidos: <span class="symbol required"></span>
                                                                            </label>
                                                                            <input type="text" placeholder="Ingrese sus Apellidos" class="form-control" id="txt_apellido" name="apellido">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">
                                                                                Nombres: <span class="symbol required"></span>
                                                                            </label>
                                                                            <input type="text" placeholder="Ingrese sus Nombres" class="form-control" id="txt_nombre" name="nombre">
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label class="control-label">
                                                                                Dirección: <span class="symbol required"></span>
                                                                            </label>
                                                                            <input type="text" placeholder="Ingrese su Dirección" class="form-control" id="txt_direccion" name="direccion">
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label class="control-label">
                                                                                E-mail: <span class="symbol required"></span>
                                                                            </label>
                                                                            <input type="email" placeholder="E-mail" class="form-control" id="txt_email" name="email">
                                                                        </div>
                                                                        
                                                                        <div class="form-group">    
                                                                            <label class="control-label">
                                                                                Género: <span class="symbol required"></span>
                                                                            </label>
                                                                            <select id="cbx_genero" name="combo" class="form-control search-select">
                                                                             <option value='0' selected="selected" >Selecciona una Opción</option>
                                                                                                            <?php 
                                        $combo = $obj_met->MET_llena_combo("adm_genero", "id", "descripcion", "","descripcion");
                                        echo $combo;
                                  ?>
                                                                                                        </select>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">    
                                                                             <label class="control-label">
                                                                                Estado Civil: <span class="symbol required"></span>
                                                                            </label>
                                                                            <select id="cbx_estado_civil" name="combo2" class="form-control search-select">
                                                                             <option value='0' selected="selected" >Selecciona una Opción</option>
                                 <?php 
   $combo = $obj_met->MET_llena_combo("adm_estado_civil", "id", "descripcion", "","descripcion");
                                        echo $combo;
                                  ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">    
                                                                             <label class="control-label">
                                                                                Instrucción: <span class="symbol required"></span>
                                                                            </label>
                                                                            <select id="cbx_instruccion" name="combo2" class="form-control search-select">
                                                                             <option value='0' selected="selected" >Selecciona una Opción</option>
                                 <?php 
   $combo = $obj_met->MET_llena_combo("adm_instruccion", "id", "descripcion", "","descripcion");
                                        echo $combo;
                                  ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                 </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                                                                                          <div class="row">
                                                                            <div class="col-md-8">
                                                                            	
                                                                                <div class="form-group">    
                                                                             <label class="control-label">
                                                                                Tipo Sangre: <span class="symbol required"></span>
                                                                            </label>
                                                                            <select id="cbx_tipo_sangre" name="combo3" class="form-control search-select">
						<option value='0' selected="selected" >Selecciona una Opción</option>
                    			<?php 
           $combo = $obj_met->MET_llena_combo("adm_tipo_sangre", "id", "descripcion", "","descripcion");
                                        echo $combo;
                                  ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                                <div class="form-group">
                                                                            <label for="form-field-mask-2">
                                                                                Teléfono: <small class="text-warning">(999) 999-9999</small>
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
<input type="text" id="txt_telefono_1" name="txt_telefono_1" class="form-control input-mask-phone">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form-field-mask-2">
                                                                                Celular: <small class="text-warning">(999) 999-9999</small>
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
<input type="text" id="txt_telefono_2" class="form-control input-mask-celphone" name="txt_telefono_2">
                                                                            </div>
                                                                        </div>
                                                                                                                                            
                                                                      </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                        	<div class="col-md-8">
                                                                            	<div class="form-group">
                                                                            <label for="form-field-mask-1">
                                                                                Fecha Nacimiento: <span class="symbol required"> </span>
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <input id="txt_fecha_nac" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="fecha_nacimiento" class="form-control date-picker" readonly onChange="calcula_edad(this.value)">
                                                                                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                                                            </div>
                                                                        		</div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                            	<div class="form-group">
                                                                                		<label class="control-label">
                                                                                Edad: <span class="symbol required"></span>
                                                                            </label>
                                                                            <input type="text" class="form-control" id="txt_edad" name="edad" disabled>
                                                                                </div>
                                                                            </div>
                                                                     	</div>
                                                                     
                                                                        <div class="form-group">    
                                                                             <label class="control-label">
                                                                                Area: <span class="symbol required"></span>
                                                                            </label>
                                                <select id="cbx_area" name="combo1" class="form-control search-select" onChange="carga_cargo_ajax(this.value, 0)">                            
                                                 <option value='0' selected="selected" >Selecciona una Opción</option>
                                                                                <?php 
            $combo = $obj_met->MET_llena_combo("adm_area", "id", "descripcion", "","descripcion");
            echo $combo;
      ?>
                                                                            </select>
                                                                        </div>
                                                                             
                                                                        <div class="form-group">    
                                                                             <label class="control-label">
                                                                                Cargo: <span class="symbol required"></span>
                                                                            </label>
                                                                            <div id="combo_cargo">
                                                                            	<select id="cbx_cargo" name="combo4" class="form-control search-select">
                          <option value='0' selected="selected">Selecciona una Opción</option>
                          
                                                                                        </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                         <label class="control-label">
                                                                                &nbsp;
                                                                            </label>
                                                                        </div> 
                                                                        <div class="form-group">
                                              <label class="checkbox-inline">
					<input type="checkbox" value="" name="chk_1" class="grey" id="chk_discapacidad">
																					Discapacidad
																				</label>
                                              <label class="checkbox-inline">
                    <input type="checkbox" id="chk_embarazo" name "chk_2" value="1" class="grey">
                                                                               Embarazo 
                                                                            </label>
                                              <label class="checkbox-inline">
                    <input type="checkbox" id="chk_tercera_edad" name "chk_3" value="1" class="grey" disabled>
                                                                               Tercera Edad 
                                                                            </label>
                                                                            <label class="checkbox-inline">
					<input type="checkbox" value="" name="chk_4" class="grey" id="chk_afiliado">
																					Afiliado
																				</label>
                                                                            
                                                                        </div>
                                                     <div class="form-group" id="slide_discapacidad">
                                                     	% Discapacidad
                                                     		<div class="slider_porc"></div>													
                                                      </div>	
                                                      
                                                      <div class="form-group" id="desc_discapacidad"> 
                                                      	<input type="text" placeholder="Descripción Discapacidad" class="form-control" id="txt_descripcion_discapacidad" name="descripcion_discapacidad">
                                                      </div>			                                                                           
                                                                            </div>
                                                                        </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div>
                                                                                                                                                      <hr>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                       </div>
                                                  </div>
                                              </div>
                                         </div>
                                    </div>
                                    
                                    <div id="panel_enfermedades" class="tab-pane">
                                    	<div class="row">
						<div class="col-sm-12">
							<!-- start: BLOCK BUTTONS PANEL -->
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="space12">
                                    	<!-- start: BLOCK SEARCH COMBO PANEL -->
                                        <div class="form-group">
                                            <div class="row">
                                                <!-- start: BLOCK SEARCH COMBO PANEL -->
                                                <div class="col-md-12">
                                                    <div class="form-group connected-group">
                                                    	
                                                      <div class="row">
                                                           <div class="col-md-12">                                                                                                                       
                                                            
                                                            <div class="col-md-1">
                                                            <div class="form-group">
                                                             <label class="control-label">
                                                                                   &nbsp;
                                                                                </label>
											<a data-toggle="modal" class="btn btn-info" role="button" href="#myModal1"><i class="clip-user-5"></i>
                                                Agregar
                                            </a>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        	</div>
                                                    </div>  
                                                </div>
                                                <!-- end: BLOCK SEARCH COMBO PANEL -->
                                            </div>
                                        </div>    
                                    	<!-- end: BLOCK SEARCH COMBO PANEL -->
										<!-- start: BLOCK DETAILS PRODUCTS PANEL -->
                                    	<div class="table-responsive" id="grid_detalle_enfermedad">
                                            <table class="table table-striped table-hover" id="sample-table-2">
                                                <thead>
                                                    <tr>
                                                        <th style="width:100px">Eliminar</th>
                                                        <th style="width:60px">Id</th>
                                                        <th style="width:80px">Codigo</th>
                                                        <th>Descripción</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                       
                                                </tbody>
                                            </table>
                                        </div>	
                                    <!-- end: BLOCK DETAILS PRODUCTS PANEL -->
								  	</div>
								</div>
							</div>
							<!-- end: BLOCK BUTTONS PANEL -->
						</div>
					</div>
                                    </div>
                                    
                               </div>
                            	</form>
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
        <script src="../../../assets/plugins/ladda-bootstrap/dist/spin.min.js"></script>
        <script src="../../../assets/plugins/ladda-bootstrap/dist/ladda.min.js"></script>
        <script src="../../../assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
        <script src="../../../assets/js/ui-buttons.js"></script>
        
        <script type="text/javascript" src="../../../assets/plugins/select2/select2.min.js"></script>
		
        <script src="../../../assets/plugins/bootbox/bootbox.min.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>								        <script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>

		<script src="../../../assets/plugins/tableExport/tableExport.js"></script>
		<script src="../../../assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="../../../assets/plugins/tableExport/html2canvas.js"></script>
		<script src="../../../assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="../../../assets/plugins/tableExport/jspdf/libs/sprintf.js"></script>
		<script src="../../../assets/plugins/tableExport/jspdf/jspdf.js"></script>
		<script src="../../../assets/plugins/tableExport/jspdf/libs/base64.js"></script>
        
        
		<script type="text/javascript" src="../../../assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../../../assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
        
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<script type="text/javascript" src="../../../js/jquery-ui-slider-pips.js"></script>
        
        <script src="../../../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../../../assets/js/form-validation.js"></script>
        
        <script src="../../../assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="../../../assets/plugins/autosize/jquery.autosize.min.js"></script>
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
    
		<script src="../../../assets/js/consulta_detalles.js"></script>
  
 		 <script type="text/javascript" src="../js/ajax_consulta.js"></script>		
		<!-- InstanceEndEditable -->
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- InstanceBeginEditable name="ready js" -->
	<script>
			jQuery(document).ready(function() {
				Main.init();				
				FormElements.init();
				FormValidator.init();
				TableExport.init();	
			});
			
			var id_paciente=<?php echo $id_paciente; ?>;
			var id_consulta=<?php echo $id_consulta; ?>;
		
			if(id_paciente!==0){
				consultar_registro_paciente(id_paciente);			
			}
			
			if(id_consulta!==0){
				consultar_registro(id_consulta);	
				carga_grid_detalle_ajax(id_consulta);			
			}
			
		</script>
        
	<!-- InstanceEndEditable -->
</body>
	<!-- end: BODY -->

<!-- InstanceEnd --></html>
          
