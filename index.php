<?php 
ob_start();
ini_set('session.cookie_httponly', true);
require('includes/header.php');
require('includes/config.php');
require('includes/functions.php');
?>
<div class="container">
    <div class="row justify-content-center">
        <div class='col-xs-12 col-sm-10 col-md-8'>
            
            <div class="card mt-5">
                <div class="card-header d-flex">
                    List of customers
                    <a href="register.php" class="btn btn-sm btn-success ml-auto">Add new customer</a>
                </div>        

                <div class="card-body">

                    <?php 
                    $results = getAllCustomers(); 
                    $num_rows = mysqli_num_rows($results);
                    if ($num_rows > 0){ ?>

                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Town name</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                while ($rows = mysqli_fetch_assoc($results)){ ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo noHTML($rows['first_name']) ?></td>
                                        <td><?php echo noHTML($rows['last_name']) ?></td>
                                        <td><?php echo noHTML($rows['town_name']) ?></td>
                                        <td><?php echo noHTML($rows['gender_name']) ?></td>
                                        <td>
                                            <a href="update.php?id=<?php echo noHTML($rows['id']); ?>">Edit</a> |
                                            <a href="delete.php?id=<?php echo noHTML($rows['id']); ?>" onclick="return confirm('You are about to delete customer <?php echo noHTML($rows['first_name']).' '.noHTML($rows['last_name']) ?>');">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>              
                    
                    <?php
                    } else { ?>
                        <p>No customers to show</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require('includes/footer.php');
?>