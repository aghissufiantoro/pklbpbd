<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Completion Overlay</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hidden {
      display: none;
    }
    .quiz-container {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 8px;
      min-height: 635px;
    }
    .quiz-container iframe {
      flex: 1;
      border: none;
    }
    .overlay-content ul {
      text-align: left;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="quiz-container">
      <iframe id="frame-quiziz" src="https://quizizz.com/embed/quiz/661f23a1222011e2133dd9f2" title="Kebencanaan - Quizizz" allowfullscreen></iframe>
      <a href="https://quizizz.com/admin?source=embedFrame" target="_blank">Explore more at Quizizz.</a>
      <button id="btn-selesai" class="btn btn-primary mt-3 hidden">Selesai ? Ambil Hadiah Nya</button>
    </div>

    <div id="overlay" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Quiz Completed!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Terima kasih telah menyelesaikan quiz. Untuk mengklaim hadiah Anda, silakan kirim email yang berisi:</p>
            <ul>
              <li>Screenshot bukti bahwa Anda telah menyelesaikan quiz.</li>
              <li>Bukti bahwa Anda telah mengikuti akun Instagram dan TikTok BPBD.</li>
              <li>Bukti bahwa Anda telah mengunjungi website BPBD.</li>
            </ul>
            <p>Kirimkan email Anda ke: <strong>bpbd@example.com</strong></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const btnSelesai = document.getElementById('btn-selesai');

      // Function to simulate completion detection
      function checkQuizCompletion() {
        const isCompleted = true; // This should be replaced with actual logic
        if (isCompleted) {
          btnSelesai.classList.remove('hidden');
        }
      }

      // Call the checkQuizCompletion function periodically to simulate completion detection
      setInterval(checkQuizCompletion, 5000); // Check every 5 seconds

      btnSelesai.addEventListener('click', function() {
        $('#overlay').modal('show');
      });
    });
  </script>
</body>
</html>
