<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course registeration Detail</title>
    <link rel="stylesheet" href="ss.css">
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, 
.table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
    font-size: 16px;
}

.table th {
    background-color: #007bff;
    color: white;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

.text-light {
    color: white;
    text-decoration: none;
}

.text-light:hover {
    text-decoration: underline;
}

button {
    font-size: 14px;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button a {
    color: white;
    text-decoration: none;
}

button a:hover {
    text-decoration: underline;
}

.btn-success {
    background-color: #28a745;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
}

.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.card-header {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    font-size: 18px;
    text-align: center;
    font-weight: bold;
}

.card-body {
    padding: 15px;
}
</style>
</head>
<body>
        <div class="container">
            <div class="row">
                 <div class="col-md-9">
                    <div class="card">
                    <div class="card-header">
                        <h1>COURSE REGISTERED STUDENT DETAILS</h1>
                    </div>
                    <div class="card-body">
                   
                    <button class="btn btn-success"> <a href="add.php" class="text-light"> Add New </a> </button>
                    
                    <br/>
                    <br/>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Course name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            $connection = mysqli_connect("localhost","root","");
                            $db = mysqli_select_db($connection,"studentapplication");

                            $sql = "select * from student";
                            $run = mysqli_query($connection, $sql);
                            $id= 1;

                            while($row = mysqli_fetch_array($run))
                            {
                                $uid = $row['id'];
                                $name = $row['name'];
                                $coursename = $row['coursename'];
                                $mobile = $row['mobile'];
                            ?>

                               <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $coursename ?></td>
                                    <td><?php echo $mobile ?></td>

                                    <td>
                                    <button class="btn btn-success"><a href='edit.php?edit=<?php echo $uid ?>' class="text-light">Edit</a></button> &nbsp;
                                    <button class="btn btn-danger"><a href='delete.php?del=<?php echo $uid ?>' class="text-light">Delete</a></button>
                                    </td>
                               </tr>
                                <?php $id++; } ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 