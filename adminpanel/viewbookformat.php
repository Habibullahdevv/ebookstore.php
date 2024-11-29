<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>View Book Format</h2>
                <hr>
                <?php
                include('config.php');
                $fetch_format = "SELECT * FROM `book_format`";
                $fetch_result = mysqli_query($connection, $fetch_format);
                if(mysqli_num_rows($fetch_result) > 0){
                ?>
            <table class="table table-dark">
                <thead class="bg-dark p-2 text-light bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">Book Format ID</th>
                    <th scope="col">Book PDF</th>
                    <th scope="col">Book Hard Copy</th>
                    <th scope="col">Book CD</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($fetch_result)){ ?>
                <tbody>
                    <tr>
                    <td scope="row"><?php echo $row['book_format_id']; ?></td>
                    <td><embed src="uploadpdf/<?php echo $row['book_pdf']; ?>" type="application/pdf"></td>
                    <td><img height="80px" width="80px" src="<?php echo 'uploadhardcopy/' . $row['book_hard_copy']; ?>" alt="Book Hard Copy"></td>
                    <td><img height="80px" width="80px" src="<?php echo 'uploadcd/' . $row['book_cd']; ?>" alt="Book PDF"></td>
                    <td ><a href="" class="btn btn-success">Update</a></td>
                    <td ><a href="delbookformat.php?del=<?php echo $row['book_format_id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                </tbody>
                <?php } ?>
            </table>
            <?php
                    
                }
            
            ?>
            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>