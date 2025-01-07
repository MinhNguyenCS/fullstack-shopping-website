<?php
require('carbon/autoload.php');
include('database.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
$db = new Database();

if(isset($_POST['time'])) {
    $time = $_POST['time'];
 }else {
     $time = '';
     $subdays = Carbon::now('America/Phoenix')->subdays(365)->toDateString();
 }
 
 if($time == '7days') {
     $subdays = Carbon::now('America/Phoenix')->subdays(7)->toDateString();
 } else if ($time == '28days') {
     $subdays = Carbon::now('America/Phoenix')->subdays(28)->toDateString();
 }
 else if ($time == '90days') {
     $subdays = Carbon::now('America/Phoenix')->subdays(90)->toDateString();
 }
 else if ($time == '365days') {
     $subdays = Carbon::now('America/Phoenix')->subdays(365)->toDateString();
 }

$now = Carbon::now('America/Phoenix')->toDateString();
$sql = "SELECT * FROM tbl_analize WHERE sell_date BETWEEN '$subdays' AND '$now' ORDER BY sell_date ASC";
$sql_query = $db->select($sql);
while ($val = $sql_query->fetch_assoc()) {
    $chart_data[] = array(
    'date' => $val['sell_date'],
    'order' => $val['sell_order'],
    'sales' => $val['revenue'],
    'quantity' => $val['sell_quantity']
    );
}

echo $data = json_encode($chart_data);
?>