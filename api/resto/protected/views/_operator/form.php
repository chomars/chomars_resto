<script>
$(function(){
	$('#detail').load('<?php echo BASE_URL?>/sewa/detail');
});
function tambah(){
	var jum = parseInt($('#detailjum').val());
	if(jum >0){
	jum+=1;
	$('#detailjum').val(jum);
	$('#detail').load('<?php echo BASE_URL?>/sewa/detail/id/'+jum);
	}
	
}
function kurang(){
	var jum = parseInt($('#detailjum').val());
	if(jum >1){
		jum-=1;
		$('#detailjum').val(jum);
		$('#detail').load('<?php echo BASE_URL?>/sewa/detail/id/'+jum);
	}
	
	
}
function onQty(val,id){
	var kd_barang = $('#kode_barang_'+id).val(); 
	var sewa = 0;
	var harga_qty = 0;
	$.ajax({
		url:'<?php echo BASE_URL?>/sewa/peralatan/id/'+kd_barang,
		dataType:'json',
		success:function(data){
			var unit =data[0].harga_sewa;			
			harga_qty = parseInt(unit) * parseInt(val);  
			$('#harga_sewa_'+id).val(harga_qty);
	$('input[id*="harga_sewa"]').each(function(val,key){
		var affix_id = (parseInt(val)+1);
		
		var each_sewa = parseInt($('#harga_sewa_'+affix_id).val()) ;											
		
		if(!isNaN(each_sewa)){		
										
				sewa+= each_sewa;						
				$('#total').val(sewa);
			}
		});
		}	
		})
}
function onItem(val,id){
	
	$.ajax({
			url:'<?php echo BASE_URL?>/sewa/peralatan/id/'+val,
			dataType:'json',
			success:function(data){
				var total = 0;
				var sewa = 0;
					$('#harga_sewa_'+id).val(data[0].harga_sewa);
					$('#qty_'+id).val(1);		
					$('input[id*="harga_sewa"]').each(function(val,key){
						var affix_id = (parseInt(val)+1);		
						var each_sewa = parseInt($('#harga_sewa_'+affix_id).val());											
						if(!isNaN(each_sewa)){										
								sewa+= each_sewa;						
								$('#total').val(sewa);
							}
						});			
				}
		});
}
</script>
<div class="form"
	style="background: #fff; width: 100%; min-height: 400px;">
	<form method="post" action="<?php echo BASE_URL?>/sewa/save/"
		style="padding: 20px;">
		<fieldset>
			<legend> Form Penyewaan </legend>
			<input type="hidden" id="detailjum" value="1" /> <input type="hidden"
				name="kode_barang" value="<?php echo $data['kode_barang']?>" />
			<table>

				<tr>
					<td width="100">Tanggal Hari Ini</td>
					<td width="250"><input readonly style="width: 100px !important;"
						type="text" value="<?php echo date('d F Y')?>" /></td>
				</tr>
				<tr>
					<td>Nama Penyewa</td>
					<td><select name="id_penyewa">
							<option></option>
							<?php foreach($dataPenyewa as $eachPenyewa){?>

							<option value="<?php echo $eachPenyewa['id_penyewa']?>">
							<?php echo $eachPenyewa['nm_penyewa']?>
							</option>

							<?php  }?>
					</select>
					</td>
				</tr>
				<tr>
					<td width="200">
						<div class="btn-group">
							<button onclick="tambah();return false;" class="btn btn-success">Tambah</button>
							<button onclick="kurang();return false;" class="btn btn-danger">Kurangi</button>
						</div></td>
					<td width="250"></td>
				</tr>
				<tr>
					<td colspan="7" width="700" id="detail"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn" name="save" value="Simpan" />
						<input type="reset" class="btn" name="save" value="Reset" />
					</td>
				</tr>
			</table>
		</fieldset>

	</form>
</div>
