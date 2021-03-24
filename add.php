<?php
require_once ('functions.php');
require 'data.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $required_fields = ['lot-name','category','lot_discr','lot-rate','lot_step','lot-date'];
    $error = [];
    $lot_name = $_POST['lot-name'] ? : '';
    $category = $_POST['category'] ? : 'Выберите категорию';
    $message = $_POST['lot_discr'] ? : '';
    $lot_rate = $_POST['lot-rate'] ? : '';
    $lot_step = $_POST['lot-step'] ? : '';
    foreach ($required_fields as $field){
    if(empty($_POST[$field])){
        $error[$field] = 'form__item--invalid';
        $form_error = 'form--invalid';
    }


    if($field =='lot-rate') {
        if (!filter_var($_POST[$field], FILTER_VALIDATE_INT)) {
            $error[$field] = 'Начальная цена должна быть корректной';
        }
        if (intval($_POST[$field]) <= 0) {
            $error[$field] = 'Начальная цена должна быть корректной';
        }
    }
        if ($field== 'lot-step'){
            if(!filter_var($_POST[$field], FILTER_VALIDATE_INT)){
    $error[$field] = 'Шаг ставки должен быть корректным';
            }
            if(intval($_POST[$field]) < 0 ){
                $error[$field] = 'Начальная цена должна быть корректной';
            }
        }

    }
    if (count($errors) !== 0) {
    $page_content = include_template('add.php',
    ['errors' => $errors,
        'categories_list' => $categories_list]);
        }else {
        $lot =[
            "image" => file_url ? 'img/user.jpg': '',
            "name"=> $_POST ['lot-name'],
            "start_price"=> $_POST['lot-rate'],
            "rate"=>$_POST['lot-step'],
            "timer"=>$_POST['lot-date'],
            "category"=> $_POST ['category'],
            "description"=> $_POST['lot_discr'],
            "account_id"=> $_SESSION ['auth']['account_id']
        ];
        $page_content=include_template( 'add.php',
        ['categories_list'=>$categories_list,
            'lot'=>$lot,
            'data_list'=> $data_list,
            'timer_to'=>$timer_to]);
    }
}

    else{
    $page_content =include_template('add.php',
    ['categories_list'=>$categories_list,
        'data_list'=>$data_list;
        'timer_to'=>$timer_to]);
    }

    $layout_content =include_template('layout.php',
    ['page_layout'=>'Главная страница',
    'is_auth' => $is_auth,
    'user_image' => $user_image,
    'user_name' =>$user_name,
    'page_content' => $page_content,
    'categories_list'=>$categories_list]);
print($layout_content);
?>
