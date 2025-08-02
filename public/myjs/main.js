bodyElem = document.getElementsByTagName("body")[0];
bodyElem.style.backgroundColor = "red";

btnElem = document.getElementById("colorChanger");

btnElem.addEventListener("click", function () {
    console.log("Button clicked!");
    currentColor =
        document.getElementsByTagName("body")[0].style.backgroundColor;
    console.log("Current Background Color:", currentColor);
    if (currentColor == "blue") {
        document.body.style.backgroundColor = "red";
    } else if (currentColor == "red") {
        document.body.style.backgroundColor = "blue";
    }
});
