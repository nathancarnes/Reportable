<?php
require_once('Reportable.php');

$report = new Reportable();

$report->addHeader('<strong>Full Name</strong>');
$report->addHeader('Email');
$report->addHeader('Phone Number');

$report->addRow('Jane Doe', 'jdoe@gmail.com', '555-555-5555');
$report->addRow('Michael Bluth', 'frznbanana@comcast.net', '555-555-4444');
$report->addRow('Sterling Archer', 'dangerzone@hotmail.com', '555-555-333');

$report->generateCSV();
echo $report->linkToCSV();
?>