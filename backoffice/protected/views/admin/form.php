<div class="form" style="background: #fff; width: 100%; min-height:400px;">
	<form method="post" action="<?php echo BASE_URL?>/admin/save/"
		style="padding: 20px;">
		<fieldset>
			<legend> Form Admin </legend>
			<input type="hidden" name="id"
                               value="<?php echo $data['user_id']?>"  readonly="readonly"/>
                        <input type="hidden" name="privilege"
				value="2" />
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"
						title="username harus di isi" class="required"
						value="<?php echo $data['username']?>" />
					</td>
				</tr>
				<tr>
					<td>Password</td>
                                        <td><input  type="password" title="password harus di isi" class="required"
						name="password" value="" />
					</td>
				</tr>
				<tr>
					<td>Level</td>
                                        <td><select name="level">
                                                <option>1</option>
                                                <option>2</option>                                                
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
