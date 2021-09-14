function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (typeof(storage) !== "undefined") {
            localStorage.setItem("fullScreen", "open");
        } else {
            localStorage.setItem("fullScreen", "open");
        }
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
            document.getElementById("opengal").innerHTML = '<i class="fa fa-compress"></i>';
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
            document.getElementById("opengal").innerHTML = '<i class="fa fa-compress"></i>';
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            document.getElementById("opengal").innerHTML = '<i class="fa fa-compress"></i>';
        }
    } else {
        if (typeof(storage) !== "undefined") {
            localStorage.setItem("fullScreen", "close");
        } else {
            localStorage.setItem("fullScreen", "close");
        }
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
            document.getElementById("opengal").innerHTML = '<i class="fa fa-expand"></i>';
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
            document.getElementById("opengal").innerHTML = '<i class="fa fa-expand"></i>';
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
            document.getElementById("opengal").innerHTML = '<i class="fa fa-expand"></i>';
        }
    }
}