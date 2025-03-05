<img src="{{ asset('assets/img/admin.png') }}" alt="Admin Logo" class="img-fluid" id="img-login">
<img src="{{ asset('assets/img/cerdik-quiz.png') }}" alt="Cerdik Quiz" class="img-logo" id="img-fluid">
<main class="container">
</main>
<style>
    @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

    body {
        background: linear-gradient(90deg, #ff7f50, #ff4500, #ff6347, #ff7f50);
        background-size: 300% 300%;
        animation: gradientMove 3s ease infinite;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .fi-simple-main-ctn {
        left: 20%;
        position: fixed;
        top: 10%;
    }

    .bg-white {
        background-color: rgba(0, 0, 0, 0) !important;
    }

    .ring-1 {
        --tw-ring-shadow: 0 0 0 0 0;
    }

    .container {
        max-width: auto;
        left: 5%;
        top: 10%;
        height: 80%;
        width: auto;
        position: fixed;
        background-color: #ffffff;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1) !important;
        border-radius: 10px !important;
        z-index: -3;
        padding: 20px;
        box-sizing: border-box;
    }

    .fi-input {
        background-color: #f9f9f9; /* Warna abu muda untuk latar belakang */
        border: 1px solid #ccc; /* Warna border yang lebih kontras */
        border-radius: 10px; /* Tambahkan border-radius untuk tampilan lebih lembut */
        padding: 10px; /* Tambahkan padding agar lebih mudah dibaca */
        color: #333; /* Warna teks yang kontras */
        font-size: 14px; /* Ukuran teks yang cukup besar */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Bayangan yang lebih tegas */
        transition: all 0.3s ease-in-out; Efek transisi saat hover
    }
    .fi-input:focus {
        outline: none;
        border: none;
    }

    .fi-icon-btn {
        border: 1px solid #ccc; /* Warna border yang lebih kontras */
        border-radius: 10px; /* Tambahkan border-radius untuk tampilan lebih lembut */
        background-color: #E8F0FE;
    }

    [type=checkbox] {
        border: 1px solid #3b3b3b;
    }

    [type=checkbox]:checked {
        background-color: #EA580C !important;
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        border-color: transparent;
    }

    .img-fluid {
        min-width: 300px;
        max-width: 400px;
        width: 100%;
        position: fixed;
        left: 30%;
        top: 20%;
        transform: translateX(-50%);
    }

    #img-fluid {
        width: 100px;
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        display: none;
    }

    .fi-logo {
            display: none;
        }

    @media (max-width: 1024px) {
        .container {
            width: 90%;
            height: 80%;
        }

        .fi-simple-main-ctn {
            position: fixed;
            left: 0;
            top: 50;
            
        }

        .img-fluid {
            display: none;
        }
    }

    @media (min-width: 1024px) {
        .container {
            left: 5%;
            top: 10%;
            width: 90%;
            height: 80%;
            border-radius: 10px;
        }
    }

    @media (max-width: 768px) {
        body {
            background: #ffffff;
        }

        .fi-simple-main-ctn {
            position: fixed;
            left: 0;
            top: 50;
            
        }

        .img-fluid {
            display: none;
        }

        #img-fluid {
            width: 100px;
            top: 5%;
            display: block;
        }

        .container {
            display: none;
        }
    }
</style>
