<?php require_once "connect.php"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch trình</title>
    <link rel="stylesheet" href="<?php echo url("assets/css/lichtrinh.css") ?>">
</head>
<body >
    <div class="container">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        <button class="btn-start">Start</button>
    </div>
    <div class="lichtrinh">
        <div class="step step1">1</div>
        <article class="card card1">
            <div class="card-body">
                <h3>Bien Ba Dong</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                <p>Thời gian tham quan: <b>3h00</b></p>
                <p>Chi phí trung bình: <b>100-300k / người</b></p>
            </div>
        </article>
        <div class="step step2">2</div>
        <article class="card card2">
            <div class="card-body">
                <h3>Bien Ba Dong</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                <p>Thời gian tham quan: <b>3h00</b></p>
                <p>Chi phí trung bình: <b>100-300k / người</b></p>
            </div>
        </article>
        <div class="step step3">3</div>
        <article class="card card3">
            <div class="card-body">
                <h3>Bien Ba Dong</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                <p>Thời gian tham quan: <b>3h00</b></p>
                <p>Chi phí trung bình: <b>100-300k / người</b></p>
            </div>
        </article>
        <div class="step step4">4</div>
        <article class="card card4">
            <div class="card-body">
                <h3>Bien Ba Dong</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                <p>Thời gian tham quan: <b>3h00</b></p>
                <p>Chi phí trung bình: <b>100-300k / người</b></p>
            </div>
        </article>
        <div class="step step5">5</div>
        <article class="card card5">
            <div class="card-body">
                <h3>Bien Ba Dong</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                <p>Thời gian tham quan: <b>3h00</b></p>
                <p>Chi phí trung bình: <b>100-300k / người</b></p>
            </div>
        </article>
        <div class="step step6">6</div>
        <article class="card card6">
            <div class="card-body">
                <h3>Bien Ba Dong</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                <p>Thời gian tham quan: <b>3h00</b></p>
                <p>Chi phí trung bình: <b>100-300k / người</b></p>
            </div>
        </article>
        <svg
                class="move-line"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                style="width: 100%; height: 400vh; margin-top: 200px" >
            <path
                    class="path"
                    d="M0,50 L700,50
                        A50,50 0 0,1 700,500
                        L250,500
                        A50,50 0 1,0 250,950
                        L1200,950
                        A50,50 0 0,1 1200,1500
                        L500,1500
                        A50,50 0 1,0 500,2100
                        L1300,2100
                        A50,50 0 0,1 1300,2800
                        L730,2800
                        L730,3200"
            >
            </path>
        </svg>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            const path = document.querySelector(".path");
            const pathLength = path.getTotalLength();
            $(path).css('stroke-dasharray', pathLength)
            $(path).css('stroke-dashoffset', pathLength)
            $('.btn-start').click( function(){
                $('.step-wrapper').toggleClass('move-line');
            });
        });
    </script>
</body>
</html>