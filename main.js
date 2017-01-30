var scrollBtnList = document.getElementsByClassName("btn-scroll");

var scrollAnimation = function () {
    alert(this);
};

for (var i = 0; i < scrollBtnList.length; i++) {
    scrollBtnList[i].addEventListener("click", scrollAnimation);
}
