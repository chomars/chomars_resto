<?php
class RestaurantController extends Controller{

	function actionIndex(){
		
		$model = new Resto();
		$dataResto = $model->getResto();
		$var['title'] = 'Daftar Resto';
		$var['dataResto']= $dataResto;
	
		$this->render('listing',$var);
	}
	function actionForm(){
		$id = $_GET['id'];
		if($id!=''){
			$model = new Resto();
			$data=$model->findByPk($id);
			$var['data'] = $data;
		}
		$m_category = new Category();
		$m_type = new Type();
		$var['CategoryData'] = $m_category->getcategories();
		$var['TypeData'] = $m_type->getTypeData();
		$this->render('form',$var);
	}
	function actionBranch(){
		$id = $_GET['id'];
		
		$m_category = new Category();
		$m_type = new Type();
		$m_resto = new Resto();
		$dataResto = $m_resto->getRowResto($id);
		$params['conditions'] = " and resto_id = $id";
		$dataBranchResto = $m_resto->getBranchResto($params);
		$var['title'] = 'Daftar Resto';
		$var['dataResto']= $dataResto;
		$var['dataBranchResto'] = $dataBranchResto;
		$var['CategoryData'] = $m_category->getcategories();
		$var['TypeData'] = $m_type->getTypeData();
		$this->render('branch',$var);
	}
	function actionBranchForm(){
		$id = $_GET['id'];
		
		$m_category = new Category();
		$m_type = new Type();
		$m_resto = new Resto();
		$dataResto = $m_resto->getRowResto($id);
		$params['conditions'] = " and resto_id = $id";
		$dataBranchResto = $m_resto->getBranchResto($params);
		$var['title'] = 'Daftar Resto';
		$var['dataResto']= $dataResto;
		$var['dataBranchResto'] = $dataBranchResto;
		$var['CategoryData'] = $m_category->getcategories();
		$var['TypeData'] = $m_type->getTypeData();
		$this->render('branch_form',$var);
	}
	function actionSave(){
		$model = new Resto();
		$paramId = $_POST['resto_id'];
		$_POST['input_date'] = date("Y-m-d H:i:s");
		if($paramId!=''){
			$id ="resto_id='$paramId'";		
		}		
	
		$model->save($_POST,$id);	
		$this->redirect(BASE_URL.'/restaurant/index');
	}
	function actionBranchSave(){
		$model = new Resto();
		$restoID = $_POST['resto_id'];
		if($paramId!=''){
			$id ="resto_branch_id='$paramId'";		
		}		
	
		$model->saveBranch($_POST,$id);	
		$this->redirect(BASE_URL.'/restaurant/branch/'.$restoID);
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
		$this->redirect(BASE_URL.'/restaurant/index');
	}
	

}