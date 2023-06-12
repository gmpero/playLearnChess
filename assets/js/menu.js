$(function () { 
    $('.menu a').each(function () {
        var location = window.location.href;
        var link = this.href; 
        // console.log(link)
        // console.log(location)
        if(location == link) {
            $(this).addClass('active');
        }
    });
});