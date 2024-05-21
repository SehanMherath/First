<?php

require_once ("./connection.php");
require_once ("process1.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Registration</title>
</head>

<body>
    
    <!-- Book Table -->
    <div class="container"> 
    <div class="Booktable">
        <table>
            <thead>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Book Category</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT b.book_id, b.book_name, bc.category_Name FROM book b JOIN bookcategory bc ON b.category_id = bc.category_id";
                $result = $pdo->query($sql);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $row['book_id']; ?></td>
                            <td><?php echo $row['book_name']; ?></td>
                            <td><?php echo $row['category_Name']; ?></td>
                            <td>
                                <form action="process.php" method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                                    <input type="text" name="book_name" value="<?php echo $row['book_name']; ?>">
                                    <select name="book_category">
                                        <option value="Fiction" <?php echo ($row['category_Name'] == 'Fiction') ? 'selected' : ''; ?>>Fiction</option>
                                        <option value="Non-Fiction" <?php echo ($row['category_Name'] == 'Non-Fiction') ? 'selected' : ''; ?>>Non-Fiction</option>
                                        <option value="Science" <?php echo ($row['category_Name'] == 'Science') ? 'selected' : ''; ?>>Science</option>
                                        <option value="History" <?php echo ($row['category_Name'] == 'History') ? 'selected' : ''; ?>>History</option>
                                    </select>
                                    <button type="submit">Update</button>
                                </form>
                                <form action="process.php" method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>
                        
                        <?php
                    }
                } else {
                    echo '0 results';
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

    <!-- Book registration form -->
    <h1>Register Books</h1>
    <div class="name">

        <form action="process1.php" method="post" id="frm">

            <label for="book_id">Book Id</label><br><br>
            <input id="bid" name="book_id" type="text" placeholder="B001" required><br><br>

            <label for="book_name">Book Name</label><br><br>
            <input id="bname" name="book_name" type="text" placeholder="Enter book name" required><br><br>

            <label for="book_category">Book Category</label><br><br>
            
            <select name="book_category" id="book_category">
                <option value="Sci-fi">Sci-fi</option>
                <option value="Adventure">Adventure</option>
            </select><br><br>

            <button type="submit" name="submit">submit</button>

        </form>

    </div>

</body>

</html>