<?php
    include 'connection.php';
    $query = mysqli_query($link, "SELECT market.id, market.title, market.description, market.price, market.count, images.name
                                 FROM market LEFT JOIN images ON market.id =images.car_id AND images.avatar = 1 ORDER BY market.id");
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="w-75 mx-auto mt-5">
        <table class="table table-striped">
            <thead>
                <tr >
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th width="15%" scope="col">Main image</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Count</th>
                <th scope="col"><span>Actions</span><a class="float-right" href="add_car.php">Add a car</a></th>
                </tr>
            </thead>
            <tbody>
            <?php while( $car = mysqli_fetch_assoc($query)) : ?>
                    <tr id="<?= $car['id']; ?>">
                        <td><?= $car['id']; ?></td>
                        <td><?= $car['title']; ?></td>
                        <td>
                            <img class="img-thumbnail"src="uploads/<?php if(isset($car['name'])) echo $car['name']; ?>">
                            <!-- <button onclick="changeAvatar()">Change</button> -->
                        </td>
                        <td><?= $car['description']; ?></td>  				   				   				  
                        <td><?= $car['price']; ?></td>
                        <td><?= $car['count']; ?></td>
                        <td class="d-flex justify-content-between">
                            <a href="edit.php?id=<?= $car['id']; ?>" class="btn btn-secondary text-light w-50 mr-1">Edit</a>
                            <button onclick="deleteCar(<?= $car['id'];?>)" class="btn btn-danger w-50">Delete</button>
                        </td>
                    </tr>
                <?php endwhile ?>
                

            </tbody>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js//delete.js"></script>


</body>
</html>