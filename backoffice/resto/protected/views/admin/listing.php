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
				<th>Username</th>					
                                <th>Actions</th>					
			</tr>
		</thead>
		<tbody>
		<?php foreach($dataUsers as $key=> $eachUsers){?>
			<tr>
				<td><?php echo ($key+1)?></td>
				<td><?php echo $eachUsers['username']?></td>
								
				<td align="center"><a class="btn btn-small btn-warning" title="edit"
					href="<?php echo BASE_URL?>/admin/form/id/<?php echo $eachUsers['user_id']?>">
						<i class="icon-pencil"></i> </a> <a title="delete"
					class="btn btn-danger btn-small" onclick="return onSure()"
					href="<?php echo BASE_URL?>/admin/delete/id/<?php echo $eachUsers['user_id']?>">
						<i class="icon-trash"></i> </a></td>
			</tr>
			<?php  } ?>
		</tbody>
	</table>
</div>
