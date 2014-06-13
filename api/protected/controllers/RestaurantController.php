<?php
class RestaurantController extends Controller{

	function actionIndex(){

		$VERSION = '1.0';
		$model = new Resto();
		$auth = new Auth();
		$client_code = 'clientcode';
		//echo $auth->isAuth($client_code);
		$dataResto = $model->getResto();
		$output = array("collection"=>array("versions"=>$VERSION,'items'=>$dataResto));

		echo json_encode($output);
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