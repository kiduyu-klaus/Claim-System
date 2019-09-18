<?php require('header.php')?>
<?php
$error ="";
if (($_SERVER["REQUEST_METHOD"] == "POST")&& isset($_FILES['file'])) {

    $owner = $_POST['title'];
    $tag = $_POST['tags'];
    $mobile = $_POST['mobile'];
    $note = $_POST['note'];
    $notote = $_POST['ttotal'];
    $name = $_FILES['file']['name'];


    $PhpFileUploadErrors = array(
        0 => 'There is no error,the file uploaded successfully',
        1 => 'The Uploaded file exceeds the upload Max file size specified by php',
        2 => 'he Uploaded file exceeds the upload Max file size specified by the System',
        3 => 'The File was only partially uploaded',
        4 => 'No file was upoaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk',
        8 => 'A php extension stopped the file upload',
    );


        
        $ext_error =false;
        $extensions= array('pdf','doc','docx');
        $file_ext = explode('.', $_FILES['file']['name']);       
        $file_ext=end($file_ext);
         #print_r($file_ext);
         if (!in_array($file_ext, $extensions)) {
             $ext_error  = true;
         }
         if ($_FILES['file']['error']) {
             $error = $PhpFileUploadErrors[$_FILES['file']['error']];
         }elseif ($ext_error) {
             $error =  $file_ext ." Not Allowed.. Only The extensions stated above";
         }else{
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploaded/'.$_FILES['file']['name']);

            $query = "INSERT INTO uploads(owner,pf_number,mobile,note,ttotal,name,uploaded,status) VALUES('$owner','$tag','$mobile','$note','$notote','$name',CURRENT_TIMESTAMP,'Pending')";
            mysqli_query($connection,$query);
         }

        
    } 



 ?>
<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Apply New Claim </li>
        </ol>
<form role="form" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Name:</label>
        <input type="text" name="title" class="form-control" value="<?php echo $_SESSION['name']; ?>" readonly>
    </div>

    <div class="form-group">
        <label for="post_tags">PF. NO</label>
        <input type="number" name="tags" class="form-control" placeholder="P.F number.." required="">
    </div>
        <div class="form-group">
        <label for="post_tags">Mobile Number</label>
        <input type="number" name="mobile" class="form-control" placeholder="+254xxx-xxx-xxx" required="" >
    </div>

    <div class="form-group">
        <label for="post_content">Please reimburse me with a sum of Ksh. (in words)</label>
        <input type="text" name="note" class="form-control" required="" >
        </textarea>
    </div>
    <div class="form-group">
        <label for="post_tags">Please reimburse me with a sum of Ksh. (in number .)</label>
        <input type="number" name="ttotal" class="form-control" placeholder="example:..1250" required="" >
    </div>

    <div class="form-group">
        <h6 style="color:red">N\B: The <u style="color:black">reimbursement of medical expenses(dkut/rme/01)</u> document should be filled and signed before being aploaded for approval.</h6>
        <h6 style="color:red"> The Document Can be downloaded from <a href="Forms/medform.docx">here</a> </h6><br>
        <label for="post_image">Select File</label><font color="brown"> (allowed file type: 'pdf','doc' | allowed maximum size: 2 mb ) </font><br>
        <?php echo "<h4 style='color:red' >$error</h4>"?>
        <input type="file" name="file"> 
    </div>

    <button type="submit" name="upload" class="btn btn-primary" value="Upload Note">Upload Form</button>
    
</form>
<?php require('modal.php')?>
<?php require('footer.php')?>