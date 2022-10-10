<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/logo.svg" />

    <title>Home | eShop</title>
</head>

<body class="main-body">
    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <div class="col-12 justify-content-center">
                <div class="row mb-3">
                    <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height:60px;"></div>

                    <div class="col-12 col-lg-6">
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">

                            <select name="" id="" class="form-select" style="max-width: 250px;">
                                <option value="0">All Categories</option>
                                <?php

                                require "connection.php";

                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;


                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["name"]);  ?></option>

                                <?php
                                }

                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-12 col-lg-2 d-grid">
                        <button class="btn btn-primary mb-3 mt-3">Search</button>
                    </div>

                    <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                        <a href="#" class="link link-primary text-decoration-none fw-bold ">Advanced</a>
                    </div>
                </div>
            </div>
            <hr />
            <div class="col-12">
                <div class="row">
                    <div class="col-12 d-none d-lg-block">
                        <div class="row">
                            <div id="carouselExampleIndicators" class="offset-2 col-8 carousel slide carousel-fade" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="resource/slider images/posterimg.jpg" class="d-block poster-img-1">
                                        <div class="carousel-caption d-none d-md-block poster-caption">
                                            <h5 class="poster-title text-black fw-bold">Welcome to eShop</h5>
                                            <p class="poster-txt">The world's Best online store by oneclick</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slider images/posterimg2.jpg" class="d-block poster-img-1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slider images/posterimg3.jpg" class="d-block poster-img-1">
                                        <div class="carousel-caption d-none d-md-block poster-caption-1">
                                            <h5 class="poster-title text-black fw-bold">Be Free...</h5>
                                            <p class="poster-txt">Experience The Lowest Delivery Cost with us</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            $c_rs = Database::search("SELECT * FROM `category`");
            $c_num = $category_rs->num_rows;
            for ($y = 0; $y < $c_num; $y++) {
                $cdata = $c_rs->fetch_assoc();
            ?>
                <div class="col-12 mt-3 mb-5">
                    <a href="#" class="text-decoration-none link-dark fs-4 fw-bold"><?php echo ($cdata["name"]); ?></a> &nbsp; &nbsp;
                    <a href="#" class="text-decoration-none link-dark fs-6">See All &nbsp; &rarr;</a>
                </div>


                <div class=" col-12 mb-3">
                    <div class="row border border-primary">

                        <div class="col-12">
                            <div class="row justify-content-center gap-2">

                                <?php

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cdata["id"] . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                $product_num = $product_rs->num_rows;

                                for ($z = 0; $z < $product_num; $z++) {
                                    $product_data = $product_rs->fetch_assoc();

                                ?>

                                    <div class="card mt-2 mb-2" style="width: 18rem;">

                                        <?php

                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `id`='". $product_data["id"] ."'");
                                       $image_data = $image_rs->fetch_assoc();


                                        ?>
                                        <img src="<?php echo ($image_data["code"]); ?>" class="card-img-top img-thumbnail mb-1 mt-1" style="height: 160px;" />
                                        <div class="card-body ms-0 m-0">
                                            <h5 class="card-title"><?php echo ($product_data["title"]); ?><span class="badge bg-info">New</span></h5>
                                            <span class="text-primary card-text">RS <?php echo ($product_data["price"]); ?> /=</span><br />

                                            <?php
                                            if ($product_data["qty"] > 0) {
                                            ?>
                                                <span class="text-success">In Stock</span>
                                                <span class="card-text text-secondary fw-bold">| <?php echo ($product_data["qty"]); ?> Items Available</span><br />
                                                <button class="btn col-12 btn-success">Buy Now</button>
                                                <button class="btn col-12 btn-danger mt-2">Add to Cart</button>
                                            <?php
                                            } else {
                                                ?>
                                                <span class="text-danger">Out Of Stock</span>
                                                <span class="card-text text-secondary fw-bold">| 0 Items Available</span><br />
                                                <button class="btn col-12 btn-success disabled">Buy Now</button>
                                                <button class="btn col-12 btn-danger mt-2 disabled">Add to Cart</button>
                                                <?php
                                            }
                                            ?>


                                            <button class="btn col-12 mt-2 text-danger"><i class="fs-4 bi bi-heart-fill"></i></button>
                                        </div>
                                    </div>
                                <?php
                                }

                                ?>

                            </div>
                        </div>

                    </div>
                </div>

            <?php
            }
            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>