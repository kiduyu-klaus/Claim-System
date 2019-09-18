<?php require('header.php')?>
<ol class="breadcrumb">
   <li class="breadcrumb-item">
   <a href="#">Dashboard</a>
   </li>
   <li class="breadcrumb-item active">View All Claims </li>
 </ol>
 <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id:</th>
            <th>Document Name:</th>
            <th>Uploaded on:</th>            
            <th>Status:</th>
        </tr>
    </thead>
    <tbody>
    <?php 
            $name= $_SESSION['name'];
            $query = "SELECT * FROM uploads WHERE owner = '$name' ";
            $select_users = mysqli_query($connection, $query) or die(mysqli_error($connection));
            if (mysqli_num_rows($select_users) > 0 ) {
            while ($row = mysqli_fetch_array($select_users)) {
                $user_id = $row['id'];
                $docName = $row['name'];
                $updated = $row['uploaded'];
                $status = $row['status'];
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$docName</td>";
                echo "<td>$updated</td>";
                echo "<td>$status</td>";
                echo "</tr>";


            }}
                
                
                ?>

    </tbody>  

    <tfoot>
    <tr>
        <th>id:</th>    
        <th>Document Name:</th>
        <th>Uploaded on:</th>            
        <th>Status:</th>
        </tr>
</tfoot>
    </table>
 </div>


<?php require('modal.php')?>
<?php require('footer.php')?>