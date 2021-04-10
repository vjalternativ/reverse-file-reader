<?php
require_once 'src/ReverseFileReader.php';

$ob = new ReverseFileReader("/<path>/file.log");

$rows = array();

while ($data = $ob->readLines()) {
    $rows[] = $data;
}
$rows = array_reverse($rows);

foreach ($rows as $row) {
    echo $row;
}