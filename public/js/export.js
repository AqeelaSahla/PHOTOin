(function () {
    const CANVAS_W = 600;
    const CANVAS_H = 1600;

    const SLOTS = [
        { x: 50, y: 125, w: 498, h: 364 },
        { x: 50, y: 574, w: 498, h: 364 },
        { x: 50, y: 1023, w: 498, h: 364 },
    ];

    function calcCustomSlots(fw, fh) {
        const padX = Math.round(fw * 0.083);
        const slotW = fw - padX * 2;
        const slotH = Math.round(fh * 0.2275);
        const startY = Math.round(fh * 0.0781);
        const gapY = Math.round(fh * 0.0281);
        return [0, 1, 2].map((i) => ({
            x: padX,
            y: startY + i * (slotH + gapY),
            w: slotW,
            h: slotH,
        }));
    }

    const frameType = sessionStorage.getItem("selectedFrameType");
    const frameId = sessionStorage.getItem("selectedFrameId");
    const customFrame = sessionStorage.getItem("customFrameData");
    const photos = [0, 1, 2].map((i) => sessionStorage.getItem(`photo_${i}`));

    let frameSrc = null;
    if (frameType === "preset" && frameId) {
        frameSrc = `FrameAssets/Frame${frameId}.png`;
    } else if (frameType === "custom" && customFrame) {
        frameSrc = customFrame;
    }

    function loadImage(src) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.crossOrigin = "anonymous";
            img.onload = () => resolve(img);
            img.onerror = () => reject(new Error(`Gagal memuat: ${src}`));
            img.src = src;
        });
    }

    function drawCover(ctx, img, slot) {
        ctx.save();
        ctx.beginPath();
        ctx.rect(slot.x, slot.y, slot.w, slot.h);
        ctx.clip();
        const scale = Math.max(
            slot.w / img.naturalWidth,
            slot.h / img.naturalHeight,
        );
        const dw = img.naturalWidth * scale;
        const dh = img.naturalHeight * scale;
        const dx = slot.x + (slot.w - dw) / 2;
        const dy = slot.y + (slot.h - dh) / 2;
        ctx.drawImage(img, dx, dy, dw, dh);
        ctx.restore();
    }

    async function renderComposite() {
        const canvas = document.getElementById("resultCanvas");
        const ctx = canvas.getContext("2d");
        const loading = document.querySelector(".result-loading");

        try {
            const [frameImg, ...photoImgs] = await Promise.all([
                frameSrc ? loadImage(frameSrc) : Promise.resolve(null),
                ...photos.map((p) =>
                    p ? loadImage(p) : Promise.resolve(null),
                ),
            ]);

            let cW, cH, slots;

            if (frameType === "custom" && frameImg) {
                cW = frameImg.naturalWidth;
                cH = frameImg.naturalHeight;
                slots = calcCustomSlots(cW, cH);
            } else {
                cW = CANVAS_W;
                cH = CANVAS_H;
                slots = SLOTS;
            }

            canvas.width = cW;
            canvas.height = cH;

            ctx.fillStyle = "#ffffff";
            ctx.fillRect(0, 0, cW, cH);

            photoImgs.forEach((img, i) => {
                if (img && slots[i]) drawCover(ctx, img, slots[i]);
            });

            if (frameImg) {
                ctx.drawImage(frameImg, 0, 0, cW, cH);
            }

            loading.style.display = "none";
            canvas.style.display = "block";
        } catch (err) {
            loading.innerHTML = `<span style="color:#9E2A2B;text-align:center">
        ⚠ Gagal memuat gambar.<br><small>${err.message}</small></span>`;
            console.error(err);
        }
    }

    renderComposite();

    window.downloadResults = function () {
        const canvas = document.getElementById("resultCanvas");
        if (!canvas || canvas.width === 0) return;
        const link = document.createElement("a");
        link.download = `PHOTOin_${Date.now()}.png`;
        link.href = canvas.toDataURL("image/png");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };

    window.goHome = function () {
        [
            "selectedFrameType",
            "selectedFrameId",
            "customFrameData",
            "photo_0",
            "photo_1",
            "photo_2",
        ].forEach((k) => sessionStorage.removeItem(k));
        window.location.href = "/";
    };
})();
