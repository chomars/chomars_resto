<script>
function onSure(){
	if(confirm('anda yakin akan menghapus data ini')){
	return true;
	}else{
	return false;
	}
}
</script>
<div>
	<table class="usingDataTable">
		<thead>
			<tr>
				<th>No.</th>
				<th>No. Penyewaan</th>
				<th>Nama Penyewa</th>
				<th>Tanggal</th>	
                                <th>Bayar</th>
                                <th>Status</th>	
				<th>Action</th>		
			</tr>
		</thead>
		<tbody>
		<?php foreach($dataSewa as $key=> $eachSewa){
                    $labelStatus ='info';
                    $labelText = 'Disewa';
                    $id_sewa = $eachSewa['id_sewa'];
                    $paramsKembali['method'] = 'row';
                    $paramsKembali['join'] = 'inner join kembali using(id_sewa)';
                    $paramsKembali['conditions'] = " AND id_sewa = '$id_sewa'";
                    $iskembali = $kembali->getKembali($paramsKembali);
                    if($iskembali){$labelText='Kembali'; $labelStatus='success';}
                    
                    ?>
			<tr> 
				<td><?php echo ($key+1)?></td>
				<td><?php echo $id_sewa?></td>
				<td><?php echo $Penyewa->getNamaPenyewa($eachSewa['id_penyewa'])?></td>
				<td><?php echo date('d-m-Y',strtotime($eachSewa['tanggal']))?></td>
                                <td><?php echo $model->getPembayaran($eachSewa['id_sewa'])?></td>
                                <td><span class="label label-<?php echo $labelStatus;?>"><?php echo $labelText;?></span></td>
				<td align="center">
				
				<a class="btn btn-small btn-info" title="PDF" target="_blank"
					href="<?php echo BASE_URL?>/Sewa/PdfTransaction/id/<?php echo $eachSewa['id_sewa']?>">
						<i class="icon-print"></i> </a>
				
			</tr>
			<?php  } ?>
		</tbody>
	</table>
</div>
