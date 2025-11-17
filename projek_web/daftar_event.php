<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataFile = 'data.json';
    $data = [];

    if (file_exists($dataFile)) {
        $data = json_decode(file_get_contents($dataFile), true);
    }

    $newEvent = [
        'universitas' => $_POST['universitas'],
        'nama_event' => $_POST['nama_event'],
        'alamat' => $_POST['alamat'],
        'tanggal' => $_POST['tanggal'],
        'jumlah_orang' => $_POST['jumlah_orang'],
        'harga_tiket' => $_POST['harga_tiket'],
        'kategori' => $_POST['kategori'],
        'deskripsi' => $_POST['deskripsi']
    ];

    $data[] = $newEvent;
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
    header('Location: simpan_event.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftarkan Eventmu - EventInCampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php include 'includes/navbar.php';?>
<body class="bg-[#FAFAFA]">
    <h1 class="text-3xl text-center text-[#3A5635] font-bold my-8">Daftarkan Eventmu</h1>

    <form method="POST" class="bg-gray-200 max-w-3xl mx-auto p-6 rounded-xl shadow-md">
        <label class="block mb-3">Universitas :
            <input type="text" name="universitas" class="w-full p-2 rounded-lg" required>
        </label>
        <label class="block mb-3">Nama Event :
            <input type="text" name="nama_event" class="w-full p-2 rounded-lg" required>
        </label>
        <label class="block mb-3">Alamat :
            <input type="text" name="alamat" class="w-full p-2 rounded-lg" required>
        </label>

        <div class="flex gap-4 mb-3">
            <label class="block mb-3">Kategori Event :
                <select name="kategori" class="w-full p-2 rounded-lg" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Workshop">Pameran</option>
                    <option value="Event">Event</option>
                    <option value="Festival">Festival</option>
                </select>
            </label>
            <label class="flex-1">Tanggal :
                <input type="date" name="tanggal" class="w-full p-2 rounded-lg" required>
            </label>
            <label class="flex-1">Jumlah Orang :
                <input type="number" name="jumlah_orang" class="w-full p-2 rounded-lg" required>
            </label>
            <label class="flex-1">Harga Tiket :
                <input type="text" name="harga_tiket" class="w-full p-2 rounded-lg" required>
            </label>
        </div>

        <label class="block mb-3">Deskripsikan Eventmu !
            <textarea name="deskripsi" class="w-full p-2 rounded-lg"></textarea>
        </label>

        <button type="submit" class="bg-[#D88A23] text-white px-6 py-2 rounded-lg font-bold hover:bg-[#b8741c]">
            SUBMIT
        </button>
    </form>
</body>
<?php include 'includes/footer.php';?>
</html>
