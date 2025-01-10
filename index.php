<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Bootstrap</title>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#" id="logo-nav"><img src="img/icon-nav.png"> Crunchycrunch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="item">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article" id="item">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery" id="item">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <button id="darkModeBtn" class="btn btn-dark me-2">
                            <i class="bi bi-moon"></i> Dark
                        </button>
                    </li>
                    <li class="nav-item">
                        <button id="lightModeBtn" class="btn btn-light">
                            <i class="bi bi-brightness-high"></i> Light
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" target="_blank">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Begin -->
    <section id="hero" class="text-center p-5  text-sm-start">
        <div class="container ">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img class="img-fluid" id="display"
                    src="https://i.pinimg.com/736x/db/88/3f/db883fbccee88bca91180c4b952b2dab.jpg" width="300">
                <div>
                    <h1 class="fw-bold display-3">Demon Slayer :</h1>
                    <h4 class="lead display-3"> Kimetsu no yaiba Infinity Castle.</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    </section>

    <!-- article begin -->
    <section id="article" class="isi text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                <?php
                $sql = "SELECT * FROM article ORDER BY tanggal DESC";
                $hasil = $conn->query($sql);

                while ($row = $hasil->fetch_assoc()) {
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["judul"] ?></h5>
                                <p class="card-text">
                                    <?= $row["isi"] ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">
                                    <?= $row["tanggal"] ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- article end -->


<!-- gallery begin -->
    <section id="gallery" class="isi text-center p-5">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">Gallery</h1>
        <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <?php
            // Menghubungkan ke database dan mengambil data gambar dari tabel gallery
            $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
            $hasil = $conn->query($sql);
            
            // Menentukan item pertama untuk menjadi 'active'
            $first_item = true;
            
            while($row = $hasil->fetch_assoc()){
                $active_class = $first_item ? 'active' : ''; // Menandai item pertama dengan kelas active
                $first_item = false; // Hapus status aktif setelah item pertama
            ?>
                <div class="carousel-item <?= $active_class ?>">
                    <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                </div>
            <?php
            }
            ?>
        </div>
        
        <!-- Tombol navigasi carousel -->
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
    </section>
    <!-- gallery end -->

    <!-- Schedule Begin -->
    <section id="schedule" class="isi text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Schedule</h1>
            <div class="row row-cols-1 justify-content-center d-flex row-cols-md-4 g-4">
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color: red; color: white;">
                            Senin
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>
                                    Probstat
                                    <br>
                                    12.30-15.00|H.5.7
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p>
                                    RPL
                                    <br>
                                    15.30-18.00|H.5.5
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color: red; color: white;">
                            Selasa
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>
                                    Probstat
                                    <br>
                                    12.30-15.00|H.5.7
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p>
                                    RPL
                                    <br>
                                    15.30-18.00|H.5.5
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p>
                                    SO
                                    <br>
                                    09.30-12.00|H.5.5
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color: red; color: white;">
                            Rabu
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>
                                    Probstat
                                    <br>
                                    12.30-15.00|H.5.7
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p>
                                    RPL
                                    <br>
                                    15.30-18.00|H.5.5
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color: red; color: white;">
                            Kamis
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>
                                    Probstat
                                    <br>
                                    12.30-15.00|H.5.7
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p>
                                    RPL
                                    <br>
                                    15.30-18.00|H.5.5
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color: red; color: white;">
                            Jumat
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>
                                    Probstat
                                    <br>
                                    12.30-15.00|H.5.7
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p>
                                    RPL
                                    <br>
                                    15.30-18.00|H.5.5
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color: red; color: white;">
                            Sabtu
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>
                                    Free
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Schedule End -->

    <!-- About Me Begin -->
    <section id="aboutme" class="isi text-center p-5  text-sm text-black ">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3 ">About Me</h1>
            <div class="d-sm-flex flex-sm-row align-items-center justify-content-center">
                <img class="img-fluid rounded-circle" src="https://tse4.mm.bing.net/th?id=OIP.WyUJ7CFjdrfSZIagmuXi8gHaE8&pid=Api&P=0&h=180" width="300">
                <div class="isiAbout text-sm-start " style="padding: 30px;">
                    <p>
                        A11.2023.15344
                        <br>
                        <b style="font-size: xx-large;">Ziven Rifat R. R. H.</b>
                        <br>
                        Program Studi Teknik Informatika
                        <br>
                        <b>Universitas Dian Nuswantoro</b>
                    </p>
                    <h6 class="fw-bold display-7">
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- About Me End -->



    <!-- footer -->
    <footer class="isi text-center p-5 bg-danger-subtle" id="footer">
        <div>
            <a href="" id="icon">
                <i class="bi bi-instagram h2 p-2" id="icon"></i>
            </a>
            <a href="" id="icon">
                <i class="bi bi-whatsapp h2 p-2" id="icon"></i>
            </a>
            <a href="" id="icon">
                <i class="bi bi-twitter-x h2 p-2" id="icon"></i>
            </a>
        </div>

        <div>
            <p>Ziven Rifat &copy; 2024</p>
        </div>
    </footer>


    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Fungsi Mode Gelap
        document.getElementById("darkModeBtn").onclick = function() {
            document.body.classList.add("bg-dark", "text-white");
            document.getElementById("darkModeBtn").classList.replace("btn-dark", "btn-secondary");

            const isiElements = document.getElementsByClassName("isi");
            for (let i = 0; i < isiElements.length; i++) {
                isiElements[i].classList.replace("bg-danger-subtle", "bg-secondary");
                isiElements[i].classList.replace("text-black", "text-white");
            }

            const navbarElements = document.getElementsByClassName("navbar");
            for (let i = 0; i < navbarElements.length; i++) {
                navbarElements[i].classList.replace("bg-light", "bg-dark");
            }

            const footerElements = document.getElementsByClassName("footer");
            for (let i = 0; i < footerElements.length; i++) {
                footerElements[i].classList.replace("bg-light", "bg-dark");
            }
        };

        // Fungsi Mode Terang
        document.getElementById("lightModeBtn").onclick = function() {
            document.body.classList.remove("bg-dark", "text-white");
            document.getElementById("darkModeBtn").classList.replace("btn-secondary", "btn-dark");

            const isiElements = document.getElementsByClassName("isi");
            for (let i = 0; i < isiElements.length; i++) {
                isiElements[i].classList.replace("bg-secondary", "bg-danger-subtle");
                isiElements[i].classList.replace("text-white", "text-black");
            }

            const navbarElements = document.getElementsByClassName("navbar");
            for (let i = 0; i < navbarElements.length; i++) {
                navbarElements[i].classList.replace("bg-dark", "bg-light");
            }

            const footerElements = document.getElementsByClassName("footer");
            for (let i = 0; i < footerElements.length; i++) {
                footerElements[i].classList.replace("bg-dark", "bg-light");
            }
        };

        // Fungsi Menghilangkan text About Me

        document.querySelector("#aboutme img").onclick = function() {
            const isiAboutText = document.querySelector(".isiAbout");
            isiAboutText.style.display = isiAboutText.style.display === "none" ? "block" : "none";
        };




        //Menampilkan Jam Real Life
        window.setTimeout("tampilkanWaktu()", 1000);

        function tampilkanWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilkanWaktu()", 1000);
            document.getElementById("tanggal").innerHTML =
                waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML =
                waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
        }
    </script>


    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>