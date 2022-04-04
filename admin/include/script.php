<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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