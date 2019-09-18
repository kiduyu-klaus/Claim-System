<?php 
require('header.php');

 ?>
<div class="container">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id:</th>
            <th>Claim Owner:</th>
            <th>Document Name:</th>
            <th>Uploaded on:</th>            
            <th>Status:</th>
            <th>Action:</th>
        </tr>
    </thead>
    <tbody>
    <?php require('config.php');
            $name= $_SESSION['name'];
            $query = "SELECT * FROM uploads ";
            $select_users = mysqli_query($connection, $query) or die(mysqli_error($connection));
            if (mysqli_num_rows($select_users) > 0 ) {
            while ($row = mysqli_fetch_array($select_users)) {
                $user_id = $row['id'];
                $owner = $row['owner'];
                $docName = $row['name'];
                $updated = $row['uploaded'];
                $status = $row['status'];
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$owner</td>";
                echo "<td>$docName</td>";
                echo "<td>$updated</td>";
                echo "<td>$status</td>";
                if($row['status']=="Pending"){
                    echo "<td><a href='approve.php?id=$user_id' class='btn btn-primary btn-lg active' role='button' aria-pressed='true' >Approve Claim</a></td>";

                }else{
                    echo "<td><a href='kiduyu.html' class='btn btn-primary btn-lg disabled' role='button' disabled >Already Approved</a></td>";

                }
                
                echo "</tr>";


            }}
                
                
                ?>

    </tbody>  

    <tfoot>
    <tr>
        <th>id:</th> 
        <th>Claim Owner:</th>   
        <th>Document Name:</th>
        <th>Uploaded on:</th>            
        <th>Status:</th>
        <th>Action:</th>
        </tr>
</tfoot>
</table>
</div>
</div>


















<?php 
require('footer.php');

 ?>