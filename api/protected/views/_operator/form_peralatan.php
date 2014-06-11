
<table>
<?php 
$total = 0;
for($i=1;$i<=$id;$i++){?>
<tr>
	<td width="200">Peralatan</td>
	<td width="200"><select name="kode_barang[]" id="kode_barang_<?php echo $i;?>" onchange="onItem(this.value,<?php echo $i?>)">
			<option></option>
			<?php foreach($dataPeralatan as $eachPeralatan){?>
			<option value="<?php echo $eachPeralatan['kode_barang']?>">
			<?php echo $eachPeralatan['nama_barang']?>
			</option>
			<?php  }?>
	</select></td>
	<td width="40">Qty</td>
	<td width="90"><input type="text" name="qty[]" onkeyup="onQty(this.value,<?php echo $i?>)" id="qty_<?php echo $i;?>" style="width: 50px;" /></td>
	<td width="140">Harga Sewa</td>
	<td><input type="text" readonly  name="harga_sewa[]" id="harga_sewa_<?php echo $i;?>" style="width: 100px; text-align: right;" />
	</td>
</tr>
<?php } ?>
<tr><td colspan="4"></td><td  >Total</td><td align="right"><input type="text" style="text-align: right; width:100px"  readonly name="total" id="total" value="0"  /></td></tr>
<tr><td colspan="4"></td><td  >Pembayaran</td><td align="right"><input type="text" style="text-align: right; width:100px"  name="bayar" id="bayar" value="0"  /></td></tr>
</table>