<?php 
include 'connect.php';

if(isset($_GET['show'])){

     $num = $_GET['ordersNumber'];

     $sql = "SELECT * FROM orders LIMIT $num";
     $result = mysqli_query($conn, $sql);
     $rows = mysqli_fetch_all($result , MYSQLI_ASSOC);

}

?>

<html>
  <head>
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
   <body>

        <form class="form" method="GET" action="latest-orders.php">
                <div class="container my-5">

                        <div class="form-g"> 
                            <label for="my-input">Latest Nnumber of Order</label>
                            <input class="form-control" type="text" name="ordersNumber">
                        </div>

                        <button type="submit" name="show" class="btn btn-primary my-3">Show</button>
                </div>
        </form>

        <h1 class="container">Latest Orders</h1>
        <table class="table table-bordered table-striped container">
                <thead>
                    <th>Order Number</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                </thead>
                <tbody>
                    <?php
                    if(!isset($rows)) {
                        echo "<tr><td>NO Data</td> <td>NO Data</td></tr>";
                    } else {
                    foreach($rows as $row) { ?>
                    <tr>
                    <td><?= $row['orderNumber']?></td>
                    <td><?= $row['orderDate']?></td>
                    <td><?= $row['status']?></td>
                    </tr>
                    <?php } 
                    }?>
                </tbody>
        </table>
     
   
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
   </body>
</html>