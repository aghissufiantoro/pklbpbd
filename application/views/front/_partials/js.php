<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets_frontend/') ?>lib/wow/wow.min.js"></script>
<script src="<?= base_url('assets_frontend/') ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('assets_frontend/') ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('assets_frontend/') ?>lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets_frontend/') ?>lib/lightbox/js/lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url('assets_frontend/') ?>js/main.js"></script>

<script>
    setTimeout(function () {
        document.getElementById('reviewPopup').style.display = 'block';
    }, 20000); // 5 seconds = 5000 milliseconds

    function closePopup() {
        document.getElementById('reviewPopup').style.display = 'none';
    }

    function submitFeedback() {
        const feedbackText = document.getElementById('feedbackText').value.trim();
        const userName = document.getElementById('userName').value.trim();
        let valid = true;

        // Reset error messages
        document.getElementById('nameError').innerText = '';
        document.getElementById('feedbackError').innerText = '';

        // Validate name
        if (!userName) {
            document.getElementById('nameError').innerText = 'Kolom tidak boleh kosong!';
            valid = false;
        } else if (userName.length > 20) {
            document.getElementById('nameError').innerText = 'Nama maksimal 20 huruf!';
            valid = false;
        }

        // Validate feedback
        if (!feedbackText) {
            document.getElementById('feedbackError').innerText = 'Kolom tidak boleh kosong!';
            valid = false;
        }

        if (!valid) {
            return; // Stop submission if validation fails
        }

        // Send feedback to the server (using AJAX or a form submission)
        // You'll need to implement this part in your CodeIgniter controller

        // For example, using AJAX (using jQuery)
        $.ajax({
            url: '<?= site_url('view/submit_feedback') ?>', // Your controller method for handling feedback
            method: 'POST',
            data: { name: userName, feedback: feedbackText },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    alert('Masukan telah diterima!'); // Or display a thank you message in the popup
                    closePopup(); // Close the popup
                } else {
                    alert('Terdapat error saat mengirim review.');
                }
            },
            error: function(xhr, status, error) {
                alert('Terdapat error saat mengirim review.');
            }
        });
    }
</script>