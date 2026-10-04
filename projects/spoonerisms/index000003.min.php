<?php

/*
File Name: index.php
Creation Date: 07-APR-2026
*/

require '../../../vendor/autoload.php';
require '../../../config/jimpix-config.php';

$sql = "SELECT fldSpoon, fldNormal FROM j_spoonerisms order by fldSpoon";
$stmt03 = $pdo->prepare($sql);
$stmt03->execute();
$count = $stmt03->rowCount();

$output = "const myData = [";
$counter = 1;

foreach ($stmt03 as $row) {

	if($counter < $count) {
		$comma = ",";
	} else {
		$comma = "\n";
	}
	
	$spoonerism = $row['fldSpoon'];
	$spoonerism = str_replace("1", "i", $spoonerism);
	$spoonerism = str_replace("0", "o", $spoonerism);
	$spoonerism = str_replace("3", "e", $spoonerism);
	$spoonerism = str_replace("'", "\'", $spoonerism);

	$unspoonerism = $row['fldNormal'];
	$unspoonerism = str_replace("1", "i", $unspoonerism);
	$unspoonerism = str_replace("0", "o", $unspoonerism);
	$unspoonerism = str_replace("3", "e", $unspoonerism);
	$unspoonerism = str_replace("'", "\'", $unspoonerism);

	$output .= "{p:'$unspoonerism',s:'$spoonerism'}$comma";

	$counter++;

}

$output .= "];";

// dump($count);
// dump($counter);
dump($output);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto&display=swap">
    <link href="inc/styles.css" rel="stylesheet">
</head>

<body class='container'>
    <hr>
    <h1>Hello, world!</h1>
    <hr>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>