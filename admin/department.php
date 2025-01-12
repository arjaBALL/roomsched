<?php 
include('./connection/session.php'); 
include('./components/header.php'); 
include('./connection/dbcon.php'); 
include('./components/nav-top1.php');
include('./components/main.php');
?>

<div class="wrapper">
<div id="element" class="hero-body-subject-add">
<div class="nav-content">
<h2><font color="white">Department List</font></h2>
	<a class="btn btn-primary"  href="add_department.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Department</a>
	<hr>
	<table class="users-table">

<div class="demo_jui">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
			<thead>
				<tr>
				<th>Department</th>
				<th>Person Incharge</th>
				<th>Title</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>

<?php 
$result=mysqli_query($conn,"select * from departmet")or die(mysqli_error($conn));
while($row=mysqli_fetch_array($result)){ $id=$row['department_id'];
?>
<tr class="del<?php echo $id ?>">
	<td><?php echo $row['department'] ?></td>
	<td><?php echo $row['person_incharge'] ?></td>
	<td><?php echo $row['title'] ?></td>
	<td align="center" width="240">
	<a class="btn btn-info" href="edit_department.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;
	<a class="btn btn-danger1"  id="<?php echo $id; ?>">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>
</td>



<?php }  ?>
	
	</tr>

			</tbody>
		</table>

</div>





	</div>	

<?php include('footer.php');?>
</div>
</body>
	<div class="modal hide fade" id="myModal">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	    <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">No</a>
	    <a href="logout.php" class="btn btn-primary">Yes</a>
		</div>
		</div>
		
	
	<script type="text/javascript">
	$(document).ready( function() {
	

	
	$('.btn-danger1').click( function() {
		
		var id = $(this).attr("id");
		
		if(confirm("Are you sure you want to delete this Department?")){
			
		
			$.ajax({
			type: "POST",
			url: "delete_department.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut('slow'); 
			} 
			}); 
			}else{
			return false;}
		});				
	});

</script>
