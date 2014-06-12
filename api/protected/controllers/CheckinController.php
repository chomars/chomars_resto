<?php
class CheckinController extends Controller{

	function actionIndex(){
		$model = new Resto();
		$dataResto = $model->getResto();
		$var['title'] = 'Daftar Resto';
		$var['dataResto']= $dataResto;
		echo json_encode($dataResto);
	//	$this->render('listing',$var);
	}
	
	function actionSave(){
		$model = new Checkin();
		$uid = (int)$_POST['uid'];
		$restoId = (int)$_POST['resto_id'];
		$checkinDate = $_POST['checkin_date'];
		$data = array('user_id'=>$uid,'resto_id'=>$restoId,'checkin_date'=>$checkinDate);

		if($uid!=''){
		$model->save($data,$id);		
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
		$model = new Resto();
		$post= $model->findByPk($id);
		$post->delete();
		$this->redirect(BASE_URL.'/Resto/index');
	}
	

}