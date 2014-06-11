<?php
class UsersController extends Controller{

	function actionIndex(){
		$model = new Users();
		$dataUsers = $model->getUsers();
		$var['title'] = 'Daftar Users';
		$var['dataUsers']= $dataUsers;
		$this->render('listing',$var);
	}
	function actionForm(){
		$id = $_GET['id'];
		if($id!=''){
			$model = new Users();
			$data=$model->findByPk($id);
			$var['data'] = $data;
		}
		$this->render('form',$var);
	}
        function actionLogout(){
            $this->redirect(BASE_URL.'/login');
        }
	function actionSave(){
		$model = new Users();
		$paramId = $_POST['id'];
		if($paramId!=''){
			$id ="username='$paramId'";		
		}		
                $_POST['password'] = md5($_POST['password']);
		$model->save($_POST,$id);	
		$this->redirect(BASE_URL.'/Users/index');
	}
public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
		);
	}
	function actionDelete(){
		$id = $_GET['id'];
		$model = new Users();
		$post= $model->findByPk($id);
		$post->delete();
		$this->redirect(BASE_URL.'/Users/index');
	}
	function actionPdf(){
		$model = new Users();
		$title ='Users';
		$dataUsers = $model->getUsers();

		$pdf = Yii::createComponent('application.vendors.tcpdf.tcpdf','P', 'cm', 'A4', true, 'UTF-8');
			
		$pdf->SetTitle($title);
		$pdf->SetSubject($title);
		$pdf->SetKeywords($title);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);		
		$pdf->AddPage();		
		$pdf->SetFont("helvetica", null, 15);
		
		$html='<h2>Daftar '.$title.'</h2>';
		$html .='<table border="1" cellpadding="3">';
		$html .='<tr><th width="30">No</th><th>Username</th></tr>';
		foreach($dataUsers as $key=> $each){
		$html .='<tr><td width="30">'.($key+1).'</td><td>'.$each['username'].'</td></tr>';	
		}
		$html .='</table>';
		
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output();
		
	}
	function actionExcel(){
		$model = new Users();
		$var['dataUsers'] = $model->getUsers();
		$this->render('excel',$var);

	}

}