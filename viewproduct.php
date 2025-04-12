<?php
include("php/query.php");
include("components/header.php");
?>

           <!-- Blank Start -->
           <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                    
                    </div>
                </div>
            </div>

            <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product description</th>
                                            <th scope="col">Product price</th>
                                            <th scope="col">Product Quantity</th>
                                            <th scope="col">category</th>
                                            <th>Product Image</th>
                                            <!-- <th scope="col">Status</th>  -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = $PDO->query("select product.id , product.name as pName, produts.price, product.qty , product.decription, product.image, categories.name as cName from producta inner join categories on products.c_id = categories.id ");
                                        $allCategorys = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($allProducts as $product)
                                        ?>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td><?php echo $product['pName'] ?></td>
                                            <td><?php echo $product['descrption'] ?></td>
                                            <td><?php echo $product['price'] ?></td>
                                            <td><?php echo $product['qty'] ?></td>
                                            <td><?php echo $product['cName'] ?></td>
                                            <td><img height="100px" src="images/"<?php echo $product['image'] ?> alt=""></td>
                                            <td><a href="editproduct.php?cId-<?php echo $product['id'] ?>"  class="btn btn-info">Edit</a></td>
                                            <td><a href="?categoryId=<?php echo $category['id']?>" class="btn btn danger">Remove</a></td>
                                            
                                        </tr>
                                        <?php 
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
include("components/footer.php");
?>