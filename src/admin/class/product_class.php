<?php
include "database.php";
?>

<?php

class product {
   private $db;
   
   public function __construct()
   {
    $this ->db =new Database();
   }

   public function listing() {
    $query = "SELECT * FROM tbl_category ORDER BY categoryId DESC";
    $result = $this ->db->select($query);
    return $result;
}

public function show_brand() {
    $query = "SELECT tbl_brand.*, tbl_category.categoryName
    FROM tbl_brand INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.categoryId
    ORDER BY tbl_brand.brand_id DESC";
    //$query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
    $result = $this ->db->select($query);
    return $result;
}

public function insert_product() {   
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_price = $_POST['product_price'];
    $price_sale = $_POST['sale_price'];
    $product_desc = $_POST['product_desc'];
    $product_img = $_FILES['product_img']['name'];
    move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
        $query = "INSERT INTO tbl_product (
            product_name,
            category_id,
            brand_id,
            product_price,
            price_sale,
            product_desc,
            product_img)
             VALUES (
                '$product_name',
                '$category_id',
                '$brand_id',
                '$product_price',
                '$price_sale',
                '$product_desc',
                '$product_img')";
        $result = $this ->db->insert($query);
        if($result) {
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
            $result = $this -> db ->select($query)->fetch_assoc();
            $product_id = $result['product_id'];
            $filename = $_FILES['side_img']['name'];
            $filttmp = $_FILES['side_img']['tmp_name'];
            foreach($filename as $key => $value) {
                move_uploaded_file($filttmp[$key],"uploads/".$value);
                $query = "INSERT INTO tbl_product_side_img (product_id, product_side_img) VALUES ('$product_id','$value')";
                $result = $this ->db->insert($query);
                
            }
        }
        return $result;
    }

    public function show_product() {
        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
        $result = $this ->db->select($query);
        return $result;

    }

    public function update_product($product_name, $product_id) {
        $query = "UPDATE tbl_product SET product_name = '$product_name' WHERE product_id = '$product_id' ";
        $result = $this ->db->update($query);
        echo "<script>location.href = 'product-table.php';</script>";
        //header('location:productList.php');
        return $result;
    }
    
    public function delete_product($product_id) {
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id' ";
        $result = $this ->db->delete($query);
        echo "<script>location.href = 'product-table.php';</script>";
        //header('location:productList.php');
        return $result;
    }

 

}

?>