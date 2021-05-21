<?php 
    if(!isset($_SESSION['username'])) {
        header('Location: ../Auth/login.php');
    } else {
        // Allow user on page
    }
?>
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile -->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.html"
                        aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.html"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Basic Table</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fontawesome.html"
                        aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">Icon</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="store.php"
                        aria-expanded="false">
                        <i class="fas fa-industry"></i>
                        <span class="hide-menu">Stores</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                        aria-expanded="false">
                        <i class="fa fa-columns" aria-hidden="true"></i>
                        <span class="hide-menu">Blank Page</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.html"
                        aria-expanded="false">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span class="hide-menu">Error 404</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="settings.php"
                        aria-expanded="false">
                        <i class="fas fa-cog" aria-hidden="true"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>
                <li class="text-center p-20 upgrade-btn">
                    <a href="https://www.wrappixel.com/templates/ampleadmin/"
                        class="btn d-grid btn-danger text-white" target="_blank">
                        Upgrade to Pro</a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
