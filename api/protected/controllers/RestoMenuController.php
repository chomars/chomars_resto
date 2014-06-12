<?php
class RestoMenuController extends Controller{

	function actionIndex(){
		$model = new RestoMenu();
		$dataResto = $model->getRestoMenu();
		$var['title'] = 'Daftar Resto';
		$var['dataResto']= $dataResto;
		echo json_encode($dataResto);
	//	$this->render('listing',$var);
	}
	function actionForm(){
		$id = $_GET['id'];
		if($id!=''){
			$model = new RestoMenu();
			$data=$model->findByPk($id);
			$var['data'] = $data;
		}
		$this->render('form',$var);
	}
	function actionSave(){
		$model = new RestoMenu();
		$paramId = $_POST['id'];
		$restoId = (int)$_POST['resto_id'];
		$resto_menu_name = addslashes($resto_menu_name);
		$rate = $_POST['rate'];
		$foodCategoryId = (int)$_POST['food_category_id'];
		$data = array('resto_id','resto_menu_name'=>$resto_menu_name,'rate'=>$rate,'food_category_id'=>$foodCategoryId);
		if($paramId!=''){
			$id ="id='$paramId'";		
		}		
	
		$model->save($_POST,$id);	
		
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