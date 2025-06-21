<?php
include 'connect.php';
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard with Icons</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --primary-color: rgb(28, 57, 187);
            --secondary-color: rgb(158, 233, 191);
            --text-color: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--secondary-color);
        }

        .navbar {
            background-color: var(--primary-color) !important;
        }

        .navbar-brand,
        .navbar .text-white,
        .navbar .btn,
        .navbar .dropdown-toggle {
            color: var(--text-color) !important;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            background-color: #1c39bb;
        }

        .dropdown-menu {
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .shadow-lg {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .form-label {
            font-weight: 600;
        }

        .input-group-text {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-primary-custom:hover {
            background-color: #1c39bb;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg px-4 py-2">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-chart-line me-2"></i>Dashboard
        </a>
        <div class="ms-auto dropdown">
            <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle me-2"></i>
                <span>User John</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end mt-2">
                <li><a class="dropdown-item" href="#" onclick="viewProfile()"><i class="fas fa-user me-2"></i>View Profile</a></li>
                <li><a class="dropdown-item" href="#" onclick="enableEdit()"><i class="fas fa-pen-to-square me-2"></i>Edit Profile</a></li>
                <li><a class="dropdown-item text-danger" href="#" onclick="deleteProfile()"><i class="fas fa-trash-alt me-2"></i>Delete Account</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container mt-5">
        <div class="bg-white shadow-lg rounded-lg p-5 animate__animated animate__fadeIn">
            <h2 class="text-xl fw-semibold mb-4">
                <i class="fas fa-user-circle me-2"></i>Users
            </h2>

            <form id="profileForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">User name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" id="profileName" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" id="profileEmail" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" id="profilePhone" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <!-- <span class="input-group-text"><i class="fas fa-stethoscope"></i></span> -->
                            <input type="password" id="profilePassword" class="form-control" value="H@mza$" disabled>
                            <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                    </div>



                    <!-- <div class="col-md-6">
                        <label class="form-label">password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                            <input type="password" class="form-control" value="Cardiologist" disabled>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6 d-none">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" id="profilePassword" class="form-control" disabled>
                        </div>
                    </div> -->
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" id="saveBtn" class="btn btn-primary-custom d-none">
                        <i class="fas fa-save me-1"></i>Save Changes
                    </button>
                </div>
            </form>
            <!-- Back to Home Button -->
            <div class="mt-4 text-start">
                <button class="btn btn-primary-custom" onclick="goHome()">
                    <i class="fas fa-arrow-left me-2"></i>Back to Home
                </button>
            </div>
        </div>

        <!-- JS Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            let profileData = {
                name: "John Doe",
                email: "john.doe@example.com",
                phone: "9876543210",
                password: "mysecurepassword"
            };

            function populateProfile() {
                document.getElementById('profileName').value = profileData.name;
                document.getElementById('profileEmail').value = profileData.email;
                document.getElementById('profilePhone').value = profileData.phone;
                document.getElementById('profilePassword').value = profileData.password;
            }

            function enableEdit() {
                ['profileName', 'profileEmail', 'profilePhone', 'profilePassword'].forEach(id => {
                    document.getElementById(id).disabled = false;
                });
                document.getElementById('saveBtn').classList.remove('d-none');
            }

            function viewProfile() {
                alert(`Name: ${profileData.name}\nEmail: ${profileData.email}`);
            }

            function deleteProfile() {
                if (confirm("Are you sure you want to delete your profile?")) {
                    profileData = {
                        name: "",
                        email: "",
                        phone: "",
                        password: ""
                    };
                    populateProfile();
                    alert("Profile deleted.");
                }
            }

            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();

                profileData.name = document.getElementById('profileName').value.trim();
                profileData.email = document.getElementById('profileEmail').value.trim();
                profileData.phone = document.getElementById('profilePhone').value.trim();
                profileData.password = document.getElementById('profilePassword').value.trim();

                ['profileName', 'profileEmail', 'profilePhone', 'profilePassword'].forEach(id => {
                    document.getElementById(id).disabled = true;
                });
                document.getElementById('saveBtn').classList.add('d-none');

                alert("Profile updated successfully!");
            });

            // Initial load
            populateProfile();


            function togglePassword() {
                const input = document.getElementById('profilePassword');
                const icon = document.getElementById('toggleIcon');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }

            function goHome() {
                // You can change the URL below to your actual home page
                window.location.href = "index.html";
            }
        </script>

</body>

</html>