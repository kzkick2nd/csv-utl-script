<?php

$data_subject_csv = "";
$data_object_csv = "";
$output_csv = "";


function get_csv_data($file) {
    setlocale(LC_ALL, 'ja_JP.UTF-8');

    $fp = fopen($file, 'r');
    $data = array();
    while ($row = fgetcsv($fp)) {
       $data[] = $row;
    }
    fclose($fp);

    return $data;
}
$data_subject = get_csv_data($data_subject_csv);
$data_object = get_csv_data($data_object_csv);
$file = fopen($output_csv, "a");

$diff = array_diff($data_subject, $data_object);
foreach ($diff as $values) fputcsv($file, $values);

fclose($file);
