<?php 
include("database.php");
require('carbon/autoload.php');
$db = new Database();
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('America/Phoenix')->toDateString();
if(isset($_GET['cart_status'])&& isset($_GET['code'])) {
    $status = $_GET['cart_status'];
    $code = $_GET['code'];
    $sql = "UPDATE tbl_cart SET cart_status = '".$status."' WHERE code_cart = '".$code."'";
    $result = $db->update($sql);

    //Analize the revenue
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_product WHERE tbl_cart_details.id_product =tbl_product.product_id AND tbl_cart_details.code_cart='$code' ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = $db->select($sql_lietke_dh);

    $sql_thongke = "SELECT * FROM tbl_analize WHERE sell_date='$now'"; 
    $query_thongke = $db->select($sql_thongke);

    $soluongmua = 0;
    $doanhthu = 0;
    while($row = $query_lietke_dh -> fetch_assoc()){
          $soluongmua+=$row['quantity_buy'];
          $doanhthu+=$row['product_price'];
    }

    if($query_thongke==false){
            $soluongban = $soluongmua;
            $doanhthu = $doanhthu;
            $donhang = 1;
            $sql_thongke1 = "INSERT INTO tbl_analize (sell_date,revenue,sell_quantity,sell_order) VALUES ('$now', '$doanhthu', '$soluongban','$donhang')";
            $sql_update_thongke = $db->insert($sql_thongke1);
    }elseif($query_thongke==true){
        while($row_tk =$query_thongke-> fetch_assoc()){
            $soluongban = $row_tk['sell_quantity']+$soluongban;
            $doanhthu = $row_tk['revenue']+$doanhthu;
            $donhang = $row_tk['order']+1;
            $sql_update_thongke = $db->update("UPDATE tbl_analize SET sell_quantity='$soluongban',revenue='$doanhthu',sell_order='$donhang' WHERE sell_date='$now'" );
        }
    }

    header('Location: listorder.php');
}

?>