////function scrollAnimation() {
////    alert("hello");
////};
//

function runScroll() {
    scrollTo(document.documentElement, 0, 600);
}

var scrollBtnList;
scrollBtnList = document.querySelectorAll(".btn-scroll");

for (var i = 0; i < scrollBtnList.length; i++) {
    scrollBtnList[i].addEventListener("click", runScroll);
}

function scrollTo(element, to, duration) {
    if (duration <= 0) return;
    var difference = to - element.scrollTop;
    var perTick = difference / duration * 10;

    setTimeout(function () {
        element.scrollTop = element.scrollTop + perTick;
        if (element.scrollTop == to) return;
        scrollTo(element, to, duration - 10);
    }, 10);
}
