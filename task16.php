<?php
include 'db.php';
$sql = $con->query("SELECT *FROM crud");

?>
 <!DOCTYPE html>
 <html>
      <head>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      </head>
      <body>
          <br>
          <br>
           <div class="container">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
    						<tr>
        						<th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Date of birth</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Source</th>
                                <th>Compaign</th>
    						</tr>
                        </thead>
                        <tbody>
                            <?php
								while ($row =  mysqli_fetch_assoc($sql)) {
                            ?>
                        <tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['fname'] ?></td>
								<td><?php echo $row['lname'] ?></td>								
								<td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['country'] ?></td>
                                <td><?php echo $row['source'] ?></td>
                                <td><?php echo $row['compaign'] ?></td>
                        </tr>
                            <?php
                                }
                            ?>
                           </tbody>
                     </table>
                </div>
           </div>
      </body>
 </html>
    <script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
 </script>