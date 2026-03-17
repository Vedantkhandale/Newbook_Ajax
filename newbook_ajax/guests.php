<?php require_once('includes/config.php');
	//require_once('models/db.php');

	if(!isset($_SESSION['Auth']['id'])) 
  	{
	 	header('Location: index.html');
	 	exit;
  	}
  	else
  	{
 		$guests = new guests;
 		$result = $guests->select($guests->table,'',"user_id='".$_SESSION['Auth']['id']."'");
  	}
?>
				
<form method="post"  >
    <table class="table">
        <tr>
          <th class="first"></th>
          <th>Sr. No.</th>
          <th>Name</th>
          <th>Email Id</th>
          <th>Phone No.</th>
          <th class="last">&nbsp;</th>
        </tr>
	<?php
	  $srno = 1;
		foreach($result as $row)
		{		
	?>
        <tr class="odd">
          <td><input name="" type="checkbox" value=""/></td>
		  <td><?php echo $srno; ?></td>
		  <td><?php echo $row['name']; ?></td>
		  <td><?php echo $row['email']; ?></td>
		  <td><?php echo $row['phone']; ?></td>
		  <td class="last"><a href="view.html?id=<?php echo $row['id']; ?>">View</a> | <a href="edit.html?id=<?php echo $row['id']; ?>">Edit</a> | <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Do u want to delete this guest?');">Delete</a></td>
        </tr>
    <?php
	  $srno++;	  
	} ?>
	</table>
	<div class="actions-bar wat-cf">
       <div class="actions">
          <button class="button" type="submit" value="Delete" name="delete">
             <img src="images/icons/cross.png" alt="Delete"/>Delete</a>
          </button>
        </div>
		<div class="pagination">
 </div>
</form>