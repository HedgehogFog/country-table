<?php
/**
 * Created by PhpStorm.
 * User: hedgehog
 * Date: 12.08.2018
 * Time: 6:22
 */
$filename = "array.vll";

if ($_GET['update']) {
    $array = generator_random_array();
    $data = serialize($array);
    file_put_contents($filename, $data);
}

if ($_GET['num']) {
    $data = file_get_contents($filename);
    $array = unserialize($data);

    $var = search($array, $_GET['num']);
    print("<br>Index num " . $_GET['num'] . " = " . $var);
} else {
    echo "Use Get with params 'update' and 'num' for search";
}


/*
 *              (target - arr[left]) * (right - left)
 * mid = left +  ____________________________________
 *                       A[right] - A[left]
 */
function search($arr, $target)
{
    $count = count($arr);

    $left = 0;
    $right = $count - 1;


    while ($arr[$left] <= $target && $arr[$right] >= $target) {
        $numerator = ($target - $arr[$left]) * ($right - $left);
        $denominator = $arr[$right] - $arr[$left];
        $mid = $left + $numerator / $denominator;

        if ($arr[$mid] < $target)
            $left = $mid + 1;
        else if ($arr[$mid] > $target)
            $right = $mid - 1;
        else
            return $mid;


        if ($arr[$left] == $target)
            return $left;
        else
            return false;
    }
}

function generator_random_array()
{
    $arr = array();
    $last_num = -1;
    for ($i = 0; $i < 1000; $i++) {
        $num = rand($last_num + 1, $last_num + 15);
        $last_num = $num;
        $arr[] = $num;
    }
    return $arr;
}