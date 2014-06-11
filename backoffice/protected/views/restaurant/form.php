
<div class="form" style="background: #fff; width: 100%; min-height:400px;">
	<form method="post" action="<?php echo BASE_URL?>/restaurant/save/"
		style="padding: 20px;">
		<fieldset>
			<legend> Restaurant Form </legend>
			<input type="hidden" name="resto_id"
				value="<?php echo $data['resto_id']?>" />
			<table>
				<tr>
					<td>Resto Name</td>
					<td><input type="text" name="resto_name"
						title="resto name harus di isi" class="required"
						value="<?php echo $data['resto_name']?>" />
					</td>
				</tr>
				<tr>
					<td>Min. Price</td>
					<td><input size="5"  style="width:50px !important;" type="text" title="Min. Price harus di isi" class="required"
						name="min_price" value="<?php echo $data['min_price']?>" />
					</td>
				</tr>
				<tr>
					<td>Max. Price</td>
					<td><input title="max price harus di isi"  style="width:100px !important;" class="required"
						type="text" name="max_price"
						value="<?php echo $data['max_price']?>" />
					</td>
				</tr>
				<tr>
					<td>Category</td>
					<td><select name="category_id">
                    <?php foreach($CategoryData as $eachCategory){?>
                    <option value="<?php echo $eachCategory['category_id']?>"><?php echo $eachCategory['category_name']?></option>
                    <?php }?>
                    </select>
					</td>
				</tr>
                                
				<tr>
					<td>Type</td>
					<td><select name="resto_type_id">
                   <?php foreach($TypeData as $eachType){?>
                    <option value="<?php echo $eachType['resto_type_id']?>"><?php echo $eachType['resto_type_name']?></option>
                    <?php }?>
                    </select>
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
