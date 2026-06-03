(function () {
    const TOTAL_SHOTS = 3;
    const CAPTURE_TIMER_SECONDS = 3;
    let currentSlot = 0;
    const photos = new Array(TOTAL_SHOTS).fill(null);
    let stream = null;
    let countdownActive = false;
    let countdownTimerId = null;
    let retakeTarget = null;

    const video = document.getElementById("cameraFeed");
    const placeholder = document.getElementById("viewPlaceholder");
    const countdownEl = document.getElementById("captureCountdown");
    const retakePicker = document.getElementById("retakePicker");

    async function startCamera() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: "user",
                    width: { ideal: 1280 },
                    height: { ideal: 720 },
                },
                audio: false,
            });
            video.srcObject = stream;
            video.style.display = "block";
            placeholder.style.display = "none";
        } catch (err) {
            console.warn("Kamera tidak tersedia:", err);
            video.style.display = "none";
            placeholder.style.display = "flex";
        }
    }

    startCamera();

    function cancelCountdown() {
        if (!countdownActive) return;
        clearTimeout(countdownTimerId);
        countdownTimerId = null;
        countdownActive = false;
        countdownEl.hidden = true;
        countdownEl.textContent = "";
        countdownEl.classList.remove("countdown-visible", "countdown-tick");
        updateUI();
    }

    function startCaptureCountdown() {
        const target = captureTargetSlot();
        if (
            (retakeTarget === null && currentSlot >= TOTAL_SHOTS) ||
            countdownActive
        )
            return;
        if (retakeTarget === null && photos[target] !== null) return;
        if (!stream) {
            alert("Kamera tidak aktif. Gunakan tombol Upload.");
            return;
        }

        countdownActive = true;
        updateUI();

        let remaining = CAPTURE_TIMER_SECONDS;

        function tick() {
            if (remaining <= 0) {
                countdownTimerId = null;
                countdownActive = false;
                countdownEl.hidden = true;
                countdownEl.textContent = "";
                countdownEl.classList.remove(
                    "countdown-visible",
                    "countdown-tick",
                );
                doCapture();
                return;
            }

            countdownEl.hidden = false;
            countdownEl.textContent = String(remaining);
            countdownEl.classList.add("countdown-visible");
            countdownEl.classList.remove("countdown-tick");
            void countdownEl.offsetWidth;
            countdownEl.classList.add("countdown-tick");

            remaining -= 1;
            countdownTimerId = setTimeout(tick, 1000);
        }

        tick();
    }

    function doCapture() {
        const canvas = document.getElementById("captureCanvas");
        const ctx = canvas.getContext("2d");
        canvas.width = video.videoWidth || 1280;
        canvas.height = video.videoHeight || 720;

        ctx.save();
        ctx.scale(-1, 1);
        ctx.drawImage(video, -canvas.width, 0, canvas.width, canvas.height);
        ctx.restore();

        const dataURL = canvas.toDataURL("image/jpeg", 0.92);
        saveToSlot(captureTargetSlot(), dataURL);
        triggerFlash();
    }

    function captureTargetSlot() {
        if (retakeTarget !== null) return retakeTarget;
        return currentSlot;
    }

    function advanceCurrentSlot() {
        const firstEmpty = photos.findIndex((p) => p === null);
        currentSlot = firstEmpty === -1 ? TOTAL_SHOTS : firstEmpty;
        if (firstEmpty === -1) retakeTarget = null;
    }

    function capturePhoto() {
        startCaptureCountdown();
    }

    function saveToSlot(idx, dataURL) {
        photos[idx] = dataURL;

        const img = document.getElementById(`preview-img-${idx}`);
        const num = document.getElementById(`preview-num-${idx}`);
        img.src = dataURL;
        img.hidden = false;
        num.style.display = "none";
        document.getElementById(`slot-${idx}`).classList.add("filled");
        document.getElementById(`slot-${idx}`).classList.remove("active");

        retakeTarget = null;
        advanceCurrentSlot();
        hideRetakePicker();
        updateUI();
    }

    function hideRetakePicker() {
        retakePicker.hidden = true;
    }

    function hasAnyPhoto() {
        return photos.some((p) => p !== null);
    }

    function clearSlot(idx) {
        photos[idx] = null;

        const img = document.getElementById(`preview-img-${idx}`);
        const num = document.getElementById(`preview-num-${idx}`);
        img.hidden = true;
        img.src = "";
        num.style.display = "";
        document
            .getElementById(`slot-${idx}`)
            .classList.remove("filled", "active");
    }

    function prepareRetakeSlot(idx) {
        if (idx < 0 || idx >= TOTAL_SHOTS || photos[idx] === null) return;

        clearSlot(idx);
        retakeTarget = idx;
        currentSlot = idx;
        hideRetakePicker();
        updateUI();
    }

    window.retakePhoto = function () {
        if (countdownActive) {
            cancelCountdown();
            return;
        }
        if (!hasAnyPhoto()) return;

        retakePicker.hidden = !retakePicker.hidden;
        updateRetakePickerButtons();
        updateUI();
    };

    function updateRetakePickerButtons() {
        for (let i = 0; i < TOTAL_SHOTS; i++) {
            const btn = document.getElementById(`retakePick${i}`);
            btn.disabled = photos[i] === null;
        }
    }

    document.getElementById("previewList").addEventListener("click", (e) => {
        const slot = e.target.closest(".preview-slot");
        if (!slot || countdownActive) return;
        const idx = Number(slot.dataset.slot);
        if (photos[idx] === null) return;
        prepareRetakeSlot(idx);
    });

    retakePicker.querySelectorAll(".retake-pick-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
            prepareRetakeSlot(Number(btn.dataset.slot));
        });
    });

    window.triggerUpload = function () {
        if (countdownActive) return;
        if (retakeTarget === null && currentSlot >= TOTAL_SHOTS) return;
        document.getElementById("uploadInput").click();
    };

    document
        .getElementById("uploadInput")
        .addEventListener("change", function () {
            const file = this.files[0];
            if (!file || countdownActive) return;
            const target = captureTargetSlot();
            if (retakeTarget === null && currentSlot >= TOTAL_SHOTS) return;
            const reader = new FileReader();
            reader.onload = (e) => {
                saveToSlot(target, e.target.result);
                this.value = "";
            };
            reader.readAsDataURL(file);
        });

    function updateUI() {
        const counter = document.getElementById("shotCounter");
        const activeIdx =
            retakeTarget !== null
                ? retakeTarget
                : Math.min(currentSlot, TOTAL_SHOTS - 1);
        const shown = Math.min(activeIdx + 1, TOTAL_SHOTS);
        counter.textContent = `${shown}/${TOTAL_SHOTS}`;

        const canRetakeSelect = !countdownActive;
        document.querySelectorAll(".preview-slot").forEach((s, i) => {
            const isTarget =
                retakeTarget !== null
                    ? i === retakeTarget
                    : i === currentSlot && photos[i] === null;
            s.classList.toggle("active", isTarget && photos[i] === null);
            s.classList.toggle(
                "retake-selectable",
                photos[i] !== null && canRetakeSelect,
            );
        });

        updateRetakePickerButtons();

        const allDone = photos.every((p) => p !== null);
        const capturing = retakeTarget !== null || currentSlot < TOTAL_SHOTS;
        document.getElementById("btnNext").hidden = !allDone;
        document.getElementById("btnNext").disabled = !allDone;
        document.getElementById("btnNext").style.opacity = allDone
            ? "1"
            : "0.4";
        const captureDisabled =
            (!capturing && retakeTarget === null) || countdownActive;
        document.getElementById("btnCapture").disabled = captureDisabled;
        document.getElementById("btnCapture").style.opacity = captureDisabled
            ? "0.4"
            : "1";

        const retakeDisabled = !hasAnyPhoto() || countdownActive;
        document.getElementById("btnRetake").disabled = retakeDisabled;
        document.getElementById("btnRetake").style.opacity = retakeDisabled
            ? "0.4"
            : "1";

        const uploadBtn = document.getElementById("btnUpload");
        const showUpload =
            retakeTarget !== null || (currentSlot < TOTAL_SHOTS && !allDone);
        uploadBtn.hidden = !showUpload;
        if (showUpload) {
            uploadBtn.disabled = countdownActive;
            uploadBtn.style.opacity = countdownActive ? "0.4" : "1";
        }
    }

    updateUI();

    function triggerFlash() {
        const flash = document.getElementById("captureFlash");
        flash.classList.add("flash-active");
        setTimeout(() => flash.classList.remove("flash-active"), 300);
    }

    window.goNext = function () {
        const allDone = photos.every((p) => p !== null);
        if (!allDone) {
            alert("Isi semua foto terlebih dahulu sebelum lanjut.");
            return;
        }
        photos.forEach((p, i) => sessionStorage.setItem(`photo_${i}`, p));
        window.location.href = "/export";
    };

    window.capturePhoto = capturePhoto;
})();
