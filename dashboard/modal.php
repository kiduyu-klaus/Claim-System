<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- message Modal-->
  <div class="modal fade" id="messagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Unread Messages</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Only the Unread will appear.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="messages.php">View All </a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="claimstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Approved And Pending Claims</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <?php 
        
            $name= $_SESSION['name'];
            $query = "SELECT * FROM uploads WHERE owner = '$name' ";
            $select_users = mysqli_query($connection, $query) or die(mysqli_error($connection));
            if (mysqli_num_rows($select_users) > 0 ) {
            while ($row = mysqli_fetch_array($select_users)) {
            $status = $row['status'];  
            if ($status=="Pending") {
             echo"Your Latest Claim Is <u>Pending</u> Approval From the Admin ";
            } else {
              echo"Your Latest Claim Was <u>Approved</u> successfully by the Admin ";
            }  
            }}else{
              echo"You currently have no pending claim. <br> you can Claim <a href='newclaim.php'>here";
            }
            ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>