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


    $name= "SELECT * FROM 'uploads' WHERE `id` = $id;";
    performQuery($name);
        if($name == 1){
            $name=$row['owner'];
  
    $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '', '$name', 'approved', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                header("location: claims.php");
              }
    }

    
?>