<?php
class FoodCategoryController extends Controller{

	function actionIndex(){
		$model = new FoodCategory();
		$FoodCategory = $model->getFoodCategory();		
		
		echo json_encode($FoodCategory);
	//	$this->render('listing',$var);
	}
	
	function actionSave(){
		$model = new FoodCategory();
		$uid = (int)$_POST['uid'];
		$restoId = (int)$_POST['resto_id'];
		$FoodCategoryDate = $_POST['FoodCategory_date'];
		$data = array('user_id'=>$uid,'resto_id'=>$restoId,'FoodCategory_date'=>$FoodCategoryDate);

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