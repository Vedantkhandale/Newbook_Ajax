<?php
require_once('includes/config.php');
if(!isset($_SESSION['Auth']['id']))
{
		header("Location: index.html");
		exit;
}
else
  {
 	$guests = new guests;
 	$result = $guests->select($guests->table,'',"user_id=".$_SESSION['Auth']['id']);
  }

?>

 <form action="#" class="form">
                <table class="table">
                  <tr>
                    <th>No. of User Registered</th>
                    <th>Male</th>
                    <th>Female</th>
                    <th class="last">&nbsp;</th>
                  </tr>
                  <?php
      $condition = "user_id='".$_SESSION['Auth']['id']."'";
      $row = $guests->select($guests->table,'count(*)',$condition);
		$totalguests = count($row);
		
		//print_r($totalguests); exit;
		
		$mcondition = "user_id='".$_SESSION['Auth']['id']."' and gender='male'";
		$row = $guests->select($guests->table ,'count(*)',$mcondition);
		$totalmale = count($row);
		
		$fcondition = "user_id='".$_SESSION['Auth']['id']."' and gender='female'";
		$row = $guests->select($guests->table,'count(*)',$fcondition);
		$totalfemale = count($row);
			?>
                  <tr class="odd">
                   <td><?php echo $totalguests;?></td>
                   <td><?php echo $totalmale;?></td>
                   <td><?php echo $totalfemale;?></td>
                  </tr>
                 
                </table>
                <div class="actions-bar wat-cf">
                  <div class="actions">
                    
                  </div>
                  <div class="pagination">
                    
                  </div>
                </div>
              </form>