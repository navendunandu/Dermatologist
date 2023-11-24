<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id  inner join tbl_seller k on k.seller_id=p.seller_id where true ";
       
        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND sc.subcategory_id IN(".$subcategory.")";
        }
		
		if ($_GET["name"]!=null) {

            $name = $_GET["name"];

            $sqlQry = $sqlQry." AND product_name LIKE '".$name."%'";
        }
        $resultS = $conn->query($sqlQry);
        
       

        if ($resultS->num_rows > 0) {
            while ($rowS = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/Product/<?php echo $rowS["product_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rowS["product_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $rowS["product_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $rowS["category_name"]; ?><br>
                                            <?php echo $rowS["subcategory_name"]; ?><br>
                                        </p>
                                        
                                            <?php
										
											
										
											
									
                                            $stock = "select sum(stock_qty) as stock from tbl_stock where product_id = '" . $rowS["product_id"] . "'";
											$result2 = $conn->query($stock);
                            				$row2=$result2->fetch_assoc();
											
											$stocka = "select sum(cart_quantity) as stock from tbl_cart where product_id = '" . $rowS["product_id"] . "'";
											$result2a = $conn->query($stocka);
                            				$row2a=$result2a->fetch_assoc();
											
											$stock = $row2["stock"] - $row2a["stock"];
											?>
                                            <p align="center" style="color:#F96;font-size:20px">Qty <?php echo $stock; ?>-Left</p>
                                            <?php
											
                                                if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $rowS["product_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>