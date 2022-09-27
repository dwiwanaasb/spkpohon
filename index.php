<?php
session_start();
require 'php/config/functions.php';
$pohon = query("SELECT * FROM pohon");
?>

<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css/styleIndex.css" />
    <title>SPK Pohon</title>
</head>

<body>
    <header>
        <nav data-aos="fade-down">
            <a href="#home" class="page-scroll">
                <h2>SPK Pohon</h2>
            </a>
            <ul id="navUl">
                <li><a href="#about" class="page-scroll">Tentang</a></li>
                <li><a href="#data" class="page-scroll">Lihat Data</a></li>
                <li><a href="#contact" class="page-scroll">Kontak</a></li>
                <li id="login"><a href="">Login</a></li>
            </ul>
            <a href="php/login.php" class="btn-login">Login</a>

            <div class="menu-toggle">
                <input type="checkbox" name="" id="menuToggle" />
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <article>
        <div class="container" id="login-background"></div>
        <section>
            <div class="section-one">
                <div class="content" data-aos="zoom-in-right" data-aos-delay="500">
                    <h1>Sistem Pendukung Keputusan Pemilihan Pohon Peneduh Jalan</h1>
                    <p>Berdasarkan Ciri Morfologinya</p>
                    <p>Menggunakan Metode AHP - WASPAS</p>
                    <div data-aos="fade-up" data-aos-delay="1200" class="btn">
                        <button>Lihat Selengkapnya</button>
                    </div>
                </div>
                <div class="content-img">
                    <img src="img/tree_ilus.png" alt="" data-aos="zoom-in-left" data-aos-delay="500" />
                </div>
            </div>
        </section>

        <section id="about">
            <div class="section-two" data-aos="zoom-in">
                <h2>Metode yang digunakan</h2>
                <div class="content-banner">
                    <div class="method first">
                        <div class="header">
                            <h3>AHP</h3>
                        </div>
                        <div class="content">
                            <p>Sebagai pembobotan kriteria</p>
                        </div>
                    </div>
                    <div class="method">
                        <div class="header">
                            <h3>WASPAS</h3>
                        </div>
                        <div class="content">
                            <p>Sebagai pemeringkatan alternatif</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="section-three">
                <h2 class="responsive-s3-title">Lokasi penelitian</h2>
                <div class="content-img"><img src="img/dlh_smd.png" alt="" data-aos="fade-right" /></div>
                <div class="content-detail">
                    <h2 data-aos="flip-down">Lokasi penelitian</h2>
                    <div class="icon build" data-aos="zoom-in-left" data-aos-delay="500">
                        <img src="img/Building.png" alt="" />
                        <p>Dinas Lingkungan Hidup (DLH) Kota Samarinda</p>
                    </div>
                    <div class="icon loc" data-aos="zoom-in-left" data-aos-delay="700">
                        <img src="img/Place Marker.png" alt="" />
                        <p>Jalan MT. Haryono, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="section-four" data-aos="zoom-in">
                <h2>Dibangun dengan teknologi</h2>
                <div class="content-banner">
                    <div class="tech first">
                        <img src="img/html.png" alt="" />
                    </div>
                    <div class="tech second">
                        <img src="img/css.png" alt="" />
                    </div>
                    <div class="tech third">
                        <img src="img/jquery.png" alt="" class="js" />
                    </div>
                    <div class="tech fourth">
                        <img src="img/php.png" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <section id="data">
            <div class="section-five" data-aos="zoom-in">
                <h2>Data Penelitian</h2>
                <div class="tableArea" id="content-table">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pohon</th>
                            <th>Nama Latin</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($pohon as $row) : ?>
                            <tr>
                                <td class="no"><?= $i; ?></td>
                                <td class="item"><?= $row["jenis_pohon"]; ?></td>
                                <td class=" item latin"><?= $row["nama_latin"]; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="section-six">
                <div class="c-one">
                    <div class="map" data-aos="fade-right">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d705.281613745095!2d117.12559125902604!3d-0.48514402206566276!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67ee00dc9afd9%3A0x21c8b6a884c50acc!2sDinas%20Lingkungan%20Hidup%20Kota%20Samarinda!5e0!3m2!1sid!2sid!4v1644679724142!5m2!1sid!2sid" width="500" height="400" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="content">
                        <h2 data-aos="zoom-in">Hubungi kami untuk informasi lebih lanjut.</h2>
                        <form action="" method="post" name="submit-to-google-sheet">
                            <div class="form-input" data-aos="fade-left" data-aos-delay="500">
                                <input type="text" name="nama" placeholder="Masukkan nama anda..." autocomplete="off" required />
                            </div>
                            <div class=" form-input" data-aos="fade-left" data-aos-delay="1000">
                                <textarea name="pesan" id="" placeholder="Masukkan pesan anda..." autocomplete="off" required></textarea>
                            </div>
                            <div class="form-button" data-aos="fade-up" data-aos-delay="1100">
                                <button type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    <small data-aos="zoom-in" data-aos-offset="0" data-aos-delay="1200">Copyright ©2022. All Rights Reserved. Developed By Dwiwana Ariananda S.B</small>
                </div>
            </div>
        </section>
    </article>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1200,
        });
    </script>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbxKuIxqx_BwP_SeOc00twGHstASdNFHiWrBNotHUcYKTqShuvgsyCO6fLi4G4ASm3nj/exec'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {
            e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(
                    response => {
                        console.log('Success!', response)
                        alert('Pesan berhasil dikirim! Terima kasih..')
                        form.reset();
                    })
                .catch(error => console.error('Error!', error.message))
        })
    </script>
</body>

</html>