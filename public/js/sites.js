
$("#buttonAdvancedSearch").click(function(){
    var $target = $(".advanced_search_div"),
        $quick = $(".quick-search"),
        $toggle = $(this);
    $target.slideToggle( 300, function () {
        $toggle.text(($target.is(':visible') ? 'Advanced Filters' : 'Advanced Filters'));
    });
    $quick.slideToggle( 300, function () {
        $toggle.text(($target.is(':visible') ? 'Advanced Filters' : 'Advanced Filters'));
    });
});

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}