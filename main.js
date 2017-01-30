var scrollBtnList = document.getElementsByClassName("btn-scroll");

//function scrollAnimation() {
//    alert("hello");
//};

function scrollAnimation(element, to, duration) {
    if (duration <= 0) return;
    var difference = to - element.scrollTop;
    var perTick = difference / duration * 10;

    setTimeout(function () {
        element.scrollTop = element.scrollTop + perTick;
        if (element.scrollTop == to) return;
        scrollTo(element, to, duration - 10);
    }, 10);
}

for (var i = 0; i < scrollBtnList.length; i++) {
    scrollBtnList[i].addEventListener("click", scrollAnimation(element, 0, 600));
}
