<?php

$input_csv = "";
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

$data_object = get_csv_data($input_csv);

$tmp = array();
$arry_result = array();
foreach( $data_object as $key => $value ){
    if( !in_array( $value[0], $tmp ) ) {
        $tmp[] = $value[0];
        $arry_result[] = $value;
    }
}
print_r($arry_result);

$output_file = fopen($output_csv, "a");
foreach ($arry_result as $values) fputcsv($output_file, $values);
fclose($output_file);
