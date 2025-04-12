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
            <!-- Blank End -->
            <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">catogary Name</th>
                                            <th scope="col">catogary description</th>
                                            <th scope="col">catogary iage</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                            <!-- <th scope="col">Status</th>  -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = $PDO->query("select * from categories");
                                        $allCategorys = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($allCategorys as $category)
                                        ?>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td><?php echo $catogary['name'] ?></td>
                                            <td><?php echo $catogary['descrption'] ?></td>
                                            <td><?php echo $catogary['descrption'] ?></td>
                                            <td><img height="100px" src="images/"<?php echo $catogary['image'] ?> alt=""></td>
                                            <td><a href="editcategory.php?cId-<?php?>"  class="btn btn-info">Edit</a></td>
                                            <td><a href="?categoryId=<?php echo $category['id']?>" class="btn btn danger">Remove</a></td>
                                            
                                        </tr>
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