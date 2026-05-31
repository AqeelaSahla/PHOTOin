<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Studio | PHOTOin!</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/studio.css') }}">
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
    <div class="studio-wrapper">
        <div class="studio-left">
            <div class="viewfinder" id="viewfinder">
                <video id="cameraFeed" autoplay playsinline muted></video>
                <canvas id="captureCanvas" hidden></canvas>

                <div class="view-placeholder" id="viewPlaceholder">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"
                        class="vf-cam-icon">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8
                                a2 2 0 0 1 2-2h4l2-3h6l2 3h4
                                a2 2 0 0 1 2 2z"/>
                        <circle cx="12" cy="13" r="4"/>
                    </svg>
                </div>

                <div class="counter" id="shotCounter">1/3</div>

                <div class="capture-flash" id="captureFlash"></div>
            </div>

            <div class="studio-controls">
                <button class="btn btn-back" onclick="history.back()">← &nbsp;Back</button>
                
                <button class="btn-capture" id="btnCapture" onclick="capturePhoto()" title="Ambil Foto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                        width="28" height="28">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8
                                a2 2 0 0 1 2-2h4l2-3h6l2 3h4
                                a2 2 0 0 1 2 2z"/>
                        <circle cx="12" cy="13" r="4"/>
                    </svg>
                </button>

                <button class="btn btn-retake" id="btnRetake" onclick="retakePhoto()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                        width="18" height="18">
                        <polyline points="1 4 1 10 7 10"/>
                        <path d="M3.51 15a9 9 0 1 0 .49-3.5"/>
                    </svg>
                    &nbsp;Retake
                </button>
            </div>
        </div>

        <div class="studio-right">
            <div class="preview-list">
                <div class="preview-slot active" id="slot-0">
                    <span class="preview-num" id="preview-num-0">1</span>
                    <img class="preview-img" id="preview-img-0" src="" alt="" hidden>
                </div>

                    <div class="preview-slot active" id="slot-1">
                    <span class="preview-num" id="preview-num-1">2</span>
                    <img class="preview-img" id="preview-img-1" src="" alt="" hidden>
                </div>

                    <div class="preview-slot active" id="slot-2">
                    <span class="preview-num" id="preview-num-2">3</span>
                    <img class="preview-img" id="preview-img-2" src="" alt="" hidden>
                </div>
            </div>

            <button class="btn btn-upload" id="btnUpload" onclick="triggerUpload()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                    width="18" height="18">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="17 8 12 3 7 8"/>
                <line x1="12" y1="3" x2="12" y2="15"/>
                </svg>
                &nbsp;Upload
            </button>
            <input type="file" id="uploadInput" accept="image/*" hidden />

            <button class=" btn btn-next-studio" id="btnNext" onclick="goNext()" hidden>
                Next &nbsp;→
            </button>
        </div>
    </div>
    
    <script src="{{ asset('js/studio.js') }}"></script>
  </main>

  <footer>
    <span>© 2026 PHOTOin! – nanti aja</span>
    <span>Universitas Brawijaya</span>
  </footer>

</body>
</html>