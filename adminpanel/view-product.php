<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>All Books</h2>
                <hr>
                <?php
                include('config.php');
                $limit = 3;
                $page = $_GET['page'];
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $offset = ($page-1)*$limit;

                $fetch_cat = "SELECT * FROM `add-books`as b inner join `books_categorey` as c on b.category = c.cid ORDER BY `book_id` LIMIT {$offset},{$limit}";
                $fetch_result = mysqli_query($connection, $fetch_cat);
                if(mysqli_num_rows($fetch_result) > 0){
                ?>
            <table class="table table-dark">
                <thead class="bg-dark p-2 text-light bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">Book Title</th>
                    <th scope="col">Book Category</th>
                    <th scope="col">Book Discription</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Book Image</th>
                    <th scope="col">Book Price</th>
                    <th scope="col">Book Status</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($fetch_result)){ ?>
                <tbody>
                    <tr>
                    <td scope="row"><?php echo $row['book_title']; ?></td>
                    <td scope="row"><?php echo $row['categorey_name']; ?></td>
                    <td><?php echo $row['book_discription']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><img src="<?php echo 'books-images/' . $row['book_img']; ?>" alt="Book Image" height="80px" width="80px"></td>
                    <td><?php echo $row['book_price']; ?></td>
                    <td><?php echo $row['book_status']; ?></td>
                    <td ><a href="updatebook.php?id=<?php echo $row['book_id']; ?>" class="btn btn-success">Update</a></td>
                    <td ><a href="deletebook.php?delid=<?php echo $row['book_id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
                </tbody>
                <?php } ?>
            </table>
            <?php
                }
            
                $sql1 = "SELECT * FROM `add-books`";
                $result1 = mysqli_query($connection, $sql1) or die("Pagination Query Failed");
                if(mysqli_num_rows($result1) > 0){
                    $books = mysqli_num_rows($result1);
                    $total_pages = ceil($books/$limit);
                    echo '<nav aria-label="Page navigation example">';
                    echo '<ul class="pagination">';
                    if($page>1){

                        echo '<li class="page-item"><a class="page-link" href="view-product.php?page='.($page-1).'">Previous</a></li>';
                    }
                    for($i = 1; $i <= $total_pages; $i++){
                        if($i == $page){
                            $active = "active";
                        }else{
                            $active = "";
                        }

                        echo '<li class="'.$active.'" class="page-item"><a class="page-link" href="view-product.php?page='. $i .'">'. $i .'</a></li>';

                        }
                        if($total_pages>$page){

                            echo '<li class="page-item"><a class="page-link" href="view-product.php?page='.($page+1).'">Next</a></li>';
                        }
                echo '</ul>';
                echo ' </nav>';
            }
            ?>
            
                <!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
                <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->

            </div>

        </div>

    </div>


</body>

</html>
<?php
include('admin/includes/footer.php');
?>