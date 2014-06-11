
<div class="form" style="background: #fff; width: 100%; min-height:400px;">
	<form method="post" action="<?php echo BASE_URL?>/restaurant/branchsave/"
		style="padding: 20px;">
		<fieldset>
			<legend> Branch Restaurant Form </legend>
			<input type="hidden" name="resto_id"
				value="<?php echo $dataResto['resto_id']?>" />
			<table>
				<tr>
					<td>Address</td>
					<td>
                    <textarea  name="address" title="address must be filled" class="required"><?php echo $data['address']?></textarea>
					</td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td><select name="kecamatan" >
                    <option></option>
                    </select>
					</td>
				</tr>
				<tr>
					<td>City</td>
					<td><select name="city" >
                    <option></option>
                    </select>
					</td>
				</tr>
                <tr>
					<td>Province</td>
					<td><select name="province" >
                    <option></option>
                    </select>
					</td>
				</tr>
                <tr>
					<td>Phone</td>
					<td><input type="text" name="phone"
						title="phone must be filled" class="required"
						value="<?php echo $data['phone']?>" />
					</td>
				</tr>
				<tr>
					<td>rate</td>
					<td><input type="text" name="rate"
						title="rate must be filled" class="required"
						value="<?php echo $data['rate']?>" />
					</td>
				</tr>
                  <tr>
					<td>Latitude</td>
					<td><input type="text" name="latitude"
						title="rate must be filled" class="required"
						value="<?php echo $data['latitude']?>" />
					</td>
				</tr>   
                 <tr>
					<td>Longitude</td>
					<td><input type="text" name="longitude"
						title="Longitude must be filled" class="required"
						value="<?php echo $data['longitude']?>" />
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
