<table class="table table-bordered table-hover">
<tr><th>No.</th><th>Resto ID</th><th>Resto Name</th><th>Min. Price</th><th>Max. Price</th><th>Category</th>
<th>Input Date</th><th>updated time</th><th>Type</th><th>Action</th></tr>
<?php
foreach($dataResto as $key => $eachResto){?>
	<tr>
    <td><?php echo ($key+1)?></td>
    <td><?php echo $eachResto['resto_id']?></td>
    <td><?php echo $eachResto['resto_name']?></td>
    <td><?php echo $eachResto['min_price']?></td>
    <td><?php echo $eachResto['max_price']?></td>
    <td><?php echo $eachResto['category_id']?></td>
    <td><?php echo $eachResto['input_date']?></td>
    <td><?php echo $eachResto['updated_time']?></td>
    <td><?php echo $eachResto['resto_type_id']?></td>
    <td><a href="<?php echo BASE_URL?>/restaurant/form/<?php echo $eachResto['resto_id']?>">Edit</a> ||	
    <a href="<?php echo BASE_URL?>/restaurant/branch/<?php echo $eachResto['resto_id']?>">Manage Branch</a>
    </td></tr>
	<?php } ?>
</table>