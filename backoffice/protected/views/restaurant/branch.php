<table class="table table-bordered" style="width:500px;">
<tr><td>Resto Name</td><td><?php echo $dataResto['resto_name']?></td></tr>
<tr><td>Min. Price</td><td><?php echo $dataResto['min_price']?></td></tr>
<tr><td>Max. Price</td><td><?php echo $dataResto['max_price']?></td></tr>
<tr><td>Category</td><td><?php echo $dataResto['category_id']?></td></tr>
<tr><td>Type</td><td><?php echo $dataResto['resto_type_id']?></td></tr>

</table>
<a href="<?php echo BASE_URL?>/restaurant/branchform/<?php echo $dataResto['resto_id']?>" class="btn">Add Branch Resto</a>
<table class="table table-bordered table-hover">
<tr><th>No.</th><th>Branch ID</th><th>Location Address</th><th>Kecamatan</th><th>City</th><th>Province</th><th>Phone</th><th>Rate</th><th>Latitude</th><th>Longitude</th><th>Action</th></tr>

<?php 
foreach($dataBranchResto as $key=> $eachBranchResto){?>
	<tr><td><?php echo ($key+1)?></td><td><?php echo $eachBranchResto['resto_branch_id']?></td>
    <td><?php echo $eachBranchResto['address']?></td>
    <td><?php echo $eachBranchResto['kecamatan']?></td><td><?php echo $eachBranchResto['city']?></td>
    <td><?php echo $eachBranchResto['province']?></td><td><?php echo $eachBranchResto['phone']?></td>
    <td><?php echo $eachBranchResto['rate']?></td><td><?php echo $eachBranchResto['latitude']?></td>
    <td><?php echo $eachBranchResto['longitude']?></td>
     <td><a class="btn" href="<?php echo BASE_URL?>/restaurant/branchform/<?php echo $dataResto['resto_id']?>/<?php echo $eachBranchResto['resto_branch_id'] ?>">Edit</a></td>
    </tr>
	<?php } ?>
</table>
</div>
