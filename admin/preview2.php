<?php include('./connection/dbcon.php');

include('./components/header.php');
 ?>
 <script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function() {
			
		window.print()
			
			)};
			</script>
 
 <div class="wrapper_print">
 <?php 
 if (isset($_POST['save']))

$room=$_POST['room'];
$semester=$_POST['semester'];
$sy=$_POST['sy'];

$search_query_all=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$search_query=mysqli_query($conn,"select * from schedule where room like '%$room%' and type='' and day1='MWF'  and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$search_query2=mysqli_query($conn,"select * from schedule where room like '%$room%'and type='' and day1='TTh'  and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$search_query1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%'")or die(mysqli_error());
$count=mysqli_num_rows($search_query);
$count2=mysqli_num_rows($search_query2);
$row=mysqli_fetch_assoc($search_query1);
$row_all=mysqli_fetch_assoc($search_query_all);


$id=$row_all['schedule_id'];



?> 
 <u>
<h5 align="center">
 <font color="Orange"><?php echo $row['room'];  ?></font></u>&nbsp;&nbsp;&nbsp;&nbsp;School year:&nbsp;<?php echo $row['sy']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
Semester:&nbsp;<?php echo $row['semester']; ?>
</h5>
<table border="1">
  <thead>
    <tr>
      <th><font size="1">Time</font></th>
      <th><font size="1">Monday</font></th>
      <th><font size="1">Wednesday</font></th>
      <th><font size="1">Friday</font></th>
      <th><font size="1">Time</font></th>
      <th><font size="1">Tuesday</font></th>
      <th><font size="1">Thursday</font></th>
      <th><font size="1">Saturday</font></th>
    </tr>
  </thead>
  <tbody>
  <?php
$search_rows=mysqli_fetch_array($search_query);
?>
    <tr>
      <td width="110" align="center">
	   <font size="1">
	  <b><font color="green">7:30 am - 8:30 am</b>
	 </font>
	 </td>
      <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='7:30 am' and time_end='8:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='7:30 am' and time_end='8:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='7:30 am' and time_end='8:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
	    <td width="110" align="center">
		 <font size="1" color="green">
		<b>7:30 am - 9:00 am</b>
		</font>
		</td>
	    <td width="120">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='7:30 am' and time_end='9:00 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='7:30 am' and time_end='9:00 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
		 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='7:30 am' and time_end='10:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
echo '<br>';	
echo '<br>';	
	echo $row['subject'];
	
	  ?>
		</font>
		</td>

	  </tr>
	  
	  
	  
	  
	  
	   <tr>
      <td width="110" align="center">
	   <font size="1" color="green">
	  <b>8:30 am - 9:30 am</b>
	 </font>
	 </td>
      <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='8:30 am' and time_end='9:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='8:30 am' and time_end='9:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='8:30 am' and time_end='9:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="green">
		<b>9:00 am - 10:30 am</b>
		</font>
		</td>
	    <td width="120">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='9:00 am' and time_end='10:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='9:00 am' and time_end='10:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
			 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='7:30 am' and time_end='10:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	 echo '<br>';
	 echo '<br>';
	  ?>
		</font>
		</td>

	  </tr>
	  
	  
	  
	  
	     <tr>
      <td width="70" align="center">
	   <font size="1" color="green">
	  <b>9:30 am - 10:30 am</b>
	 </font>
	 </td>
      <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='9:30 am' and time_end='10:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='9:30 am' and time_end='10:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='9:30 am' and time_end='10:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="green">
		<b>10:30 am - 12:00 am</b>
		</font>
		</td>
	    <td width="120">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='10:30 am' and time_end='12:00 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='10:30 am' and time_end='12:00 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
				 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='10:30 am' and time_end='1:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
echo '<br>';	
echo '<br>';	
	echo $row['subject'];
	
	  ?>
		</font>
		
		</td>
	
	  </tr>
	  
	  
	  
	  
	  
	  
	  
	  
	     <tr>
      <td width="70" align="center">
	   <font size="1" color="green">
	  <b>10:30 am - 11:30 am</b>
	 </font>
	 </td>
      <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='10:30 am' and time_end='11:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='10:30 am' and time_end='11:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='10:30 am' and time_end='11:30 am' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="green">
		<b>12:00 am - 1:30 pm</b>
		</font>
		</td>
	    <td width="120">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='12:00 am' and time_end='1:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='12:00 am' and time_end='1:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
			 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='10:30 am' and time_end='1:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	 echo '<br>';
	 echo '<br>';
	  ?>
		</font>
		
		</td>
	   
	  </tr>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   <tr>
      <td width="70" align="center">
	   <font size="1" color="green">
	  <b>11:30 am - 12:30 pm</b>
	 </font>
	 </td>
      <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='11:30 am' and time_end='12:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='11:30 am' and time_end='12:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='11:30 am' and time_end='12:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
	    <td width="70" align="center">
		 <font size="1" color="green">
		<b>1:30 am - 3:00 pm</b>
		</font>
		</td>
	    <td width="120">
		  <font size="1">
		 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='1:30 pm' and time_end='3:00 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
 <font size="1">			
			<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='1:30 pm' and time_end='3:00 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
		</td>
	    <td width="120">
						 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='1:30 am' and time_end='4:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
echo '<br>';	
echo '<br>';	
	echo $row['subject'];
	
	  ?>
		</font>
		</td>
	  </tr>
	  
	  
	  
	  <tr>
	  
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>12:30 pm - 1:30 pm</b>
	 </font>
	</td>
     <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='12:30 pm' and time_end='1:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='12:30 pm' and time_end='1:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	   <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='12:30 pm' and time_end='1:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>3:00 pm - 4:30 pm</b>
		</font>
	  </td>
      <td width="120">
 <font size="1">	 
   	 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='3:00 pm' and time_end='4:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120">
 <font size="1">	    	
			<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='3:00 pm' and time_end='4:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120">
	  		 <font size="1">	
				<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Saturday%' and time='1:30 am' and time_end='4:30 am' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	 echo '<br>';
	 echo '<br>';
	  ?>
		</font>
	  </td>

	  </tr>	
	  
	  
	  <tr>
      <td width="70" align="center">
	   <font size="1" color="green">
	  <b>1:30 pm - 2:30 pm</b>
	 </font>
	</td>
 <td width="120">
 <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='1:30 pm' and time_end='2:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='1:30 pm' and time_end='2:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='1:30 pm' and time_end='2:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  <font size="1">
	  </td>
      <td width="70" align="center">
	  <font size="1" color="green">
	   <b>4:30 pm - 6:00 pm</b>
		</font>
	  </td>
      <td width="120">
	    	 <font size="1">
			 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='4:30 pm' and time_end='6:00 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120">
	 <font size="1">    
		 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='4:30 pm' and time_end='6:00 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120"></td>

	  </tr>	
	  
	  
	  	  
	  
	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>2:30 pm - 3:30 pm</b>
	 </font>
	</td>
 <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='2:30 pm' and time_end='3:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
		<font size="1">	  	
		<?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='2:30 pm' and time_end='3:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='2:30 pm' and time_end='3:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="70" align="center">
	  <font size="1" color="green">
	   <b>6:00 pm - 7:30 pm</b>
		</font>
	  </td>
      <td width="120">
	    	 <font size="1">
			 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='6:00 pm' and time_end='7:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120">
<font size="1">	      	
			<?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='6:00 pm' and time_end='7:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120"></td>

	  </tr>	
	  
	  	  
	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>3:30 pm - 4:30 pm</b>
	 </font>
	</td>
 <td width="120">
 <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='3:30 pm' and time_end='4:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='3:30 pm' and time_end='4:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='3:30 pm' and time_end='4:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="70" align="center">
	  <font size="1" color="green">
	    <b>7:30 pm - 8:30 pm</b>
		</font>
	  </td>
      <td width="120">
	    	 <font size="1">
			 <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Tuesday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Thursday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="120"></td>

	  </tr>	
	  
	  
	  
	  	  
	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>4:30 pm - 5:30 pm</b>
	 </font>
	</td>
     <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='4:30 pm' and time_end='5:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='4:30 pm' and time_end='5:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='4:30 pm' and time_end='5:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>

	  </tr>	
	  	  

	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>5:30 pm - 6:30 pm</b>
	 </font>
	</td>
   <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='5:30 pm' and time_end='6:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='5:30 pm' and time_end='6:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
			  <font size="1">
	  	  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='5:30 pm' and time_end='6:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>
   
	  </tr>	
	  	  		  
	  
	  	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>6:30 pm - 7:30 pm</b>
	 </font>
	</td>
    <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='6:30 pm' and time_end='7:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='6:30 pm' and time_end='7:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='6:30 pm' and time_end='7:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>

	  </tr>	
	  	  		

	  	  	          <tr>
      <td width="70" align="center">
	  <font size="1" color="green">
	  <b>7:30 pm - 8:30 pm</b>
	 </font>
	</td>
  <td width="120">
	  <font size="1">
	  <?php 
	  $result=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Monday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysqli_error());
	  $row=mysqli_fetch_array($result);
	 echo $row['subject'];
	 echo '<br>';
	 echo $row['teacher']; 
	 echo '<br>';	 
	 echo $row['CYS'];
	  ?>
	  </font>
	  </td>
	   <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Wednesday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	 </td>

	    <td width="120">
	  	  <font size="1">
		  <?php 
	  $result1=mysqli_query($conn,"select * from schedule where room like '%$room%' and semester like '%$semester%' and sy like '%$sy%' and type='' and day like '%Friday%' and time='7:30 pm' and time_end='8:30 pm' ")or die(mysqli_error());
	  $row1=mysqli_fetch_array($result1);
	 echo $row1['subject'];
	 echo '<br>';
	 echo $row1['teacher']; 
	 echo '<br>';	 
	 echo $row1['CYS'];
	  ?>
	  </font>
	  </td>
      <td width="70"></td>
      <td width="120"></td>
      <td width="120"></td>
      <td width="120"></td>
 
	  </tr>					
	  
	  
	  
	  
	  

	  
	
  </tbody>
  </table>
  
  
  
<font size="1">Approved by:</font>
<br>
<br>
<font size="1">ANTONIO L. DERAJA PH. D
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
DR. SALVADOR B. ZARAGOSA JR.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

ORLANDO Z. BE�ALES Ed. D
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
DR. RENATO M. SOROLLA
</font>
<br>
<font size="1">Dean College of Industrial Technology
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;
Executive Director
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Vice President Academic  Affair
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
SUC President II  
<br>
<br>
Copyright &copy; jkev :-P
  </div>

  </html>