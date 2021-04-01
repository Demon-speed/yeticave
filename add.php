<?php
require_once ('functions.php');
require 'data.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $required_fields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    $error = [];
    $lot_name = $_POST['lot-name'] ? : '';
    $category = $_POST['category'] ? : 'Выберите категорию';
    $message = $_POST['message'] ? : '';
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
    if(isset($_FILES['lotPhotos'])){
        $finfo = finfo_open(FILEINFO_MINE_TYPE);
        $file_name = $_FILES['lotPhotos']['name'];
        $file_path = __DIR__ . '/img/';
        $file_tmpname = $_FILES['lotPhotos']['tmp_name'];
        $file_type = finfo_file($finfo, $file_tmpname);
        if($file_type == 'image/gif'){
            move_uploaded_file($_FILES['lotPhotos']['tmp_name'], $file_path . $file_name);
        }
        $file_url = 'img/' . $file_name;
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
        $con = mysqli_connect('127.0.0.1', 'root', '','yeticave');
        mysqli_set_charset($con,'utf8');
        $sql = "SELECT categ_id FROM categories WHERE categ_name='{$lot['category']}' ";
        $result = mysqli_query($con,$sql);
        $lot['category'] = mysqli_fetch_assoc($result)['categ_id'];

        $sql = "INSERT INTO lots(lot_image, lot_name, lot_cr_date, lot_comp_date,lot_step, lot_start_price, lot_discr, lot_user_id, lot_winner_id,  lot_categ_id  )
        VALUE ( '{$lot['image']}','{$lot['name']}',  '01.01.2001', '{$lot['timer']}','{$lot['rate']}', '{$lot['start_price']}','{$lot['description']}', '12345', '12345', '{$lot['category']}' )";
        $result = mysqli_query($con, $sql);
        if(!$result)
            echo mysqli_error($con);
    }
}

    else{
    $page_content =include_template('add.php',
    ['categories_list'=>$categories_list,
        'data_list'=>$data_list,
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
