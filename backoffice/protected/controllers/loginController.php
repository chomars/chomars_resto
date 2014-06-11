<?php
class LoginController extends Controller{

	function actionIndex(){		
		$var['title'] = 'Daftar Login';		
		$this->renderPartial('form',$var);
	}
	function actionForm(){
		$id = $_GET['id'];
		if($id!=''){
			$model = new Login();
			$data=$model->findByPk($id);
			$var['data'] = $data;
		}
		$this->render('form',$var);
	}
        function actionLogout(){
            Yii::app()->session->destroy();
            $this->redirect(BASE_URL.'/login/');
        }
	function actionAuth(){
		$model = new Login();
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                if($model->getRowLogin($username,$password)){
                    Yii::app()->session['username'] = $username; 
                    $this->redirect(BASE_URL.'/restaurant');    
                }else{
                $this->redirect(BASE_URL.'/login');    
                }
		
	}
public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
		);
	}
	function actionDelete(){
		$id = $_GET['id'];
		$model = new Login();
		$post= $model->findByPk($id);
		$post->delete();
		$this->redirect(BASE_URL.'/Login/index');
	}
	function actionPdf(){
		$model = new Login();
		$title ='Login';
		$dataLogin = $model->getLogin();

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
		foreach($dataLogin as $key=> $each){
		$html .='<tr><td width="30">'.($key+1).'</td><td>'.$each['username'].'</td></tr>';	
		}
		$html .='</table>';
		
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output();
		
	}
	function actionExcel(){
		$model = new Login();
		$var['dataLogin'] = $model->getLogin();
		$this->render('excel',$var);

	}

}