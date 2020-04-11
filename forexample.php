<?php

require 'rb.php';

R::setup('sqlite:database.sqlite');

$book = R::dispense( 'book' );
$book->title = 'Learn to Program';
$book->rating = 10;
$id = R::store( $book );

$books = R::findAll('book');

foreach($books as $temp) echo $temp->id . "</br>";

// echo "<pre>"; print_r( $books );
?>
<html>
<head>
    <title>CRUD</title>
</head>

<body>

</body>
</html>