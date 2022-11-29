<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="Ahlea Wright">
<title>Search for a Book</title>
<link rel="stylesheet" href="search.css">
<!--<script src="book.js"></script>-->
</head>

<body>
	
	<?php
	
    $username = "AHLEA";
    $password = "Lindsey";
    $database = "CS344F22BADREADS";

    $con = mysqli_connect("localhost", $username, $password, $database);
	
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
	
    if (isset($_GET['search'])) {
    $param = "%{$_GET['search']}%";
    $query = mysqli_prepare($con, "SELECT * FROM Results WHERE Description LIKE ?");
    mysqli_stmt_bind_param($query, "s", $param);
    mysqli_stmt_execute($query);
    $results = mysqli_stmt_get_result($query);
    $rows = mysqli_num_rows($results);
    mysqli_stmt_close($query);

    if ($rows > 0) {
        echo "<h2>Search results for: {$_GET['search']}</h2>";
             
        while ($result = mysqli_fetch_array($results)) {
            $result_title=$result['Title'];
            $result_author=$result['Author'];
            $result_blurb=$result['Blurb'];
			$result_rating=$result['Rating'];
			$result_added=$result['Added'];
				
            echo "<div class='search_result'> 						
                <h3><a href='$result_link'>$result_title</a></h3>
                <article><a href='$result_author'>$result_blurb</a></article>			
            </div>";
        }   
    } else {
        echo "<h2>No results found for your search: {$_GET['search']}</h2>";
    }
} else {
    echo "<h2>No search query provided. Please try your search again.</h2>";
}
mysqli_close();
?>
	
<div class="search-box">
    <form action="booksearch.php" method="get">
        <input type="text" name="search" maxlength="60" placeholder="Search..." required>
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
	
</body>
</html>