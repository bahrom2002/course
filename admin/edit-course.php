<?php require ('sections/head.php'); ?>
<?php require('sections/menu.php'); ?>
<?php // require ('sections/header.php'); ?>
<?php include ('../dbmysql.php'); ?>
<?php include ('../functions.php'); ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $get_course_sql = "SELECT * FROM course WHERE id = {$id}";
    $get_course = $conn->query($get_course_sql);
    $get_course = $get_course->fetch_assoc();
}


if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['instock'])
    && isset($_POST['description'])){

    $data = [
        'id' =>   $_POST['id'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'description' => $_POST['description'],
    ];

    editCourse($data);
}

?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Kurslarni yangilash</h1>
        <form action="edit-course.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $get_course['id'] ?>">
                <label for="name" class="form-label"> Kurs nomi</label>
                <input name="name" value="<?= isset($get_course['name']) ? $get_course['name'] : ''  ?>" type="text" class="form-control" id="name" placeholder="Kurs nomi">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"> Kurs rasmi</label>
                <input name="image" value="<?= isset($get_course['image']) ? $get_course['image'] : ''?>" type="file" class="form-control" id="image" placeholder="Kurs rasmi">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"> Kurs narxi</label>
                <input name="price" value="<?= isset($get_course['price']) ? $get_course['price'] : ''?>" type="text" class="form-control" id="price" placeholder="Kurs narxi">
            </div>

            <div class="mb-3">
                <label for="description">Kurs haqida</label>

                <textarea id="description" name="description" value="<?= isset($get_course['description']) ? $get_course['description'] : '' ?>"
                          class="form-control" rows="4" cols="50"><?= isset($get_course['description']) ? $get_course['description'] : '' ?></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require ('sections/footer.php'); ?>

