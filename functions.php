<?php
$is_auth = rand(0, 1);

$user_name = 'Persona1'; // укажите здесь ваше имя

$categories_list = [
'board' => 'Доски и лыжи',
'fastenings' => 'крепления',
'boots' => 'ботинки',
'clothing' => 'одежда',
'tools' => 'Инструменты',
'other' => 'Разное',
];

$data_list = [
[
'name'=>'2014 Rossignol District Snowboard',
'categories'=>'Доски и лыжи',
'price'=>'10999',
'url'=>'img/lot-1.jpg',
],

[
'name'=>'DC Ply Mens 2016/2017 Snowboard',
'categories'=>'Доски и лыжи',
'price'=>'15999',
'url'=>'img/lot-2.jpg',
],
[
'name'=>'Крепления Union Contact Pro 2015 года размер L/XL',
'categories'=>'Крепления',
'price'=>'8000',
'url'=>'img/lot-3.jpg',
],
[
'name'=>'Ботинки для сноуборда DC Mutiny Charocal',
'categories'=>'Ботинки',
'price'=>'10999',
'url'=>'img/lot-4.jpg',
],

[
'name'=>'Куртка для сноуборда DC Mutiny Charocal',
'categories'=>'Одежда',
'price'=>'7500',
'url'=>'img/lot-5.jpg',
],

[
'name'=>'Маска Oakley Canopy',
'categories'=>'Разное',
'price'=>'5400',
'url'=>'img/lot-6.jpg',
]

];

function sum_format($number)
{
    $number = ceil($number);
    $f = true;
    if ($number >= 1000) {
        $price_n = number_format($number, 0, '.', ' ');
    } else {
        $price_n = $number;
    }

    if ($f == true) {
        return $price_n . '<b class=\"rub\">р</b>';
    } else {
        return $price_n;
    }

}

function timer_to(){
    $time_now = strtotime('now');
    $time_tomorrow= strtotime('tomorrow');

    $time_sub = $time_tomorrow-$time_now;

    $time_minutes=floor( $time_sub/60);
    $time_hours=floor($time_minutes/60);
    $time_minutes=$time_minutes-$time_hours*60;

    $result=sprintf('%02d:%02d',$time_hours,$time_minutes);
    return $result;
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}

?>
