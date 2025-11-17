<?php
// Baca data dari file JSON
$dataFile = 'data.json';
$data = [];

if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    $data = json_decode($jsonData, true);

    // Pastikan data adalah array
    if (!is_array($data)) {
        $data = [];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Database Event - EventInCampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php include 'includes/navbar.php'; ?>
<body class="bg-[#FAFAFA]">

    <!-- Konten Utama -->
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl text-[#3A5635] font-bold mb-6">Eventmu telah dibuat!</h1>

        <!-- Grid Card Event -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Loop melalui setiap event dalam data
            foreach ($data as $event):
                // Ambil nilai-nilai yang diperlukan
                $namaEvent = htmlspecialchars($event['nama_event'] ?? 'Nama Event Tidak Tersedia');
                $deskripsi = htmlspecialchars($event['deskripsi'] ?? 'Deskripsi tidak tersedia.');
                $universitas = htmlspecialchars($event['universitas'] ?? 'Universitas Tidak Diketahui');
                $tanggal = htmlspecialchars($event['tanggal'] ?? '');
                $alamat = htmlspecialchars($event['alamat'] ?? '');
                $jumlahOrang = htmlspecialchars($event['jumlah_orang'] ?? '');
                $hargaTiket = htmlspecialchars($event['harga_tiket'] ?? '');

                // Buat string deskripsi singkat dengan link "Lihat lebih lanjut"
                $deskripsiSingkat = substr($deskripsi, 0, 150); // Potong teks menjadi 150 karakter
                if (strlen($deskripsi) > 150) {
                    $deskripsiSingkat .= '...'; // Tambahkan elipsis jika teks dipotong
                }
                $deskripsiLengkap = $deskripsi;
            ?>
                <div class="bg-[#F57C00] text-white p-5 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h2 class="text-xl font-bold mb-2"><?php echo $namaEvent; ?></h2>
                    <div class="text-sm mb-3">
                        <!-- Ikon universitas (contoh: bangunan) -->
                        <span class="inline-block mr-1">🏫</span>
                        <span><?php echo $universitas; ?></span>
                    </div>
                    <p class="text-sm mb-4">
                        <?php echo $deskripsiSingkat; ?>
                        <br>
                        <span class="text-xs mt-1 block">
                            <?php echo $universitas; ?> – <a href="infografis.php" class="underline">Lihat lebih lanjut</a>
                        </span>
                    </p>
                    <!-- Informasi tambahan (opsional, bisa ditambahkan jika ingin) -->
                    <div class="text-xs mt-3 opacity-80">
                        <!-- Tanggal, Alamat, Jumlah Orang, Harga Tiket -->
                        <!-- Contoh: Tanggal: <?php echo $tanggal; ?> | Lokasi: <?php echo $alamat; ?> -->
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Jika tidak ada data -->
            <?php if (empty($data)): ?>
                <div class="col-span-full text-center text-gray-500 py-10">
                    Belum ada event yang didaftarkan.
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php include 'includes/footer.php';?>
</html>