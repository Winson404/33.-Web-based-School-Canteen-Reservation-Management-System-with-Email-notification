<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web-based School Canteen Reservation Management System | Food Products Information</title>
  <?php 
  require_once 'header.php'; 
  require_once 'classes/product.php';
  ?>
  <style>
    .cover-image {
      background-image: url('assets/images/canteen.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-align: center;
      position: relative;
    }

    .cover-image::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Adjust the last value (0.5) for opacity */
    }

    .cover-text {
      font-size: 45px;
      text-transform: uppercase;
      position: relative;
      z-index: 1;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="cover-image">
    <div class="cover-text text-white">
      <b>School Canteen Reservation System</b>
    </div>
  </div>

  <?php include 'footer.php'; ?>
</body>
</html>
