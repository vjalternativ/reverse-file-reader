<?php
require_once 'src/ReverseFileReader.php';

$ob = new ReverseFileReader("/<path>/file.log");

$rows = array();

// reading lines from end of the file with 4096

while ($data = $ob->readLines()) {
    $rows[] = $data;
}

//

$rows = array_reverse($rows);

foreach ($rows as $row) {
    echo $row;
}