<?php 
require '../includes/config.php';
require '../classes/reservation.php';

$reserve = new Reservation();

// UPDATE QTY OF RESERVED PRODUCT/FOOD
if (isset($_POST['reserveId']) && isset($_POST['action'])) {
    // Connect to your database (replace with your connection code)
    $conn = new mysqli("localhost", "root", "", "reservation");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $reserveId = $_POST['reserveId'];
    $action = $_POST['action'];

    

    // Perform the action based on the button click (e.g., deduct quantity)
    if ($action === 'minus') {
        $sql2 = mysqli_query($conn, "SELECT qty FROM reservation WHERE reserve_Id='$reserveId'");
        $row = mysqli_fetch_array($sql2);
        if($row['qty'] == 1) {
            $sql3 = mysqli_query($conn, "DELETE FROM reservation WHERE reserve_Id='$reserveId' ");
        } else {
            $sql = "UPDATE reservation SET qty = qty - 1 WHERE reserve_Id = $reserveId";
        }
        
           
        
        
    }

    // Perform the action based on the button click (e.g., deduct quantity)
    if ($action === 'plus') {
        $sql = "UPDATE reservation SET qty = qty + 1 WHERE reserve_Id = $reserveId";
    }

    if ($conn->query($sql) === TRUE) {
        // Fetch the updated quantity value and return it
        $newQty = getUpdatedQuantity($conn, $reserveId);
        echo json_encode(array('newQty' => $newQty));
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function getUpdatedQuantity($conn, $reserveId) {
    $sql = "SELECT * FROM reservation JOIN product ON reservation.prod_Id=product.prod_Id WHERE reserve_Id = $reserveId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['qty'];
        $price = $row['price'];
        $newSubtotal = $price * $newQty;
    }

    return 0;
}

?>