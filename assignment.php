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