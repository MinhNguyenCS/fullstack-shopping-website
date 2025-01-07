<?php
include "database.php";
?>

<?php

class category {
   private $db;
   
   public function __construct()
   {
    $this ->db =new Database();
   }
    public function insert_category($category_name) {
        $query = "INSERT INTO tbl_category (categoryName) VALUES ('$category_name')";
        $result = $this ->db->insert($query);
        //header('location:listing.php');
        echo "<script>location.href = 'menu-table.php';</script>";
        return $result;
    }
    public function listing() {
        $query = "SELECT * FROM tbl_category ORDER BY categoryId DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_category($category_id) {
        $query = "SELECT * FROM tbl_category WHERE categoryId = '$category_id'";
        $result = $this ->db->select($query);
        return $result;

    }
    public function update_category($category_name, $category_id) {
        $query = "UPDATE tbl_category SET categoryName = '$category_name' WHERE categoryId = '$category_id' ";
        $result = $this ->db->update($query);
        //header('location:listing.php');
        echo "<script>location.href = 'menu-table.php';</script>";
        return $result;
    }
    
    public function delete_category($category_id) {
        $query = "DELETE FROM tbl_category WHERE categoryId = '$category_id' ";
        $result = $this ->db->delete($query);
        echo "<script>location.href = 'menu-table.php';</script>";
        //header('location:listing.php');
        return $result;
    }

}

?>