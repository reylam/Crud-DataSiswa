<?php
include_once './Models/Student.php';

$students = Student::index();

if (isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis'  => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");
}

if (isset($_POST['delete'])) {
    $response = Student::delete($_POST['id']);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");    
}

?>
<?php include './layout/top.php'; ?>
<?php include './layout/header.php'; ?>
<div class="bg-black flex h-screen">
    <div class="basis-1/4 border-r border-slate-800">
        <div class="m-3 bg-slate-500 rounded-lg">
            <form method="POST" action="" class="p-3">
                <div class="mb-3">
                    <label class="text-white active:border-red-600" for="name">Nama</label>
                    <input class="text-slate-300 w-full bg-slate-500 border-b-2 border-slate-400 " type="text" name="name" id="name" placeholder="Budi">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="nis">Nis</label>
                    <input class="text-slate-300 w-full bg-slate-500 border-b-2 border-slate-400" type="number" name="nis" id="nis" placeholder="Nis">
                </div>
                <div class="grid grap-3">
                    <button class="p-3 bg-slate-600 shadow-lg  text-white font-semibold rounded-md hover:bg-slate-700 hover:duration-300 hover:text-cyan-400" name="submit" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    <div class="basis-3/4 m-3">
        <div class="p-2 bg-slate-500 rounded-md">
            <div class="text-3xl text-slate-800 text-center font-bold mb-5">Data Siswa RPL</div>
            <table class="table-auto table-primary table-striped table-hover table-bordered table-sm table-responsive-sm w-full">
                <thead>
                    <tr class="border-2 border-slate-400 bg-slate-700">
                        <th class="text-white" scope="col">No</th>
                        <th class="text-white text-start" scope="col">Nama</th>
                        <th class="text-white" scope="col">Nis</th>
                        <th class="text-white" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-2 border-slate-400 bg-gray-700">
                    <?php foreach ($students as $key => $student) : ?>
                        <tr class="border-2 border-slate-400">
                            <th class="text-white" scope="row"><?= $key + 1 ?></th>
                            <td class="text-slate-300"><?= $student['name'] ?></td>
                            <td class="text-slate-300 text-center"><?= $student['nis'] ?></td>
                            <td class="justify-center flex">
                                <a href="detail.php?id=<?= $student['id']?>" class="m-1 w-9 h-9  bg-blue-600 bg-opacity-50 rounded-xl hover:bg-opacity-90 hover:duration-150">
                                    <img class="m-2 w-5 h-5" src="assets/eye.png">
                                </a>
                                <a href="edit.php?id=<?= $student['id']?>" class="m-1 w-9 h-9  bg-blue-600 bg-opacity-50 rounded-xl hover:bg-opacity-90 hover:duration-150">
                                    <img class="m-2 w-5 h-5" src="assets/pencil.png" alt="">
                                </a>
                                <form action="" method="POST" class="inline">
                                    <input type="hidden" name="id"value="<?= $student['id']?>">
                                    <button type="submit" name="delete" class="m-1 w-9 h-9  bg-red-900 bg-opacity-70 rounded-xl hover:bg-opacity-100 hover:duration-150">
                                        <a href="">
                                            <img class="m-2 w-5 h-5" src="assets/trash.png" alt="">
                                        </a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include './layout/footer.php'; ?>
<?php include './layout/bottom.php'; ?>