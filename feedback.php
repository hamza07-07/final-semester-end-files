<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($username) || empty($email) || empty($message)) {
        echo "<script>alert('Please fill in all fields.');</script>";
    } else {
        $sql = "INSERT INTO `caregroup`.`feedback` (username, email, message) 
                VALUES ('$username', '$email', '$message')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo "<script>window.location.href='appointment.php';</script>";
            exit();
        } else {
            die(mysqli_error($connect));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Care Group</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

  <style>
    body {
      opacity: 0;
      animation: bodyFadeIn 1.2s ease forwards;
      font-family: "Poppins", sans-serif;
      background-color: #f8f9fa;
    }
    @keyframes bodyFadeIn { to { opacity: 1; } }

    .section-animate {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease-out;
    }
    .section-visible {
      opacity: 1 !important;
      transform: translateY(0) !important;
    }

    .navbar {
      background-color: #1ed600 !important;
    }
    .navbar .btn:hover {
      transform: scale(1.05);
      background-color: #2832ff !important;
      color: #ffffff;
    }

    .banner {
      background: url('bg3.jpg') no-repeat center center;
      background-size: cover;
      background-attachment: fixed;
      text-align: center;
      padding: 160px 20px;
      color: white;
      position: relative;
      min-height: 500px;
    }
    .banner::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: #2833ff89;
      z-index: 1;
    }
    .banner h1, .banner p {
      position: relative;
      z-index: 2;
    }

    .feedback-form {
      max-width: 600px;
      margin: 50px auto;
      background-color: #ffffff;
      border: 2px solid #1C39BB;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(28, 57, 187, 0.2);
    }
    .feedback-form h2 {
      color: #1C39BB;
      margin-bottom: 25px;
      text-align: center;
    }
    .form-label {
      color: #1C39BB;
      font-weight: 500;
    }
    .form-control:focus {
      border-color: #93E9BE;
      box-shadow: 0 0 5px #93E9BE;
    }
    .btn-custom {
      background-color: #1C39BB;
      color: #ffffff;
    }
    .btn-custom:hover {
      background-color: #93E9BE;
      color: #1C39BB;
    }
    .footer-social {
      background-color: #1c39bb;
      color: white;
    }
    .footer-social a:hover {
      transform: scale(1.2);
      color: #93E9BE !important;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light px-4 section-animate">
    <a class="navbar-brand text-white" href="#"><h3><b>Care Group</b></h3></a>
    <div class="ms-auto">
      <a class="btn btn-primary" href="#">Login</a>
      <a class="btn btn-primary" href="#">Register</a>
    </div>
  </nav>

  <!-- Banner -->
  <div class="banner section-animate">
    <h1>Get Feedback</h1>
    <p class="lead">Find specialist doctors near you and book appointments in just a few clicks.</p>
  </div>

  <!-- Feedback Form -->
  <div class="container">
    <div class="feedback-form">
      <h2>Feedback Form</h2>

      <form id="feedbackForm" method="post" novalidate>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="username" required>
          <div class="invalid-feedback">Please enter your username.</div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email" required>
          <div class="form-text">We'll never share your email with anyone else.</div>
          <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
          <div class="invalid-feedback">Please enter your message.</div>
        </div>

        <button type="submit" name="submit" class="btn btn-custom w-100">Submit Feedback</button>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <section class="footer-social text-center p-4">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
      <span>Get connected with us on social networks:</span>
      <div>
        <a href="#" class="me-4 text-white"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="me-4 text-white"><i class="fab fa-whatsapp"></i></a>
        <a href="#" class="me-4 text-white"><i class="fas fa-phone"></i></a>
        <a href="#" class="me-4 text-white"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Validation -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('feedbackForm');

      form.addEventListener('submit', function (e) {
        let isValid = true;

        ['username', 'email', 'message'].forEach(id => {
          const input = document.getElementById(id);
          if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
          } else {
            input.classList.remove('is-invalid');
          }
        });

        if (!isValid) {
          e.preventDefault(); // Prevent form if invalid
        }
      });
    });
  </script>

  <!-- Animate Sections -->
  <script>
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('section-visible');
        }
      });
    });

    document.querySelectorAll('.section-animate').forEach(section => {
      observer.observe(section);
    });
  </script>
</body>
</html>
