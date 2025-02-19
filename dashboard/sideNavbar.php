<style>
    .dark-edition .sidebar[data-color="purple"] li.active>a {
        background: linear-gradient(60deg, #000078, #913f9e);
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
    }
</style>

<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-4.jpg">
    <div class="logo" style="display:flex; justify-content: space-around;">
        <a class="navbar-brand" href="../"><img src="../assets/img/pol_logo.png" alt="CMS" title="CMS" style="width: 50%; margin: 0 25%;"></a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="./#">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#profile">
                    <i class="material-icons">account_circle</i>
                    <p>Profile</p>
                </a>
            </li>
            <?php
            if ($_SESSION['userType'] == 'admin') {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="#users">
                        <i class="material-icons">group</i>
                        <p>Users</p>
                    </a>
                </li>
            <?php
            }
            if ($_SESSION['userType'] == 'admin') {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="#departments">
                        <i class="material-icons">category</i>
                        <p>Departments</p>
                    </a>
                </li>
            <?php
            }
            if ($_SESSION['userType'] != 'user') {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="#announcements">
                        <i class="material-icons">add_alert</i>
                        <p>Announcements</p>
                    </a>
                </li>
            <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="#complaints">
                    <i class="material-icons">content_paste</i>
                    <p>Complaints</p>
                </a>
            </li>
        </ul>
    </div>
</div>