<?php
require ('sections/head.php'); ?>
<?php require('sections/menu.php'); ?>
<?php //require ('sections/header.php'); ?>
<?php require('../dbmysql.php'); ?>


<?php
$course = "SELECT * FROM course ORDER BY id DESC ";
$courses = $conn->query($course);
$courses = $courses->fetch_all(MYSQLI_ASSOC);
?>
<div class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <a class="btn btn-success" href="add-course.php">Kurs qo'shish</a>
        <h1>Kurslar ro'yxati</h1>
        <table class="table">
            <thead>
            <tr>
                <td class="col">ID</td>
                <td class="col">Nomi</td>
                <td class="col">Narxi</td>
                <td class="col">Malumoti</td>
                <td class="col">Amallar</td>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $course):?>
                <tr>
                    <th><?= $course['id']; ?></th>
                    <th><?= $course['name']; ?></th>
                    <th><?= $course['price']; ?></th>
                    <th><?= $course['description']; ?></th>

                    <td>
                        <a href="edit-course.php?id=<?= $course['id'];?>" class =  "btn btn-warning" >O'zgartirish</a>
                        <a href="delete-course.php?id=<?= $course['id'];?>" class =  "btn btn-danger" >O'chirish</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<?php require ('sections/footer.php');?>
