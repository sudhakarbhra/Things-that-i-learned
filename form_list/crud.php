<?php
    include 'config.php';
    $credentials = array('conn' => $conn,'tableName'=>"quizquestion" );

    $params=$_REQUEST;

switch($params['action']) {
    case 'add':
            addMe($params,$credentials);
            break;
    case 'edit':
            updateMe($params,$credentials);
            break;
    case 'delete':
            deleteMe($params,$credentials);
            break;
    case 'deleteMulti':
            deleteMulti($params,$credentials);
            break;
    default:
            fetchMe($params,$credentials);
            return;
    }


function addMe($params,$credentials){
    //echo "Adding data";
    //print_r($params);
    if (!isset($params['opt1Img'])) {
            $params['opt1Img']="NULL";
    }
     if (!isset($params['opt2Img'])) {
            $params['opt2Img']="NULL";
    } 
    if (!isset($params['opt3Img'])) {
            $params['opt3Img']="NULL";
    }
     if (!isset($params['opt4Img'])) {
            $params['opt4Img']="NULL";
    }
    


     $sql = "INSERT INTO `quizquestion`(
                                        `question`,
                                        `quesDesc`,
                                        `answer`,
                                        `opt1`,
                                        `opt1Img`, 
                                        `opt2`,
                                        `opt2Img`,
                                        `opt3`,
                                        `opt3Img`,
                                        `opt4`,
                                        `opt4Img`,
                                        `score`)
      VALUES (
          '".$params['question']."',
          '".$params['quesDesc']."',
          '".$params['answer']."',
          '".$params['opt1']."',
          '".$params['opt1Img']."',
          '".$params['opt2']."',
          '".$params['opt2Img']."',
          '".$params['opt3']."',
          '".$params['opt3Img']."',
          '".$params['opt4']."',
          '".$params['opt4Img']."',
          '".$params['score']."'
      )";

      print_r($sql);

    if ($credentials['conn']->query($sql)) {
       echo "Currently updating";
       exit();
    }else{
        echo "Error uploading".mysqli_error($credentials['conn']);
        exit();
    }
}

function fetchMe($params,$credentials){
$sql = "SELECT * FROM ".$credentials['tableName']." where id = ".$params['id']."";
$result = $credentials['conn']->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
         		$data['id']        =   $row['id'];
                $data['quizId']    =   $row['quizId'];
                $data['question']  =   $row['question'];
                $data['quesDesc']  =   $row['quesDesc'];
                $data['answer']    =   $row['answer'];
                $data['opt1']      =   $row['opt1'];
                $data['opt1Img']   =   $row['opt1Img'];
                $data['opt2']      =   $row['opt2'];
                $data['opt2Img']   =   $row['opt2Img'];
                $data['opt3']      =   $row['opt3'];
                $data['opt3Img']   =   $row['opt3Img'];
                $data['opt4']      =   $row['opt4'];
                $data['opt4Img']   =   $row['opt4Img'];
                $data['score']     =   $row['score'];   
    }
    echo json_encode($data);
    exit();
} else { echo "0 results";}

}

function deleteMe($params,$credentials){
   $sql="DELETE FROM ".$credentials['tableName']." WHERE id=".$params['id'];
   if ($credentials['conn']->query($sql)) {
       echo "Credentials Deleted";
       exit();
    }else{
        echo "Error deleting".mysqli_error($credentials['conn']);
        exit();
    }
}


function deleteMulti($params,$credentials){
    foreach ($params['id'] as $delId) {
    $sql="DELETE FROM ".$credentials['tableName']." WHERE id=".$delId;
    $credentials['conn']->query($sql);
    }
       echo "Credentials Deleted";
       exit();
}

function updateMe($params,$credentials){

      if (!isset($params['opt1Img'])) {
            $params['opt1Img']="NULL";
    }
     if (!isset($params['opt2Img'])) {
            $params['opt2Img']="NULL";
    } 
    if (!isset($params['opt3Img'])) {
            $params['opt3Img']="NULL";
    }
     if (!isset($params['opt4Img'])) {
            $params['opt4Img']="NULL";
    }
    


    $sql = " UPDATE `quizquestion` SET
                         `question`     ='".$params['question']."',
                         `quesDesc`     ='".$params['quesDesc']."',
                         `answer`       ='".$params['answer']."',
                         `opt1`         ='".$params['opt1']."',
                         `opt1Img`      ='".$params['opt1Img']."',
                         `opt2`         ='".$params['opt2']."',
                         `opt2Img`      ='".$params['opt2Img']."',
                         `opt3`         ='".$params['opt3']."',
                         `opt3Img`      ='".$params['opt3Img']."',
                         `opt4`         ='".$params['opt4']."',
                         `opt4Img`      ='".$params['opt4Img']."',
                         `score`        ='".$params['score']."'
                          WHERE `id`='".$params['id']."'";


print_r($sql);



    if ($credentials['conn']->query($sql)) {
       echo "Currently updating";
       exit();
    }else{
        echo "Error uploading".mysqli_error($credentials['conn']);
        exit();
    }
    
}



