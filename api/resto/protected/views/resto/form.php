<div class="form" style="background: #fff; width: 100%; min-height:400px;">
	<form method="post" action="<?php echo BASE_URL?>/Bayi/save/"
		style="padding: 20px;">
		<fieldset>
			<legend> Form Bayi </legend>
			<input type="hidden" name="id"
				value="<?php echo $data['id']?>" />
			<table>
				<tr>
					<td>Nama Bayi</td>
					<td><input type="text" name="nama"
						title="nama harus di isi" class="required"
						value="<?php echo $data['nama']?>" />
					</td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td><input size="5"  style="width:50px !important;" type="text" title="tempat_lahir harus di isi" class="required"
						name="tempat_lahir" value="<?php echo $data['tempat_lahir']?>" />
					</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td><input title="tgl_lahir harus di isi"  style="width:100px !important;" class="required"
						type="text" name="tgl_lahir"
						value="<?php echo $data['tgl_lahir']?>" />
					</td>
				</tr>
				<tr>
					<td>ayah</td>
					<td><input title="ayah harus di isi"  style="width:100px !important;" class="required"
						type="text" name="ayah"
						value="<?php echo $data['ayah']?>" />
					</td>
				</tr>
                                
				<tr>
					<td>ibu</td>
					<td><input title="ibu harus di isi"  style="width:100px !important;" class="required"
						type="text" name="ibu"
						value="<?php echo $data['ibu']?>" />
					</td>
				</tr>
				<tr>
					<td>berat</td>
					<td><input title="berat  harus di isi"  style="width:100px !important;" class="required"
						type="text" name="berat"
						value="<?php echo $data['berat']?>" />
					</td>
				</tr>
				<tr>
					<td>panjang</td>
					<td><input title="panjang harus di isi"  style="width:100px !important;" class="required"
						type="text" name="panjang"
						value="<?php echo $data['panjang']?>" />
					</td>
				</tr>
				<tr>
					<td>alamat</td>
					<td><input title="alamat harus di isi"  style="width:100px !important;" class="required"
						type="text" name="alamat"
						value="<?php echo $data['alamat']?>" />
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn" name="save" value="Simpan" />
						<input type="reset" class="btn" name="save" value="Reset" /></td>
				</tr>
			</table>
		</fieldset>

	</form>
</div>
