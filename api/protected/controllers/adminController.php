<?php
class AdminController extends Controller{

	function actionIndex(){
		$model = new Admin();
		
		$dataAdmin = $model->getAdmin();
                
		$var['title'] = 'Daftar Admin';
		$var['dataUsers']= $dataAdmin;
		
		$this->render('listing',$var);
	}
	function actionForm(){
		

		$id = $_GET['id'];
		if($id!=''){
			$model = new Admin();
                        $params['conditions'] =" AND user_id ='$id'";
                        $params['method'] =true;
			$data=$model->getAdmin($params);
                        
			$var['data'] = $data;
		}
		
		$this->render('form',$var);
	}
	
	
	function actionSave(){
		$model = new Admin();
                $id = $_POST['id'];
		$dataAdmin = array('username'=>$_POST['username'],'level'=>$_POST['level'],
		'password'=>md5($_POST['password']),'privilege'=>1);
                
                $model->save($dataAdmin,$id);
		$this->redirect(BASE_URL.'/Admin/index');
	}
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
		);
	}
	function actionDelete(){
		$id = $_GET['id'];
		$model = new Admin();                
		$post= $model->delete($id);
		
		$this->redirect(BASE_URL.'/Admin/index');
	}
	function actionPdfTransaction(){
		$id_Admin = $_GET['id'];
		$model = new Admin();
		$penyewa = new Penyewa();
		$peralatan = new Peralatan();
		$title ='Penyewaan';
		$params['conditions'] = " and id_Admin='$id_Admin'";
		$params['method']='row';
		$dataAdmin = $model->getAdmin($params);
		$dataAdminDetail = $model->getAdminDetail($params);
		$pdf = Yii::createComponent('application.vendors.tcpdf.tcpdf','P', 'cm', 'A4', true, 'UTF-8');
			
		$pdf->SetTitle($title);
		$pdf->SetSubject($title);
		$pdf->SetKeywords($title);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();
		$pdf->SetFont("helvetica", null, 15);

		$html='<h2>Transaksi '.$title.'</h2>';
		$html .='<table><tr ><td width="80">Nama</td><td width="20">:</td><td>'.$penyewa->getNamaPenyewa($dataAdmin['id_penyewa']).'</td></tr>';
		$html .='<tr><td>Tanggal</td><td>:</td><td>'.date('d F Y',strtotime($dataAdmin['tanggal'])).'</td></tr></table>';
		$html .='<br/><br/><br/>';
		$html .='<table border="1" cellpadding="3">';
		$html .='<tr><th width="30">No</th><th>Nama Barang</th>';
		$html .='<th>qty</th><th>Harga Satuan</th><th>Harga</th></tr>';
		$total = 0;
		foreach($dataAdminDetail as $key=> $each){
			$dataPeralatan = $peralatan->getRowPeralatan($each['kode_barang']);
			$subtotal = $dataPeralatan['harga_Admin'] * $each['qty'];
			$html .='<tr><td width="30">'.($key+1).'</td>';
			$html .='<td>'.$dataPeralatan['nama_barang'].'</td>';
			$html .='<td>'.$each['qty'].'</td>';
			$html .='<td align="right">'.$dataPeralatan['harga_Admin'].'</td>';
			$html .='<td align="right">'.$subtotal.'</td></tr>';
			$total += $subtotal;
		}
		$html .='<tr><td align="right" colspan="4">Total</td><td align="right">'.$total.'</td></tr>';
		$html .='<tr><td align="right" colspan="4">Pembayaran</td><td align="right">'.$model->getPembayaran($each['id_Admin']).'</td></tr>';
		$html .='</table>';

		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output();

	}
	function actionPdf(){
		$model = new Admin();
		$penyewa = new Penyewa();
		$title ='Penyewaan';
		$dataAdmin = $model->getAdmin();
		$dataPenyewa = $penyewa->getPenyewa();
                
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
		$html .='<tr><th width="30">No</th><th>Tanggal</th><th>Nama Penyewa</th>';
		$html .='<th>Total</th></tr>';
		foreach($dataAdmin as $key=> $each){
			$html .='<tr><td width="30">'.($key+1).'</td><td>'.date('d F Y',strtotime($each['tanggal'])).'</td>';
			$html .='<td>'.$penyewa->getNamaPenyewa($each['id_penyewa']).'</td>';
			$html .='<td>'.$each['total'].'</td></tr>';
		}
		$html .='</table>';

		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output();

	}
	function actionExcel(){
		$model = new Admin();
		$var['penyewa'] = new Penyewa();
		$var['dataAdmin'] = $model->getAdmin();

		$this->render('excel',$var);

	}

}