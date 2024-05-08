<!DOCTYPE html>
<html>
<head>
    <title>Filter List</title>
</head>
<body>
    <h1>Filter List</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="list_a">List A (separate with newlines):</label>
        <textarea id="list_a" name="list_a" rows="6" cols="30"><?php echo isset($_POST['list_a']) ? $_POST['list_a'] : ''; ?></textarea><br><br>
        
        <label for="list_b">List B (separate with newlines):</label>
        <textarea id="list_b" name="list_b" rows="4" cols="30"><?php echo isset($_POST['list_b']) ? $_POST['list_b'] : ''; ?></textarea><br><br>
        
        <input type="submit" value="Filter">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $list_a = $_POST["list_a"];
        $list_b = $_POST["list_b"];
        
        // Split the input strings into arrays, one URL per line
        $array_a = explode("\n", $list_a);
        $array_b = explode("\n", $list_b);
        
        // Remove any leading/trailing whitespace from each URL
        $array_a = array_map('trim', $array_a);
        $array_b = array_map('trim', $array_b);
        
        // Filter out URLs from list A that are not in list B
        $filtered_list = array_diff($array_a, $array_b);
        
        // Output the filtered list
        echo "<h2>Filtered List</h2>";
        echo "<textarea rows='6' cols='30'>";
        foreach ($filtered_list as $url) {
            echo $url . "\n";
        }
        echo "</textarea>";
    }
    ?>
</body>
</html>
