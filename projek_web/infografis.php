<?php
// Ambil data dari file JSON
$dataFile = 'data.json';
$events = [];

if (file_exists($dataFile)) {
    $events = json_decode(file_get_contents($dataFile), true);
}

// Hitung jumlah event berdasarkan kategori
$chartData = [];
foreach ($events as $event) {
    $kategori = $event['kategori'] ?? 'Tidak Diketahui'; // fallback jika belum ada field 'kategori'
    if (!isset($chartData[$kategori])) {
        $chartData[$kategori] = 0;
    }
    $chartData[$kategori]++;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Infografis - EventInCampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
</head>
<?php include 'includes/navbar.php';?>
<body class="bg-[#FAFAFA] text-[#3A5635] font-sans">

<!-- Konten -->
<div class="p-10 space-y-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Map -->
        <div>
            <h2 class="text-2xl font-bold mb-3">Lokasi Event</h2>
            <div id="map" class="w-full h-96 bg-gray-300 rounded-lg"></div>
        </div>

        <!-- Chart -->
        <div>
            <h2 class="text-2xl font-bold mb-3">Data Event</h2>
            <div id="chart" class="w-full h-96 bg-gray-300 rounded-lg"></div>
        </div>
    </div>


<script>
// Data dari PHP ke JS
const chartData = <?php echo json_encode($chartData); ?>;

// Highcharts
Highcharts.chart('chart', {
    chart: { type: 'column', backgroundColor: '#e5e7eb', borderRadius: 10 },
    title: { text: 'Jumlah Event per Kategori', style: { color: '#3A5635' }},
    xAxis: { categories: Object.keys(chartData), title: { text: 'Kategori' }},
    yAxis: { title: { text: 'Jumlah Event' }},
    series: [{ name: 'Event', data: Object.values(chartData), color: '#D88A23' }]
});

// Leaflet Map
const map = L.map('map').setView([-6.200000, 106.816666], 5);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

// Tandai event berdasarkan kota (contoh: ambil nama universitas saja)
const events = <?php echo json_encode($events); ?>;
events.forEach(ev => {
    // Default posisi kalau belum ada lokasi spesifik
    let latlng = [-6.200000, 106.816666]; // Jakarta
    L.marker(latlng)
        .addTo(map)
        .bindPopup(`<b>${ev.nama_event}</b><br>${ev.universitas}<br>${ev.alamat}`);
});
</script>

</body>
<?php include 'includes/footer.php';?>
</html>
