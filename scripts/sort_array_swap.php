<?php
/**
 * Created by PhpStorm.
 * User: helen
 * Date: 06/04/16
 * Time: 09:37
 * 2. Имеется массив числовых значений [4, 5, 8, 9, 1, 7, 2].
 * В распоряжении есть функция array_swap(&$arr, $num) { … }
 * которая меняем местами элемент на позиции $num и элемент на 0 позиции.
 * Т.е. при выполнении array_swap([3, 6, 2], 2) на выходе получим [2, 6, 3].
 * Написать код, сортирующий массив по возрастанию, используя только функцию array_swap.
 */

$arr = [4,5,8,9,1,7,2];
print_r(super_sort($arr));

/**
 * @param $array
 * @return mixed
 */
function super_sort($array){
    $index = count($array)-1;
    while($index){
        foreach($array as $k => $v){
            if($index == $k){
                break;
            } if($array[0] < $v){
                array_swap($array,$k);
            }
        }
        array_swap($array,$index);
        $index--;
    }
    return $array;
}

/**
 * @param $array
 * @param $index
 * @return array
 */
function array_swap(&$array, $index){
    $temp = $array[$index];
    $array[$index] = $array[0];
    $array[0] = $temp;
    return $array;
}