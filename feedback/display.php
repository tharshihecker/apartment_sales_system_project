<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="hs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedbackdetails</title>
</head>
<body>
    <center>
        <div class="container">
            <button class="btn"><a href="user.php">Add feedback</a></button>
        </div>
   
        <table class="table">
            <thead>
                      <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">message</th>
                    <th scope="col">operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM feedback";
                $result = mysqli_query($con, $sql);
                
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $message = $row['message'];
                        echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $name . '</td>
                                <td>' . $email . '</td>
                                <td>' . $message . '</td>
                                <td>
                                    <button class="update"><a href="update.php?updateid='.$id.'">update</a></button>
                                    <button class="delete"><a href="delete.php?deleteid=' . $id . '">delete</a></button>
                                </td>
                            </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </center>
    <script>
        
        document.querySelectorAll('.update').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                alert('Update feedback id'+id);
                
            });
        });

        document.querySelectorAll('.delete').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete ID ' + id + '?')) {
                    alert('Delete feedback id'+id );
                   
                }
            });
        });
    </script>
</body>
</html>