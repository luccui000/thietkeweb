<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script>
    $(".nav-link").click(function () {
        $(this).toggleClass("open");
        $(this).children(".arrow").toggleClass("open");
    })
    window.deboundAjax = (fn, delay) => {
        return args => {
            clearTimeout(fn.id);
            fn.id = setTimeout(() => {
                fn.call(this, args);
            }, delay)
        }
    }
    //$(document).ready(function() {
    //    $('.page-container').hide();
    //    setTimeout(function(){
    //        $('.preloader').fadeOut('slow');
    //        $('.page-container').fadeIn('slow');
    //    }, <?php //echo PRELOADER_TIME ?>//);
    //})
</script>