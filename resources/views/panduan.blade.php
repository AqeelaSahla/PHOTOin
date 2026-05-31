<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panduan | PHOTOin!</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/panduan.css') }}" />
</head>
<body>
  <nav class="navbar">
    <a href="/" class="navbar_logo">
      <img src="{{ asset('ImageAssets/Logo.png') }}" alt="PHOTOin!" />
    </a>

    <ul class="navbar_links">
      <li><a href="/frame" data-text="Studio">Studio</a></li>
      <li><a href="/panduan" data-text="Panduan">Panduan</a></li>
      <li><a href="/about" data-text="Tentang">Tentang</a></li>
    </ul>
  </nav>

  <main>
    <div class="panduan-grid">
      <section class="panduan-column">
        <h1 class="section-label section-label--red">Panduan Penggunaan</h1>
        <ol class="item-list">
          <li class="item-card">
            <span class="item-card__number">1</span>
            <span>Telusuri galeri dan pilih desain frame yang paling kamu suka atau unggah frame custom milikmu sendiri.</span>
          </li>
          <li class="item-card">
            <span class="item-card__number">2</span>
            <span>Pastikan kamu memberikan izin pada browser untuk mengakses kamera web (webcam) agar aplikasi dapat berfungsi.</span>
          </li>
          <li class="item-card">
            <span class="item-card__number">3</span>
            <span>Tekan tombol kamera dan bersiaplah! Timer akan menghitung mundur sebelum setiap foto diambil secara otomatis.</span>
          </li>
          <li class="item-card">
            <span class="item-card__number">4</span>
            <span>Setelah selesai, fotomu akan digabungkan dengan frame. Kamu bisa langsung mengunduh hasilnya!</span>
          </li>
        </ol>
      </section>

      <section class="panduan-column">
        <h1 class="section-label section-label--teal">FAQ</h1>

        <div class="faq-container">
          <article class="faq-card">
            <div class="faq-question">
              <div class="q-icon">Q</div>
              <h3>Apakah foto saya disimpan di server atau database?</h3>
            </div>
            <div class="faq-answer">
              <p><strong>Tidak.</strong> Kami sangat menghargai privasi kamu. Seluruh proses pengambilan, penggabungan frame, hingga pengunduhan foto dilakukan langsung di dalam <i>browser</i> perangkatmu. Kami tidak menyimpan atau memiliki akses ke foto kamu sama sekali.</p>
            </div>
          </article>

          <article class="faq-card">
            <div class="faq-question">
              <div class="q-icon">Q</div>
              <h3>Mengapa layar kamera saya hitam atau tidak muncul?</h3>
            </div>
            <div class="faq-answer">
              <p>Pastikan kamu telah memberikan izin (<i>Allow/Grant Access</i>) pada browser untuk mengakses kamera/webcam. Jika kamu menggunakan PC, pastikan webcam sudah terpasang dengan benar.</p>
            </div>
          </article>

          <article class="faq-card">
            <div class="faq-question">
              <div class="q-icon">Q</div>
              <h3>Bisakah saya menggunakan desain frame buatan sendiri?</h3>
            </div>
            <div class="faq-answer">
              <p>Tentu saja! Pada halaman pemilihan frame, terdapat opsi untuk mengunggah frame kustom. Pastikan frame kamu memiliki format <strong>.PNG transparan</strong> agar hasil fotomu dapat terlihat di area yang kosong.</p>
            </div>
          </article>

          <article class="faq-card">
            <div class="faq-question">
              <div class="q-icon">Q</div>
              <h3>Apakah aplikasi PHOTOin berbayar?</h3>
            </div>
            <div class="faq-answer">
              <p>Aplikasi ini 100% gratis digunakan. Kamu tidak perlu membayar biaya langganan ataupun mendaftar akun untuk mulai mengambil foto.</p>
            </div>
          </article>
        </div>
      </section>
    </div>
  </main>

  <footer>
    <span>© 2026 PHOTOin! – nanti aja</span>
    <span>Universitas Brawijaya</span>
  </footer>
</body>
</html>