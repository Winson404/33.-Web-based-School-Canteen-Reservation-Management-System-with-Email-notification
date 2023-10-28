<?php 
	
	class Product {
	    private $db;
	    
	    public function __construct() {
	        $this->db = new Database();
	    }

	    // SAVE PRODUCT
	    public function create_product($cat_Id, $prod_name, $prod_description, $price, $stock, $ingredients, $nutritional_info, $preparation_time, $prod_image) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("INSERT INTO product (cat_Id, prod_name, prod_description, price, stock, ingredients, nutritional_info, preparation_time, prod_image, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
	        if (!$stmt) {
			    die('Error in SQL query: ' . $conn->error);
			} 
	        $stmt->bind_param("issiissss", $cat_Id, $prod_name, $prod_description, $price, $stock, $ingredients, $nutritional_info, $preparation_time, $prod_image);
	        return $stmt->execute();
	    }

	    // CHECK PRODUCT NAME
	    public function check_product_exists($prod_name) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM product WHERE prod_name = ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("s", $prod_name);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        
	        return $result->num_rows > 0;
	    }

	    // CHECK PRODUCT NAME FOR UPDATION
	    public function update_check_product_exists($prod_Id, $prod_name) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM product WHERE prod_name = ? AND prod_Id != ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("si", $prod_name, $prod_Id);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        
	        return $result->num_rows > 0;
	    }

	    // DISPLAY PRODUCT
	    public function display_product() {
	        $conn = $this->db->getConnection();
	        $result = $conn->query("SELECT * FROM product JOIN category ON product.cat_Id=category.cat_Id WHERE product.prod_status=1");
        	// return $result->fetch_all(MYSQLI_ASSOC);
        	return $result;
	    }

	    // DISPLAY PRODUCT
		public function display_product_search($search_product) {
		    $conn = $this->db->getConnection();
		    $search_param = '%' . $search_product . '%'; // Add wildcards for a partial match

		    // Use a prepared statement to avoid SQL injection
		    $stmt = $conn->prepare("SELECT * FROM product JOIN category ON product.cat_Id=category.cat_Id WHERE product.prod_name LIKE ?");
		    
		    if ($stmt) {
		        $stmt->bind_param("s", $search_param);
		        $stmt->execute();
		        $result = $stmt->get_result();
		        
		        // You can fetch the results as an associative array
		        $product_results = $result->fetch_all(MYSQLI_ASSOC);
		        
		        // Close the statement and return the results
		        $stmt->close();
		        return $product_results;
		    } else {
		        // Handle the case where the prepared statement fails
		        return false;
		    }
		}


	    // GET PRODUCT
	    public function get_product($prod_Id) {
	        $conn = $this->db->getConnection();
	        $prod_Id = mysqli_real_escape_string($conn, $prod_Id);
	        $result = $conn->query("SELECT * FROM product JOIN category ON product.cat_Id=category.cat_Id WHERE product.prod_Id = '$prod_Id'");
	        if ($result && $result->num_rows === 1) {
	            return $result->fetch_assoc();
	        }
	        return null; 
	    }


	    // GET PRODUCT BY CATEGORY
	    public function get_product_by_category($cat_Id) {
	        $conn = $this->db->getConnection();
	        $result = $conn->query("SELECT * FROM product JOIN category ON product.cat_Id=category.cat_Id WHERE product.cat_Id = '$cat_Id'");
	        return $result;
	    }



	    // UPDATE PRODUCT
	    public function update_product($prod_Id, $cat_Id, $prod_name, $prod_description, $price, $stock, $ingredients, $nutritional_info, $preparation_time, $prod_image) {
	        $conn = $this->db->getConnection();
	        if(empty($prod_image)) {
	        	$stmt = $conn->prepare("UPDATE product SET cat_Id = ?, prod_name = ?, prod_description = ?, price = ?, stock = ?, ingredients = ?, nutritional_info = ?, preparation_time = ? WHERE prod_Id = ?");
       		    $stmt->bind_param("issiisssi", $cat_Id, $prod_name, $prod_description, $price, $stock, $ingredients, $nutritional_info, $preparation_time, $prod_Id);
	        } else {
	        	$stmt = $conn->prepare("UPDATE product SET cat_Id = ?, prod_name = ?, prod_description = ?, price = ?, stock = ?, ingredients = ?, nutritional_info = ?, preparation_time = ?, prod_image = ? WHERE prod_Id = ?");
	        	$stmt->bind_param("issiissssi", $cat_Id, $prod_name, $prod_description, $price, $stock, $ingredients, $nutritional_info, $preparation_time, $prod_image, $prod_Id);
	        }
	        
	        return $stmt->execute();
	    }

	    // DELETE PRODUCT
	    public function delete_product($prod_Id) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("DELETE FROM product WHERE prod_Id = ?");
	        $stmt->bind_param("i", $prod_Id);
	        return $stmt->execute();
	    }

	    // COUNT PRODUCT
	    public function count_product() {
		    $conn = $this->db->getConnection();
		    $query = "SELECT * FROM product";
		    $result = $conn->query($query);
		    // Count the number of records
		    $count = $result->num_rows;
		    return $count;
		}

	}

?>