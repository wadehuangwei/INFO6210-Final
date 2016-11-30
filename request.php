<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Request
    </title>
</head>
<body>
    <a href='homepage.php'>Home Page</a>
    <h1>Request Page</h1><br> 
    <form action="">
        <input type="text" name="location"></input>
        <button type="submit">submit</button>
        <br/>
        <?php
            if (!empty($instagram_array)) {
                foreach ($instagram_array['data'] as $image) {
                    echo '<img src="' .$image['images']['low_resolution']['url'] .'"alt=""/>';
                }
            }
        ?>
    </form>
</body>
</html>