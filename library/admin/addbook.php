<html>
    <head>
        <title>Add new book</title>
    </head>

<body>
   
    <h1 style="text-align: center;">Input Form</h1>
    <form action="addbook1.php" method="POST">
        <table border="1" width="800" height="500" align="center">
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="b_id">
                </td>
            </tr>
            <tr>
                <td>Book Name</td>
                <td>
                    <input type="text" name="b_name">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <input type="text" name="b_description">
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>
                <input type="number" name="quantity" min="1" max="100">
                </td>
            </tr>
            <tr>
                <td>Author</td>
                <td>
                    <input type="text" name="author">
                </td>
            </tr>
            <tr>
                <td>year</td>
                <td>
                    <input type="text" name="year">
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <input type="text" name="category">
                </td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td>
                    <input type="text" name="isbn">
                </td>
            </tr>
            <tr>
                <td>Language</td>
                <td>
                    <input type="text" name="language">
                </td>
            </tr>
            <tr>
                <td>Photo</td>
                <td>
                <input type="file" name="photo">
                </td>
            </tr>
            
            
            <tr>
            <td></td>
                <td><input type="submit" value="Add"></td>
            </tr>
        </table> 
    </form>

</body>
</html>
