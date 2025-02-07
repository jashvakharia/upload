function sendEmail() {
            const toEmail = document.getElementById("toEmail").value;
            const subject = document.getElementById("subject").value;
            const message = document.getElementById("message").value;
            const fileInput = document.getElementById("attachment").files[0];
            if (!toEmail || !subject || !message) {
                alert("Fill all fields.");
                return;
            }
            let formData = new FormData();
            formData.append("toEmail", toEmail);
            formData.append("subject", subject);
            formData.append("message", message);
            if (fileInput) formData.append("attachment", fileInput);
            fetch("send_email.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(result => alert(result))
            .catch(error => alert("Error: " + error));
        }