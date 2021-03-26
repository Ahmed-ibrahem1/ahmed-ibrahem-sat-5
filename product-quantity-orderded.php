<?php 
include 'connect.php';

if(isset($_GET['show'])){

     $name = $_GET['name'];

     $sql = " SELECT orderNumber , productCode , quantityOrdered FROM `orderdetails` 
                WHERE productCode = (
                        SELECT productCode FROM `products` 
                        WHERE productName = '$name'
                    )    
                GROUP BY orderNumber
            ";

     $result = mysqli_query($conn, $sql);
     $rows = mysqli_fetch_all($result , MYSQLI_ASSOC);

     

    $sql2 = " SELECT  productCode , SUM(quantityOrdered) AS sum FROM `orderdetails` 
                WHERE productCode = (
                        SELECT productCode FROM `products` 
                        WHERE productName = '$name'
                    )    
                GROUP BY productCode
            ";
    $result2 = mysqli_query($conn, $sql2);
    $rowrr = mysqli_fetch_assoc($result2);
    
}

?>

<html>
  <head>
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
   <body>

        <form class="form" method="GET" action="product-quantity-orderded.php">
                <div class="container my-5">

                        <div class="form-g"> 
                            <label for="my-input">Product Name</label>
                            <input class="form-control" type="text" name="name">
                        </div>

                        <button type="submit" name="show" class="btn btn-primary my-3">Show</button>
                </div>
        </form>

        <h1 class="container">Total number of pieces ordered of this product is : <?php echo $rowrr['sum']; ?> </h1>
        <table class="table table-bordered table-striped container">
                <thead>
                    <th>Product Number</th>
                    <th>Order Number</th>
                    <th>Total Orders</th>
                </thead>
                <tbody>
                    <?php
                    if(!isset($rows)) {
                        echo "<tr><td>NO Data</td> <td>NO Data</td> <td>NO Data</td></tr>";
                    } else {
                    foreach($rows as $row) { ?>
                    <tr>
                    <td><?= $row['productCode']?></td>
                    <td><?= $row['orderNumber']?></td>
                    <td><?= $row['quantityOrdered']?></td>
                    </tr>
                    <?php } 
                    }?>
                </tbody>
        </table>
     
   
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
   </body>
</html>