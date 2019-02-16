<?php
include 'config.php';
$quizId=$_POST['id'];

$sql = "SELECT * FROM quizquestion WHERE quizId=".$quizId;
$result = $conn->query($sql);
$data=array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[]=array(
                'id'        =>$row['id'],
                'quizId'    =>$row['quizId'],
                'question'  =>$row['question'],
                'quesDesc'  =>$row['quesDesc'],
                'answer'    =>$row['answer'],
                'opt1'      =>$row['opt1'],
                'opt1Img'   =>$row['opt1Img'],
                'opt2'      =>$row['opt2'],
                'opt2Img'   =>$row['opt2Img'],
                'opt3'      =>$row['opt3'],
                'opt3Img'   =>$row['opt3Img'],
                'opt4'      =>$row['opt4'],
                'opt4Img'   =>$row['opt4Img'],
                'score'     =>$row['score'],
            );
    }
} else {
    echo "0 results";
}


	$results = array(
		"sEcho"                 => 1,
        "iTotalRecords"         => count($data),
        "iTotalDisplayRecords"  => count($data),
        "aaData"                =>$data
        );

echo json_encode($results);



?>