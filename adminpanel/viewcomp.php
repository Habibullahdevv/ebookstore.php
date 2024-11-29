<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Upcoming Competitions</h2>
                <hr>
                <?php
                include('config.php');
                $fetch_comp = "SELECT * FROM `competition`";
                $fetch_result = mysqli_query($connection, $fetch_comp);
                if(mysqli_num_rows($fetch_result) > 0){
                ?>
            <table class="table table-dark">
                <thead class="bg-dark p-2 text-light bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">Competition ID</th>
                    <th scope="col">Competition Name</th>
                    <th scope="col">Competition Date</th>
                    <th scope="col">Competition Time</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($fetch_result)){ ?>
                <tbody>
                    <tr>
                    <td scope="row"><?php echo $row['compname']; ?></td>
                    <td><?php echo $row['compdate']; ?></td>
                    <td><?php echo $row['comptime']; ?></td>
                    <td ><a href="updatecomp.php?comp=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td ><a href="delcomp.php?comp=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                </tbody>
                <?php } ?>
            </table>
            <?php
                    
                }
            
            ?>
            <!-- <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav> -->

            </div>

        </div>

    </div>


</body>

</html>










    <?php
    include('admin/includes/footer.php');


    ?>