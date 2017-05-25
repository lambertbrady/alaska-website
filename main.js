//SMOOTH SCROLL//

//--EASING FUNCTIONS//

//Powers
//Quadratic = 2
//Cubic = 3
//Quartic = 4
//Quintic/Strong = 5

function easeIn(time, duration, power) {
    return Math.pow(time / duration, power);
}

function easeOut(time, duration, power) {
    return 1 - Math.pow(1 - (time / duration), power);
}

function easeInOutSine(time, duration) {
    return -(Math.cos(Math.PI * time / duration) - 1) / 2;
}

//--END EASING FUNCTIONS//


function animateProperty(time, initialVal, finalVal, duration) {
    var factor = easeInOutSine(time, duration);
    var newVal = (finalVal - initialVal) * factor + initialVal;
    return newVal;
}

function getScrollSpeed(distance, minSpeed, maxSpeed) {
    var speed = (1 / 2) * distance + minSpeed; //linear
    speed = Math.min(maxSpeed, speed);
    return speed / 1000; //convert to pixels per millisecond
}

function animateScroll(targetTop) {
    var scrollDirection = Math.sign(targetTop); //returns 1, 0, -1
    var scrollDistance = Math.abs(targetTop); //pixels
    if (scrollDistance == 0) {
        return;
    } else if (scrollDirection == 1) { //target is below the top of the viewport
        var maxScrollDistance = document.body.scrollHeight - window.innerHeight - document.body.scrollTop; //distance from bottom of viewport to bottom of page
        scrollDistance = Math.min(maxScrollDistance, scrollDistance); //adjusts scrollDistance in case there isn't enough content between the target and the bottom of the page to scroll the target all the way to the top of the viewport
    }
    var minScrollSpeed = 500; //pixels per millisecond
    var maxScrollSpeed = 1500; //pixels per millisecond
    var scrollSpeed = getScrollSpeed(scrollDistance, minScrollSpeed, maxScrollSpeed);
    var duration = scrollDistance / scrollSpeed;
    var minTimeSteps = 20;
    var eqnTimeSteps = .05 * scrollDistance //describes how to get the number of time steps for a scroll animation
    var timeSteps = Math.max(eqnTimeSteps, minTimeSteps); //keeps a minimum number of time steps
    var deltaTime = duration / timeSteps;
    var time = 0; //don't use "new window.Date().getTime()" because the animation won't finish, due to delays that occur when running code within the interval. Calculating this way instead will make the animation better, although it will take slightly longer than the value of "duration" to complete
    var initialVal;
    var currentVal = initialVal = scrollDirection * scrollDistance;
    var finalVal = 0; //top of element will be in line with top of viewport at end of animation, so there will be 0 pixels from viewport to top of target element
    var pixelsScrolled = 0;
    var animationInterval = setInterval(function () {
        if (time <= duration) {
            var newVal = animateProperty(time, initialVal, finalVal, duration);
            var scrollVal = Math.round(currentVal - newVal); //decimal values get truncated when the .scrollBy method is called, so round scroll value to nearest integer, which represents a pixel
            window.scrollBy(0, scrollVal);
            currentVal = newVal;
            time += deltaTime;
            pixelsScrolled += scrollVal;
        } else {
            var scrollVal = initialVal - pixelsScrolled; //gives the final scroll distance needed - the target can only end up at it's exact, final destination if duration/deltaTime is equal to an integer value. Even so, the target may not get to the exact destination due to rounding errors, so the difference between the initial distance and the real number of pixels scrolled is used to give the final scroll value
            window.scrollBy(0, scrollVal);
            clearInterval(animationInterval);
        }
    }, deltaTime);
}

function runScroll(event) {
    event.preventDefault();
    var targetID = event.target.getAttribute('href');
    var targetTop = document.querySelector(targetID).getBoundingClientRect().top; //number of pixels from viewport to top of target element
    animateScroll(targetTop);
}

var scrollBtnElements = document.querySelectorAll(".btn-scroll");
for (var i = 0; i < scrollBtnElements.length; i++) {
    scrollBtnElements[i].addEventListener("click", runScroll, false);
}


//END SMOOTH SCROLL//

//FORM VALIDATION//


//function validateEmail(email) {
//    return true;
//}
//
//function validateURL(url) {
//    return true;
//}
//
//function validateTel(tel) {
//    return true;
//}
//
//function validateNumber(number) {
//    return true;
//}
//
//function validateText(text) {
//    return true;
//}
//
//function validateTextarea(text) {
//    return true;
//}
//
//function validateRequired(field) {
//    if (field.value == "") {
//        return false;
//    }
//    return true;
//}
//
//function updateValidity(field, valid) {
//    if (valid == false) {
//        field.classList.add("invalid");
//    } else {
//        if (field.classList.contains("invalid")) {
//            field.classList.remove("invalid");
//        }
//    }
//    return;
//}
//
//function validateForm(form) {
//    event.preventDefault();  ///////
//    form.classList.add("submitted");
//    for (var i = 0; i < form.elements.length; i++) {
//        var valid;
//        var message;
//        var field = form.elements[i];
//        if (field.classList.contains("required")) {
//            valid = validateRequired(field);
//            message = 'Please fill in the required field.';
//            updateValidity(field, valid);
//            //addMessage
//            continue;
//        }
//        switch (field.type) {
//            case "email":
//                valid = validateEmail(field);
//                message = 'fix email';
//                break;
//            case "URL":
//                valid = validateURL(field);
//                message = 'fix URL';
//                break;
//            case "tel":
//                valid = validateTel(field);
//                message = 'fix phone';
//                break;
//            case "number":
//                valid = validateNumber(field);
//                message = 'fix number';
//                break;
//            case "text":
//                valid = validateText(field);
//                message = 'fix text';
//                break;
//            case "textarea":
//                valid = validateTextarea(field);
//                message = 'fix textarea';
//                break;
//            //add something for <textarea>, which doesn't have a "type" attribute
//        }
//        updateValidity(field, valid);
//    }
//}

function validateForm(form) {  //onsubmit
    event.preventDefault();
    form.classList.add("submitted");
    form.querySelector(":invalid").focus();
}

//END FORM VALIDATION//
