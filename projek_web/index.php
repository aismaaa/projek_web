<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EventinCampus (EIC)</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Animasi fade-in */
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease;
    }
    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<?php include 'includes/navbar.php';?>
<body class="bg-[#F5F6F4] text-[#3A5635] font-sans">

  <!-- Hero Section -->
  <section class="flex flex-col items-center text-center py-12 px-6 fade-in">
    <img src="Logo EIC.png" alt="EIC Logo" class="w-100 mb-4">
    <h1 class="text-4xl font-bold mb-4 text-[#3A5635]">EIC (Event in Campus)</h1>
    <p class="max-w-2xl text-gray-700">
      EventinCampus adalah platform inovatif yang dibuat khusus untuk memudahkan mahasiswa dan pihak kampus dalam mendaftarkan berbagai jenis kegiatan, mulai dari seminar, workshop, konser, hingga kompetisi. Dengan EventinCampus, event yang Anda buat tidak hanya dikenal di kampus sendiri, tetapi juga dapat menjangkau seluruh kampus di wilayah sekitarnya, bahkan lebih luas lagi.
    </p>
  </section>

  <!-- Tentang Kami -->
  <section class="bg-white mx-auto max-w-4xl p-8 rounded-2xl shadow-md fade-in">
    <h2 class="text-3xl font-semibold text-center mb-8 text-[#3A5635]">Tentang Kami</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 place-items-center">
      <!-- Anggota -->
      <div class="text-center">
        <img src="img\JILAN.jpg" class="w-32 h-32 object-cover rounded-full border-4 border-[#3A5635] mx-auto hover:scale-105 transition-transform duration-300">
        <h3 class="mt-3 font-semibold">Jilan Jalilah</h3>
        <p class="text-sm text-gray-600">20241320039</p>
      </div>

      <div class="text-center">
        <img src="img\DIFA.jpg" class="w-32 h-32 object-cover rounded-full border-4 border-[#3A5635] mx-auto hover:scale-105 transition-transform duration-300">
        <h3 class="mt-3 font-semibold">Difa Nisa Lutfiah</h3>
        <p class="text-sm text-gray-600">20241320013</p>
      </div>

      <div class="text-center">
        <img src="img\NAYLA.jpg" class="w-32 h-32 object-cover rounded-full border-4 border-[#3A5635] mx-auto hover:scale-105 transition-transform duration-300">
        <h3 class="mt-3 font-semibold">Nayla Rabia Gustari</h3>
        <p class="text-sm text-gray-600">20241320034</p>
      </div>

      <div class="text-center">
        <img src="img\LULU.jpg" class="w-32 h-32 object-cover rounded-full border-4 border-[#3A5635] mx-auto hover:scale-105 transition-transform duration-300">
        <h3 class="mt-3 font-semibold">Lulu Aeni Salsabila</h3>
        <p class="text-sm text-gray-600">20241320008</p>
      </div>

      <div class="text-center">
        <img src="img\AISMA.jpg" class="w-32 h-32 object-cover rounded-full border-4 border-[#3A5635] mx-auto hover:scale-105 transition-transform duration-300">
        <h3 class="mt-3 font-semibold">Aisma Haidy Putri B.A.N.R</h3>
        <p class="text-sm text-gray-600">20241320001</p>
      </div>

      <div class="text-center">
        <img src="img\GHEA.jpg" class="w-32 h-32 object-cover rounded-full border-4 border-[#3A5635] mx-auto hover:scale-105 transition-transform duration-300">
        <h3 class="mt-3 font-semibold">Anggraeni Ghea S.</h3>
        <p class="text-sm text-gray-600">20241320002</p>
      </div>

      <div class="text-center">
        <img src="img\KEYSHA.jpg" class="w-32 h-32 object-cover rounded-full border-4 border-[#3A5635] mx-auto hover:scale-105 transition-transform duration-300">
        <h3 class="mt-3 font-semibold">Keysha Aprilya Salsabila</h3>
        <p class="text-sm text-gray-600">20241320032</p>
      </div>
    </div>
  </section>

  <!-- JavaScript Animasi -->
  <script>
    const fadeElements = document.querySelectorAll('.fade-in');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
        }
      });
    });

    fadeElements.forEach(el => observer.observe(el));
  </script>

</body>
<?php include 'includes/footer.php';?>
</html>
