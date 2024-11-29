<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Registered Users</h2>
                <hr>
                <?php
                include('config.php');
                $fetch_cat = "SELECT * FROM `users`";
                $fetch_result = mysqli_query($connection, $fetch_cat);
                if(mysqli_num_rows($fetch_result) > 0){
                ?>
            <table class="table table-dark">
                <thead class="bg-dark p-2 text-light bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($fetch_result)){ ?>
                <tbody>
                    <tr>
                    <td scope="row"><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
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