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
<h2><font color="white">Add Department</font></h2>
	<a class="btn btn-primary"  href="department.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	<form id="save_department" class="form-horizontal">	
    <fieldset>
	</br>
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
	<div class="control-group">
    <label class="control-label" for="input01">Department:</label>
    <div class="controls">
    <input type="text" name="Department" class="Department"  id="span9009"/>
    </div>
    </div>
	
	
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Person Incharge:</label>
    <div class="controls">
    <input type="text" id="span900" name="Person" class="Person" data-source='["Antonio Deraja",""]' data-items="4" data-provide="typeahead" style="margin: 0 auto;">
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Title:</label>
    <div class="controls">
    <input type="text" id="span900" name="Title" class="Title" data-source='["Dean"]' data-items="4" data-provide="typeahead" style="margin: 0 auto;">
    </div>
    </div>
	
		

	


	<div class="control-group">
    <div class="controls">
	<button id="" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    </div>
    </div>
	
    </fieldset>
    </form>

</div>


	</div>	
   
<script type="text/javascript">
jQuery('#save_department').submit(function(e){
    e.preventDefault();
console.log('test')
var Title = jQuery('.Title').val();
var Person = jQuery('.Person').val();
var Department = jQuery('.Department').val();


  
    e.preventDefault();
if (Title && Person && Department){ 
    var formData = jQuery(this).serialize();  
  
    jQuery.ajax({
        type: 'POST',
        url:  'save_department.php',
        data: formData,
             success: function(msg){
            showNotification({
message: "Department Entry Successfully Added",
type: "success", 
autoClose: true, 
duration: 5 

});

     var delay = 2000;
    setTimeout(function(){ window.location = 'department.php';}, delay);  
  
        }
    });
  
}else
{
alert('All fields are required!');
return false;
} 
});


</script>
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
		
			

