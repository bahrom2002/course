<?php
require 'dbmysql.php';

function redirect($page){
    header('location: ' . $page . '.php');
}

function addCourse($data){
    global $conn;

    $name = $data['name'];
    $price = $data['price'];
    $description = $data['description'];

    if (isset($_FILES['image'])){
        $folder = "../uploads/";
        $target_file = $folder . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $image_name = 'uploads/' . basename($_FILES["image"]["name"]);
        }

        $insert_sql = "INSERT INTO course (name,price, description,image) 
                               VALUES ('$name', $price, '$description', '$image_name')";

    }else{
        $insert_sql = "INSERT INTO course (name,price, description) 
                                   VALUES ('$name', $price,'$description')";

    }if ($conn->query($insert_sql)){
        redirect('course');
    }

}

function editCourse($data){
    global $conn;

    $id = $data['id'];
    $name = $data['name'];
    $price = $data['price'];
    $description = $data['description'];

    if (isset($_FILES['image'])){
        $folder = "../uploads";
        $target_file = $folder . basename($_FILES['image']["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $image_name = 'uploads/' . basename($_FILES["image"]["name"]);
        }
        $update_sql = "UPDATE course 
                               SET name = '$name', price = $price, description = '$description', image = '$image_name'
                               WHERE id = $id";
    }else{
        $update_sql = "UPDATE course 
                               SET name = '$name', price = $price, description = '$description' 
                               WHERE id = $id";
    }


    if($conn->query($update_sql)){
        redirect('course');
    }
}

function deleteCourse($id){
    global $conn;
    $delete_sql = "DELETE FROM course WHERE id = {$id}";
    $conn->query($delete_sql);
    redirect('course');
}

function getRegion(){
    global $conn;

    $sql = "SELECT * FROM region";
    $region = $conn->query($sql);
    return $region->fetch_all(MYSQLI_ASSOC);
}

function getCourse(){
    global $conn;
    $sql = "SELECT * FROM course";
    $course = $conn->query($sql);
    return $course->fetch_all(MYSQLI_ASSOC);
}

function addStudent($data){
    global $conn;

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $phone = $data['phone'];
    $region = $data['region'];
    $course = $data['course'];

    $sql = "INSERT INTO student(firstname, lastname, phone, region, course ) 
                       VALUES ('$firstname', '$lastname', '$phone', '$region', '$course')";

    if ($conn->query($sql)){
        redirect('add-student');
    }
}
