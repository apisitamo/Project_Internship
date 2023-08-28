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
                <div onclick="swap('./assets/images/gallery-1.png')" type="button" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery-1.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery-2.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery-2.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery-3.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery-3.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery-4.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery-4.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery5.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery5.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery6.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery6.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery7.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery7.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery8.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery8.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery9.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery9.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery10.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery10.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery11.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery11.png" alt="">
                    </div>
                </div>

                <div onclick="swap('./assets/images/gallery12.png')" class="col-lg-3 col-md-4 mb-4 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="w-100 h-100 card-img position-relative">
                        <img class="search-hover" src="assets/images/hover-search.svg" alt="">
                        <img class="w-100 rounded-3" src="./assets/images/gallery12.png" alt="">
                    </div>
                </div>
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
        function swap(path){
            document.getElementById("modal-img").src = path
        }
    </script>
    <?php include 'include/footer.php'; ?>
</body>

</html>