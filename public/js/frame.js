let selectedFrame = null;
let uploadedFile = null;

function selectFrame(card) {
    uploadedFile = null;
    document.getElementById("uploadCard").classList.remove("selected");
    document.getElementById("frameUploadInput").value = "";

    const wasSelected = card.classList.contains("selected");
    document
        .querySelectorAll(".frame-card:not(.upload-card)")
        .forEach((c) => c.classList.remove("selected"));

    if (!wasSelected) {
        card.classList.add("selected");
        selectedFrame = card.dataset.frame;
    } else {
        selectedFrame = null;
    }
}

function triggerUpload() {
    document.getElementById("frameUploadInput").click();
}

document
    .getElementById("frameUploadInput")
    .addEventListener("change", function () {
        const file = this.files[0];
        if (!file) return;

        selectedFrame = null;
        document
            .querySelectorAll(".frame-card:not(.upload-card)")
            .forEach((c) => c.classList.remove("selected"));

        uploadedFile = file;
        document.getElementById("uploadCard").classList.add("selected");

        const reader = new FileReader();
        reader.onload = (e) => {
            const preview = document.getElementById("uploadPreview");
            preview.innerHTML = `<img src="${e.target.result}" alt="Custom Frame"
                                style="width:100%;height:100%;object-fit:contain;border-radius:10px;" />`;
        };
        reader.readAsDataURL(file);
    });

function downloadTemplates() {
    const path = "FrameAssets/Frame Template.png";
    const a = document.createElement("a");
    a.href = path;
    a.download = path.split("/").pop();
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

function goNext() {
    if (!selectedFrame && !uploadedFile) {
        alert("Pilih frame terlebih dahulu!");
        return;
    }

    if (uploadedFile) {
        const reader = new FileReader();
        reader.onload = (e) => {
            sessionStorage.setItem("selectedFrameType", "custom");
            sessionStorage.setItem("customFrameData", e.target.result);
            window.location.href = "/studio";
        };
        reader.readAsDataURL(uploadedFile);
    } else {
        sessionStorage.setItem("selectedFrameType", "preset");
        sessionStorage.setItem("selectedFrameId", selectedFrame);
        window.location.href = "/studio";
    }
}
