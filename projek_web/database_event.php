<?php
$dataFile = 'data.json';
$data = [];

if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Database EventInCampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" defer></script>
</head>
<?php include 'includes/navbar.php';?>
<body class="bg-[#FAFAFA]">

    <h1 class="text-3xl text-center text-[#3A5635] font-bold my-8">Database EventInCampus</h1>

    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
        <table id="eventTable" class="min-w-full border-collapse border border-gray-300 text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Universitas</th>
                    <th class="border border-gray-300 px-4 py-2">Nama Event</th>
                    <th class="border border-gray-300 px-4 py-2">Harga Tiket</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $event): ?>
                <tr>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($event['universitas']) ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($event['nama_event']) ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($event['harga_tiket']) ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($event['tanggal']) ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($event['alamat']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new simpleDatatables.DataTable("#eventTable");
        });
    </script>
</body>
<?php include 'includes/footer.php';?>
</html>
