<?php

include_once './Models/Student.php';

$id = $_GET['id'];
$student = Student::show($id);
?>

<?php include_once './layout/top.php';?> 
<?php include_once './layout/header.php';?>

    <div class="flex bg-slate-300 rounded-xl p-3 "> 
        <div class="basis-1/5">
            <p class="font-bold">Nama:</p>
            <p class="font-bold">Nis:</p>
        </div>
        <div class="basis-4/5">
            <p><?= $student['name'] ?></p>
            <p><?= $student['nis'] ?></p>
        </div>
    </div>
    <a href="index.php">
        <div class="bg-gray-700  w-full p-5 text-center text-xl font-bold text-white hover:bg-gray-800 ">
            Kembali
        </div>
    </a>
    
<?php include_once './layout/footer.php';?>
<?php include_once './layout/bottom.php';?>