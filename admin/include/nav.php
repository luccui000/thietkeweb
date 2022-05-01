<style>
    .input-search {
        background-color: #343a40;
        border-color: #555;

    }
    .input-search:focus {
        background-color: #343a40;
        border-color: #89b7ff;
    }
    .input-search-button {
        background-color: #63707c !important;
        border-color: #555;
        color: #fff;
        cursor: pointer;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-uppercase font-weight-bold" href="#">.TraVinh</a>
    <div style="margin-left: 125px">
        <div class="input-group">
            <input type="text" class="form-control input-search" placeholder="Tìm kiếm" >
            <div class="input-group-append">
                <span class="input-group-text input-search-button" id="basic-addon2">Tìm kiếm</span>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                    <span>
                        Hello,
                        <b>
                            <?php
                            if(isset($_SESSION[SESSION_AUTH_NAME]))
                                echo $_SESSION[SESSION_AUTH_NAME];
                            ?>
                        </b>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" >
                    <a class="dropdown-item" href="#">Tài khoản</a>
                    <a class="dropdown-item" href="<?php url('/admin/auth/logout.php') ?>">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </div>
</nav>