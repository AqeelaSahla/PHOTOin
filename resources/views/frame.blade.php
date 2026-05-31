<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Frame | PHOTOin!</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/frame.css') }}">
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
    <div class="frame-wrapper">
      <div class="header">
        <span class="title">Pilih Frame!</span>
      </div>

      <div class="frame-grid">

        <!-- Frame 1 -->
        <div class="frame-card" data-frame="1" onclick="selectFrame(this)">
          <div class="frame-preview">
            <img src="{{ asset('FrameAssets/Frame1.png') }}" alt="Frame 1" draggable="false">
          </div>
          <p class="frame-name"> Frame 1</p>
          <p class="frame-description">3 Pose</p>

        </div>

        <!-- Frame 2 -->
         <div class="frame-card" data-frame="2" onclick="selectFrame(this)">
          <div class="frame-preview">
            <img src="{{ asset('FrameAssets/Frame2.png') }}" alt="Frame 2" draggable="false">
          </div>
          <p class="frame-name"> Frame 2</p>
          <p class="frame-description">3 Pose</p>

        </div>
        
        <!-- Frame 3 -->
         <div class="frame-card" data-frame="3" onclick="selectFrame(this)">
          <div class="frame-preview">
            <img src="{{ asset('FrameAssets/Frame3.png') }}" alt="Frame 3" draggable="false">
          </div>
          <p class="frame-name"> Frame 3</p>
          <p class="frame-description">3 Pose</p>

        </div>

        <!-- Upload Frame -->
        <div class="frame-card upload-card" id="uploadCard" onclick="triggerUpload()">
          <div id="uploadPreview" class="frame-preview upload-preview">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="#AAAAAA" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"
                class="upload-icon">
              <path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/>
              <polyline points="8 8 12 4 16 8"/>
              <line x1="12" y1="4" x2="12" y2="16"/>
            </svg>
          </div>
          <p class="frame-name">Upload Frame Anda</p>
          <input type="file" id="frameUploadInput" accept="image/*" hidden />
        </div>

      </div>

      <div class="frame-actions">
        <button class="btn btn-back" onclick="history.back()">
          ← &nbsp;Back
        </button>

        <button class="btn btn-download" onclick="downloadTemplates()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
              width="18" height="18">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
            <polyline points="7 10 12 15 17 10"/>
            <line x1="12" y1="15" x2="12" y2="3"/>
          </svg>
          Download Template Frame
        </button>

        <button class="btn btn-next" id="btnNext" onclick="goNext()">
          Next &nbsp;→
        </button>
      </div>

    </div>
    
    <script src="{{ asset('js/frame.js') }}"></script>
  </main>

  <footer>
    <span>© 2026 PHOTOin! – nanti aja</span>
    <span>Universitas Brawijaya</span>
  </footer>

</body>
</html>