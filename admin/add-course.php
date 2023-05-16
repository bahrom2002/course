<?php require ('sections/head.php'); ?>
<?php require('sections/menu.php'); ?>
<?php // require ('sections/header.php'); ?>

<?php include ('../dbmysql.php'); ?>
<?php include ('../functions.php'); ?>

<?php

if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']))
{
    $data = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'description' => $_POST['description'],
    ];


    addCourse($data);
}

?>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h1>Kurslar qo'shish</h1>
            <form action="add-course.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Kurs nomi</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Kurs nomi">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"> Kurs rasmi</label>
                    <input name="image" type="file" class="form-control" id="image" placeholder="Kurs rasmi">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"> Kurs narxi</label>
                    <input name="price" type="text" class="form-control" id="price" placeholder="Kurs narxi">
                </div>
                <div class="mb-3">
                    <label for="description">Kurs haqida</label>

                    <textarea id="" name="description" class="form-control" rows="4" cols="50"></textarea>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Saqlash">
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
<?php require ('sections/footer.php'); ?>