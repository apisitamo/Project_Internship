<?php include 'include/head.php';

if ($langId == 1) {
    $gallery = "แกลเลอรี";
} else {
    $gallery = "Gallery";
}
?>

<body>
    <section class="banner-page">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $gallery ?></p>
        </div>
    </section>

    <section class="gallery">
        <div class="container">
            <div class="row">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bsa";

                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT * FROM `add_gallery` ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div onclick="swap('<?php echo $row['img']; ?>')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="w-100 h-100 card-img position-relative">
                                <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                                <img class="w-100 rounded-3" src="<?php echo $row['img']; ?>" alt="">
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "ไม่พบสินค้าในระบบ";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content rounded-5">
                <img class="rounded-5" id="modal-img" height="80%" src="" alt="">
            </div>
        </div>
    </div>

    <script>
        function swap(path) {
            document.getElementById("modal-img").src = path
        }
    </script>

    <?php include 'include/footer.php'; ?>

</body>

</html>