document.addEventListener("DOMContentLoaded", function () {
    const userInput = document.querySelector('.user-msg');
    const sizeSelect = document.querySelector('#size');
    const colorInput = document.querySelector('#color');
    const bgColorInput = document.querySelector('#bgcolor');
    const generateButton = document.querySelector('.generate-qr-code');
    const qrImage = document.querySelector('.qr-image');
    const loading = document.querySelector('.loading');
    const downloadButton = document.createElement("button");

    // Create the download button dynamically
    downloadButton.textContent = "Download QR Code";
    downloadButton.classList.add("download-qr-code");
    downloadButton.style.display = "none";
    document.querySelector(".qr-canvas").appendChild(downloadButton);

    generateButton.addEventListener("click", async function (event) {
        event.preventDefault();

        let message = userInput.value.trim();
        if (message === '') {
            alert('⚠ Please enter a  1 valid message!');
            return;
        }

        let size = sizeSelect.value + "x" + sizeSelect.value;
        let qrColor = colorInput.value.substring(1);
        let bgColor = bgColorInput.value.substring(1);

        let qrData = message; 
        let qrURL = `https://api.qrserver.com/v1/create-qr-code/?size=${size}&data=${encodeURIComponent(qrData)}&color=${qrColor}&bgcolor=${bgColor}`;

        loading.style.display = 'block';
        qrImage.style.display = "none";
        qrImage.src = "";

        setTimeout(() => {
            qrImage.src = qrURL;
        }, 100);

        qrImage.onload = function () {
            console.log("✅ QR Code Loaded!");
            loading.style.display = 'none';
            qrImage.style.display = "block";
            downloadButton.style.display = "block";
        };

        qrImage.onerror = function () {
            console.error("❌ QR Code Failed to Load!");
            loading.style.display = 'none';
            downloadButton.style.display = "none";
        };

        // Optional: Store only the message
        let formData = new FormData();
        formData.append("info", qrData);

        try {
            let saveResponse = await fetch("store.php", {
                method: "POST",
                body: formData
            });

            let saveResult = await saveResponse.text();
            console.log("✅ Server Response:", saveResult);

            if (saveResult.trim() !== "Success") {
                alert("⚠ Error saving QR Code.");
            }

        } catch (error) {
            console.error("❌ Error:", error);
            alert("⚠ Something went wrong. Try again.");
        }
    });

    // **Download QR Code as an Image**
    downloadButton.addEventListener("click", function () {
        if (qrImage.src && qrImage.style.display !== "none") {
            let canvas = document.createElement("canvas");
            let ctx = canvas.getContext("2d");

            let img = new Image();
            img.crossOrigin = "anonymous";
            img.src = qrImage.src;

            img.onload = function () {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0, img.width, img.height);

                let a = document.createElement("a");
                a.href = canvas.toDataURL("image/png");
                a.download = "qr_code.png";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            };
        } else {
            alert("⚠ Generate a QR code first!");
        }
    });
});
