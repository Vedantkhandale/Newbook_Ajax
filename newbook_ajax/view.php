<?php
require_once('includes/config.php');
if(!isset($_SESSION['Auth']['id']))
{
	header("Location: index.php");
	exit;
}
   $guests = new guests;
   //$errors = array(); 
   $condition = "id = '".$_GET['id']."'";
   $result = $guests->select($guests->table,'',$condition);
?>
 <table class="table">
                  <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>Address</th>
                    <th>Phone No.</th>
                    <th>Gender</th>
                    <th>Avatar</th>
                    <th>Hobbies</th>
                    <th class="last">&nbsp;</th>
                  </tr>
                  <?php
		
		$sr=1;
		foreach($result as $row)
		{

			?>
                  <tr class="odd">
                   
                   <td><?php echo $sr++ ; ?></td>
                   <td width="15%"><?php echo $row['name']; ?></td>
                   <td width="15%"><?php echo $row['email']; ?></td>
                   <td width="15%"><?php echo $row['address']; ?></td>
                   <td width="15%"><?php echo $row['phone']; ?></td>
                   <td width="15%"><?php echo $row['gender']; ?></td>
                   <td width="15%"><img src="<?php echo FTP_AVATAR_DIR.$row['avatar']; ?>" width="50px" height="50px" /></td>
                   <td><?php echo $row['hobbies']; ?></td>
                   <td class="last"></td>
                  </tr>
                  <?php  }  ?>
                  
                </table>