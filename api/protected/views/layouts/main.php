<?php 
if(Yii::app()->session['username']=='')
die('not authorize');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/assets/lib/jqueryui/cupertino/jquery-ui-1.8.18.custom.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/assets/lib/datatables/media/css/jquery.dataTables_themeroller.css"
	media="screen" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/assets/lib/datatables/media/css/jquery.dataTables.css"
	media="screen" />
<style>.error{color:#ff0000}
#logo { width:100%; height:105px;}
.nav-tabs li a{color:#000;}</style>
<!-- blueprint CSS framework -->

<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->


<script
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/a0b146ca/jquery.min.js"></script>
<script
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/lib/jqueryui/cupertino/jquery-ui-1.8.18.custom.min.js"></script>
<script
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/lib/datatables/media/js/jquery.dataTables.min.js"></script>
<script
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	<script
	src="<?php echo BASE_URL ?>/assets/lib/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
<script>
	$(function(){
		$('.usingDataTable').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers"
		});
		$("form").validate();
		$(".datepicker").datepicker({
			dateFormat:'yy-mm-dd'
			});
	});
	</script>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
        

		
        
		<!-- header -->
		<?php 
                
                $ctrl = Yii::app()->controller->id;?>
		<div class="navbar">
			<div class="navbar-inner">
				<ul class="nav">
					
					<li class="dropdown" <?php echo ($ctrl=='penyewa')?'class="active"':''?>><a 
                                                 class="dropdown-toggle" data-toggle="dropdown"
                                                href="#">File Master <b class="caret"></b></a>
					 <ul class="dropdown-menu">
                                                                    <li><a href="<?php echo BASE_URL.'/siswa'?>">Siswa</a></li>
                                                                    <li><a href="<?php echo BASE_URL.'/pendidik'?>">Pendidik</a></li>
                                                                                                                                        <li><a href="<?php echo BASE_URL.'/kelas'?>">Kelas</a></li>
                                                                                                                                        <li><a href="<?php echo BASE_URL.'/matkul'?>">Mata Pelajaran</a></li>
                                                                 
                                                                </ul>
                                        </li>
					<li class="dropdown" <?php echo ($ctrl=='peralatan')?'class="active"':''?>><a href="#"
                                                 class="dropdown-toggle" data-toggle="dropdown"                                                      
                                                                                                >Transaksi <b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                                    <li><a href="<?php echo BASE_URL.'/nilai'?>">Penilaian</a></li>
                                                                   
                                                                </ul>
					</li>
					
					<li><a href="<?php echo BASE_URL?>/login/logout">Logout</a></li>
					<ul>
			
			</div>

		</div> 
<div class="container-fluid">
		<div id="title">
			<h2>
			<?php // echo $title;?>
			</h2>
		</div>
		<?php $action = $this->action->id;?>
		<div class="row-fluid"  style="padding-LEFT:43px; min-height:400px !important;border-radius:7px;">
			<div class="btn-group" >
				
					<a class="btn"
						href="<?php echo BASE_URL ?>/<?php echo Yii::app()->controller->id;?>/form">Tambah
							Baru</a>
					<a class="btn"
						href="<?php echo BASE_URL ?>/<?php echo Yii::app()->controller->id;?>">Listing</a>
					
                                    <?php if(in_array($ctrl,array('transaksi','rujukan'))){?>
					
                    <form style="padding:5px;" target="_blank" action="<?php echo BASE_URL ?>/<?php echo Yii::app()->controller->id;?>/pdf" method="post">
                    <input style="width:130px" type="text" name="from"  class="datepicker" />
					<input style="width:130px" type="text" name="to"  class="datepicker"/>
                    <input style="margin-bottom:9px" type="submit" name="" class="btn" value="Export to PDF"/>
                    </form>
					
                                    <?php }?>
				
			</div>
			<div class="span10" style="min-height:410px;margin:0!important;padding:0 !important">
			<?php echo $content; ?>
			</div>
		</div>
		<div class="clear"></div>


		<!-- footer -->

	</div>
	<!-- page -->
	<div id="footer"
		style="text-align: center; bottom: 0 !important; margin: 20px; height: 10px; position: relative; ">
	
	</div>
</body>
</html>
