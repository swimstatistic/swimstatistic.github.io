<?php require_once('safemysql.class.php');$data = new SafeMySQL(); if(isset($_POST['fdate']) && isset($_POST['sdate']) && isset($_POST['distance']) && isset($_POST['name']) && isset($_POST['surname'])&&isset($_POST['age'])&&isset($_POST['coach'])){
$fdate = $_POST['fdate'];
$sdate = $_POST['sdate'];
$distance = $_POST['distance'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$age = (int) $_POST['age'];
$coach = $_POST['coach'];
if ($fdate<$sdate){
	$date_more = $data->query("SELECT `date`,`time` FROM `Plov` WHERE `distance`= ?s AND `Name`= ?s AND `Surname`= ?s AND `Age`= ?i AND `Coacher`= ?s AND `date`> ?s AND `date`< ?s ORDER BY date ASC",$distance,$name,$surname,$age,$coach,$fdate,$sdate);
}
if ($sdate<$fdate){
$date_more= $data->query("SELECT `date`,`time` FROM `Plov` WHERE `distance`= ?s AND `Name`= ?s AND `Surname`= ?s AND `Age`= ?i AND `Coacher`= ?s AND `date`> ?s AND `date`< ?s ORDER BY date DESC",$distance,$name,$surname,$age,$coach,$sdate,$fdate);}
if(mysqli_num_rows($date_more)>0){
    while($row_more=mysqli_fetch_array($date_more, MYSQLI_ASSOC)){ $i++;
        if($i==mysqli_num_rows($date_more)){
            $data0 = $row_more['date'].'*'.$row_more['time'];
        }else{
            $data0 = $row_more['date'].'*'.$row_more['time'].'|';
        }
        echo $data0;
    }
}
echo '#';
}
?>