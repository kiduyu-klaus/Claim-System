<?php
    
    define('DBINFO', 'mysql:host=localhost;dbname=claimsystem');
    define('DBUSER','root');
    define('DBPASS','');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    $id = $_GET['id'];
    $query ="UPDATE `uploads` SET `status` = 'approved' WHERE `id` = $id;";
        if(performQuery($query)){
                header("location: claims.php");
              }
    

    
?>