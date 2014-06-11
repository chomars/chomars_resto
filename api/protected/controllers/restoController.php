<?php
class RestoController extends Controller{

	function actionIndex(){
		$model = new Resto();
		$dataResto = $model->getResto();
		$var['title'] = 'Daftar Resto';
		$var['dataResto']= $dataResto;
		echo json_encode($dataResto);
	//	$this->render('listing',$var);
	}
	function actionForm(){
		$id = $_GET['id'];
		if($id!=''){
			$model = new Resto();
			$data=$model->findByPk($id);
			$var['data'] = $data;
		}
		$this->render('form',$var);
	}
	function actionSave(){
		$model = new Resto();
		$paramId = $_POST['id'];
		if($paramId!=''){
			$id ="id='$paramId'";		
		}		
	
		$model->save($_POST,$id);	
		$this->redirect(BASE_URL.'/Resto/index');
	}
public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
		);
	}
	function actionDelete(){
		$id = $_GET['id'];
		$model = new Resto();
		$post= $model->findByPk($id);
		$post->delete();
		$this->redirect(BASE_URL.'/Resto/index');
	}
	

}