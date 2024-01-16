(function ($) {
    $(document).ready(function(){
        $(".popup-img").each(function(){
            let image = $(this).find("img").attr("src");
            $(this).attr("href", image);
        });
    });
})(jquery);