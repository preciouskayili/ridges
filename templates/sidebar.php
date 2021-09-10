<?php 
    include "../config/db_connect.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="../mdbootstrap/css/sidebar.css">
    </head>
    <style>
        .sidenav {
            position: fixed;
            background: linear-gradient(to right bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.9)), url("../image/sven-scheuermeier-7la_sRWenGY-unsplash.jpg");
            background-position: center;
            background-size: cover;
        }
    </style>
    <body>
        <div class="container-fluid bg-light shadow-sm">
            <button onclick="toggleNav(document.getElementById('nav'))" class="btn btn-white rounded btn-md shadow-sm">
                <i class="fas fa-filter"></i> Filters
            </button>
        </div>
        <div class="sidenav shadow-lg bg-dark" id="nav">
            <p class="pt-3 mt-3" onclick="toggleNav(document.getElementById('nav'))" style="cursor: pointer; color: white; font-size: 40px;user-select: none;">&times;</p>
            <ul class="mt-3">
                <li class="mt-4 mb-4 list">
                    <select style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white; backdrop-filter: blur(2rem);" class="form-control m-0 p-2 rounded">
                        <option>-- Filter By Store --</option>
                    </select>
                </li>
                <li class="list mb-4">
                    <select style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white; backdrop-filter: blur(2rem);" class="form-control m-0 p-2 rounded">
                        <option>-- Filter By Category --</option>
                    </select>
                </li>
                <li class="list mb-3">
                    <select style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white; backdrop-filter: blur(2rem);" class="form-control m-0 p-2 rounded">
                        <option>-- Filter By Category --</option>
                    </select>
                </li>
                <li class="list mt-2">
                    <button class="btn btn-primary w-100 d-block mx-auto">Apply filter</button>
                </li>
                <li class="list text-center mt-3">
                    <a href="mart.php" class="text-center text-light">
                        Reset
                    </a>
                </li>
            </ul>
        </div>
    </body>
    <script>
        const toggleNav = (nav) => {
            if(nav.classList == "sidenav shadow-lg bg-dark") {
                nav.classList.add('active');
            } else {
                nav.classList.remove('active');
            }
        }
    </script>
</html>