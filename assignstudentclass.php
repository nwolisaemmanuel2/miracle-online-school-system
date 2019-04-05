<?php include("include/session.php");?>
<?php include("include/function.php");?>
<?php include("include/dbconnection.php");?>
<?php
	if($_SESSION["sid"] == ""){
		redirect_to("login.php");
	}else{
	 $sid = $_SESSION["sid"];
	 $image = userimage($sid);
	}

	$ayid = getactiveacademicyear();
	
	if(empty($_GET["adminno"])){
		redirect_to("newadmission.php");
	}else{
		$adminno = $_GET["adminno"];
		$adminno = trim($adminno);
		$adminno = (int) $adminno;
		if(adminnoexisttwo($adminno,$ayid)){
			if(hasstudentno($adminno)){
			 redirect_to("newadmission.php");
			}else{
			 $newstudent = newstudentdetail($adminno);
			}
		}else{
		 redirect_to("newadmission.php");
		}
	}
	$school = schooldetail();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wrappixel.com/demos/admin-templates/admin-wrap/dark/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 04 Mar 2018 23:42:29 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>THE MIRACLE</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard1.css" rel="stylesheet">
	<!-- Date picker plugins css -->
    <link href="assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">LIBERATE</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include('headerone.php'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
					<?php include("nav.php"); ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard 1</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">ADMISSIONS</li>
                        </ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- End Sales Chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Projects of the Month -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Projects of the Month -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Comment - chats -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
				<div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">STUDENT ADMISSION</h3>
                            <p class="text-muted m-b-30 font-13"> Personal Information </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form id="frmstudentclass">
										<input type="hidden" id="slevel" value="<?php echo $newstudent["stadmittedlevel"]; ?>">
										<div class="form-group">
                                            <label for="exampleInputEmail1">Admission Number</label>
                                            <input type="text" class="form-control" id="admissionno" name="admissionno" value="<?php echo $adminno; ?>" maxlength="10"  readonly>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Admitted Level:</label>
                                            <select class="form-control" id="admitlevel" name="admitlevel" required>
												<option value="">Select Level</option>
												<?php $levellist = classlevellist();?>
												<?php while($level = mysqli_fetch_assoc($levellist)){ ?>
													<option value="<?php echo $level["levelid"];?>"><?php echo $level["leveldescription"];?></option>
												<?php } ?>
											</select>
                                        </div>
										 <div class="form-group">
                                            <label for="exampleInputEmail1">Admitted Class :</label>
                                            <select class="form-control" id="admitclass" name="admitclass" required>
												<option value="">Select Class</option>
												<?php $levelclassresult = getlevelclass($newstudent["stadmittedlevel"]);?>
												<?php while($lclass = mysqli_fetch_assoc($levelclassresult)){ ?>
													<option value="<?php echo $lclass["classesid"];?>"><?php echo $lclass["classesname"];?></option>
												<?php } ?>
											</select>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputEmail1">Student Number</label>
                                            <input type="text" class="form-control" id="studentno" name="studentno" placeholder="Loading ..." required readonly>
                                        </div>
										 <div class="form-group">
                                            <label for="exampleInputEmail1">Sub Class :</label>
                                            <select class="form-control" id="subclass" name="subclass" required>
												<option value="">Loading Sub Classes ...</option>
											</select>
                                        </div>
										
										 <div class="form-group">
                                            <label for="exampleInputEmail1">Student House </label>
                                           <select class="form-control" id="studenthouse" name="studenthouse" required>
												<option value="">Select House</option>
												<?php $houseresult = houselist(); ?>
												<?php while($house = mysqli_fetch_assoc($houseresult)){?>
													<option value="<?php echo $house["hid"]; ?>"><?php echo $house["hname"]." [".housemember($house["hid"])."]";?></option>
												<?php }?>
											</select>
                                        </div>
										
										 
									<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme working">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2018 Liberate I.T Solutions. All Right Reserved  </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/node_modules/d3/d3.min.js"></script>
    <script src="assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Popup message jquery -->
    <script src="assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <!-- ============================================================== -->
	<!-- This is data table -->
    <script src="assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
	<!-- Date Picker Plugin JavaScript -->
    <script src="assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- end - This is for export functionality only -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
   
</body>
    <script>
	
	
	$('#frmstudentclass').submit(function(){
		$.ajax({
			url : 'php/student/assignstudentclass.php',
			type : 'POST',
			data : new FormData(this),
			contentType: false,
			processData : false,
			success : function(data){
				switch(Number(data)){
					case 1:
					alert("Sorry, There are Form Erros.");
					break ;
					case 2:
					alert("Student Class Registration Failed. Report to Admin.");
					break;
					case 3:
					alert("Student Class Registration Successful.");
					window.location = "newadmission.php";
					break;
					case 4:
					alert("Not Letter is Identified for the Selected Classs.");
					break;
					case 5:
					alert("Duplicate Stuedent Number.");
					window.location = "newadmission.php";
					break;
					default:
					alert("Sorry, Fatal error occured, report to your admin.");
				}
			}
		});
		return false;
	});

function setlevelclass(levelid){
	$.ajax({
		url : 'php/configuration/levelclassprocess.php',
		type : 'POST',
		data : {levelid : levelid},
		success : function(data){
			$.each(data,function(i,item){
				//
				$("#admitclass").append("<option value='"+data[i].classid+"'>"+data[i].classname+"</option>");
			});
		}
	});
}

function setsubclas(classesid){
	$.ajax({
		url : 'php/configuration/subclassprocess.php',
		type : 'POST',
		data : {classesid : classesid},
		success : function(data){
			$.each(data,function(i,item){
				
				$("#subclass").append("<option value='"+data[i].classid+"'>"+data[i].classname+"</option>");
			});
		}
	});
}
	
$("#admitlevel").change(function(){
$("#admitclass").empty();
$("#studentno").val("");
	
	var levelid = $(this).val();
	if(levelid == ""){
	 $("#admitclass").append("<option value=''>Loading Classes ...</option>");
	}else{
	 $("#admitclass").append("<option value=''>Select Class</option>");
	}
	setlevelclass(levelid);
});

$("#admitclass").change(function(){
	$("#subclass").empty();
	
	var classid = $(this).val();
	if(classid == ""){
	  $("#subclass").append("<option value=''>Loading Sub Classes ...</option>");
	  $("#studentno").val("");
	}else{
		$("#subclass").append("<option value=''>Select Sub Class</option>");
	 setstudentno(classid);
	 setsubclas(classid);
	}
});

function setstudentno(classid){
$.ajax({
	url : "php/configuration/studentnumberprocess.php",
	type : "POST",
	data : {classid : classid},
	success : function(data){
	 $("#studentno").val(data);
	}
});
}

$(document).ready(function(){
	var slevel = $("#slevel").val();
	$("#admitlevel").val(slevel);
});

    $(function() {
        $('#myTable').DataTable();

        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });

    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	
	 // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    </script>
 <script src="assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
<!-- Mirrored from wrappixel.com/demos/admin-templates/admin-wrap/dark/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 04 Mar 2018 23:48:48 GMT -->
</html>