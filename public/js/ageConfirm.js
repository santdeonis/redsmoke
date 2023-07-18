document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("ageConfirm");
    var confirmButton = document.getElementById("confirmButton");

    var ageConfirmed = getCookie("ageConfirmed");

    if (!ageConfirmed) {
        modal.style.display = "block";
    }

    confirmButton.addEventListener("click", function() {
        setCookie("ageConfirmed", "true", 1);
        modal.style.display = "none";
    });
});

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === " ") {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) === 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return null;
}
