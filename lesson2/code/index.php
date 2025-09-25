<?php
echo "Задание 1 <br/>",  PHP_EOL;;

// способ 1
$arr1 = [1, 4, 6, 6, 8];
$arr2 = [2, 5, 7, 9];

// $mergeArr = array_merge($arr1, $arr2);
// sort($mergeArr);
// echo   implode(',', $mergeArr), "<br/>";

// способ 2
// $result = [];
// foreach ($arr1 as  $val) {
//     array_push($result, $val);
// }
// foreach ($arr2 as $value) {
//     array_push($result, $value);
// }
// sort($result);
// echo '<br/>', implode(',', $result);

// способ 3

$result = [];
$count1 = 0;
$count2 = 0;

while ($count1 < count($arr1) &&  $count2 < count($arr2)) {
    if ($arr1[$count1] < $arr2[$count2]) {
        $result[] = $arr1[$count1];
        $count1++;
    } else {
        $result[] = $arr2[$count2];
        $count2++;
    }
}

if ($count1 < count($arr1)) {
    for (; $count1 < count($arr1); $count1++) {
        $result[] = $arr1[$count1];
        # code...
    }
}

if ($count2 < count($arr2)) {
    for (; $count2 < count($arr2); $count2++) {
        $result[] = $arr2[$count2];
        # code...
    }
}


var_dump();
