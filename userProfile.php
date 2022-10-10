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

    <title>User Profile | eShop</title>
</head>

<body class="main-body">
    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <?php

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `profile_image` ON user.email=profile_image.user_email INNER JOIN `user_has_address` ON user.email=user_has_address.user_email INNER JOIN `city` ON user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id INNER JOIN `province` ON district.province_id=province.id INNER JOIN `gender` ON gender.id=user.gender_id WHERE `email`='".$email."'");

                $data =$details_rs->fetch_assoc();

                echo ($data["fname"]);
            ?>

                <div class="col-12 bg-primary">
                    <div class="row">
                        <div class="col-12 bg-body rounded mt-4 mb-4">
                            <div class="row g-2">
                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <img src="resource/new_user.svg" class="rounded mt-5" style="width:150px;">

                                        <span class="fw-bold">Sithija Karunasena</span>
                                        <span class="fw-bold text-black-50">sithikaru@gmail.com</span>
                                        <input type="file" class="d-none" id="profileimg" accept="image/*">
                                        <label for="profileimg" class="btn btn-primary mt-5">Update Profile Image</label>
                                    </div>
                                </div>
                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5 d-grid">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input disabled type="password" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-eye-slash-fill"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">email</label>
                                                <input type="text" class="form-control disabled" disabled id="">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control disabled" disabled id="">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Address Line 1</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Address Line 2</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Province</label>
                                                <select id="" class="form-control form-select">
                                                    <option>#</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">District</label>
                                                <select id="" class="form-control form-select">
                                                    <option>#</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">City</label>
                                                <select id="" class="form-control form-select">
                                                    <option>#</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Postal-Code</label>
                                                <input type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Gender</label>
                                                <input disabled type="text" class="form-control" id="">
                                            </div>
                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="row">
                                        <span style="height:300px ;" class="mt-5 fw-bold ms-5 me-5 border border-1 p-2 text-black-50">Display adds</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else {
                header("Location:http://localhost/eshop/home.php");
            }

            ?>


            <?php include "footer.php"; ?>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>