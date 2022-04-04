<div class="container-bg">
    <section id="homepage">
        <header id="trangchu" class="container d-flex justify-content-between align-items-center">
            <div class="container-logo">
                <h4 class="text-uppercase">.Tra Vinh</h4>
            </div>
            <ul class="travinh__menu mt-2">
                <li class="travinh__menu--item">
                    <a href="#trangchu" class="travinh__menu--link">Trang chủ</a>
                </li>
                <li class="travinh__menu--item">
                    <a href="#diadiemNoiBat" class="travinh__menu--link">Địa điểm</a>
                </li>
            </ul>
        </header>
        <div class="container">
            <div class="container__desc">
                <h2 class="container__desc--title">Biển ba động</h2>
                <p class="container__desc--detail">Lorem ipsum...</p>
            </div>
            <div class="container__explore">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h3>Biển ba động</h3>
                                <p>Lorem ipsum...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h3>Biển ba động</h3>
                                <p>Lorem ipsum...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                </div>
                <div class="travinh__background">
                    <img class="travinh__background--img" src="<?php echo BASE_URL . 'assets/images/home/Chua3.jpeg'; ?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="travinh__noibat pt-2" id="diadiemNoiBat">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <?php $img = 'https://images.unsplash.com/photo-1648996024018-5c97f307fa6a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1068&q=80'; ?>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="w-100 h-100 rounded" src="<?php echo $img; ?>" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <img class="w-100 rounded" src="<?php echo $img; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <img class="w-100 rounded" src="<?php echo $img; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="tag tag-danger">Dia diem</span>
                                <h2 class="mt-4">Biển ba động</h2>
                                <span class="mt-2">Lorem ipsum</span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <?php $img = 'https://images.unsplash.com/photo-1648996024018-5c97f307fa6a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1068&q=80'; ?>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="w-100 h-100 rounded" src="<?php echo $img; ?>" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <img class="w-100 rounded" src="<?php echo $img; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <img class="w-100 rounded" src="<?php echo $img; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="tag tag-danger">Dia diem</span>
                                <h2 class="mt-4">Biển ba động 2</h2>
                                <span class="mt-2">Lorem ipsum</span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <?php $img = 'https://images.unsplash.com/photo-1648996024018-5c97f307fa6a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1068&q=80'; ?>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="w-100 h-100 rounded" src="<?php echo $img; ?>" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <img class="w-100 rounded" src="<?php echo $img; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <img class="w-100 rounded" src="<?php echo $img; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="tag tag-danger">Dia diem</span>
                                <h2 class="mt-4">Biển ba động 3</h2>
                                <span class="mt-2">Lorem ipsum</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a style="color: #000;" class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a  style="color: #000;" class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <section class="travinh__recommended mt-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <span class="tag tag-danger">Dịch vụ của chúng tôi</span>
                </div>
            </div>
        </section>
    </div>
</div>