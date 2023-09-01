<?php
include_once './Models/Student.php';

$student = Student::show($_GET['id']);

if (isset($_POST['submit'])) {
    $response = Student::update([
        'id'   => $_POST['id'],
        'name' => $_POST['name'],
        'nis'  => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");
}
?>

<?php include_once './layout/top.php';?> 
<?php include_once './layout/header.php';?>
        <div class="bg-slate-500 rounded-lg absolute mt-2 w-screen">
            <form method="POST" action="" class="p-3">
                <input type="hidden" name="id" value="<?=$student['id']?>">
                <div class="">
                    <label class="text-white active:border-red-600" for="name">Nama</label>
                    <input class="text-slate-300 w-full bg-slate-500 border-b-2 border-slate-400 " type="text" name="name" id="name" value="<?=$student['name']?>">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="nis">Nis</label>
                    <input class="text-slate-300 w-full bg-slate-500 border-b-2 border-slate-400" type="number" name="nis" id="nis" value="<?=$student['nis']?>">
                </div>
                <div class="grid grap-3">
                    <button class="p-3 bg-slate-600 shadow-lg  text-white font-semibold rounded-md hover:bg-slate-700 hover:duration-300 hover:text-cyan-400" name="submit" type="submit">Kirim</button>
                </div>
            </form>
        </div>

<?php include_once './layout/footer.php';?>
<?php include_once './layout/bottom.php';?>