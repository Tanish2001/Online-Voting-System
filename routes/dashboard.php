<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
        exit();
}   

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($userdata['status']==0){
    $status = '<b style = "color:red">Not Voted</b>';
}
else{
    $status = '<b style = "color:green">Voted</b>';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet'
        type='text/css'>
    <title>Online Voting Sysytem -DashBoard</title>
</head>
<body>
    
    <div id="headersection">
        <a href="../"><button id="backbtn">Back</button></a> 
        <a href="logout.php"><button id="logoutbtn">LogOut</button></a> 
        <h1>Welcome to Online Voting System!</h1>
    </div>
    <hr>


    <div id="main_panel">
        <div id="Profile">
            <img src="../uploads/<?php echo $userdata['photo'] ?>" height=200px width=200px><br><br>
            <b>Name:</b> <?php echo $userdata['name']?><br><br>
            <b>Mobile:</b> <?php echo $userdata['mobile']?><br><br>
            <b>Address:</b> <?php echo $userdata['address']?><br><br>
            <b>Status:</b> <?php echo $status?><br><br>

        </div>


        <div id="Group">
            <?php

                if($_SESSION['groupsdata']){
                    for($i=0; $i<count($groupsdata); $i++){
                        ?>
                        <div>
                            <img id="grp_img" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                            <b>Group Name: </b><?php echo $groupsdata[$i]['name'] ?> <br><br>
                            <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?> <br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="  <?php echo $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="  <?php echo $groupsdata[$i]['id'] ?>">
                                <?php
                                    if($_SESSION['userdata']['status']==0){
                                        ?>
                                            <input type="submit" value="Vote" name="votebtn" id="votebtn">
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <button disabled="disabled" type="button" name="votebtn" id="voted">Voted</button> 
                                        <?php


                                    }
                                ?>
                            </form>
                        </div>
                        <br><br><br><hr>
                        <?php
                    }
                }
                else{

                }
            
            ?>
        </div>
    </div>
</body>
</html>