
    <div class="col-12 main-body">
        <div class="row mt-1 mb-1">

            <div class="offset-lg-1 col-12 col-lg-4 align-self-start mt-2">

                <?php

                session_start();

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];
                ?>

                    <span class="text-text-lg-start text-success"><b>Welcome</b> <?php echo ($data["fname"]); ?></span> |
                    <span class="text-text-lg-start fw-bold text-danger mylink" onclick="signout();">Sign Out</span> |

                <?php
                } else {
                ?>

                    <a href="index.php" class="text-decoration-none fw-bold mylink">Sign In or Register</a>

                <?php
                }


                ?>


                <span class="text-text-lg-start fw-bold text-info mylink">Help and Contact</span>

            </div>

            <div class="offset-lg-4 col-12 col-lg-3 align-self-end">
                <div class="row">
                    <div class="col-1 col-lg-3 mt-2">
                        <span class="text-start fw-bold">Sell</span>
                    </div>

                    <div class="col-2 col-lg-6 dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My eShop
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                            <li><a class="dropdown-item" href="#">My Sellings</a></li>
                            <li><a class="dropdown-item" href="#">My Products</a></li>
                            <li><a class="dropdown-item" href="#">Wishlist</a></li>
                            <li><a class="dropdown-item" href="#">Purchase History</a></li>
                            <li><a class="dropdown-item" href="#">Massage</a></li>
                            <li><a class="dropdown-item" href="#">Saved</a></li>
                        </ul>
                    </div>

                    <div class="col-1 col-lg-3 ms-5 ms-lg-0 mt-1 cart-icon"></div>

                </div>
            </div>

        </div>
    </div>
