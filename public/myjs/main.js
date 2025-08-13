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

url = "http://127.0.0.1:8000/api/getriders";

console.log("fetching data from server");

riderDataDiv = document.getElementById("riders_data");
riderDataDiv.innerHTML = "fetching data from the server";
setTimeout(() => {
    fetch(url)
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
            ridersArray = json.riders;
            console.log(json.riders);
            riderDataDiv.innerHTML = "";

            ulElem = document.createElement("ul");
            for (let index = 0; index < ridersArray.length; index++) {
                const rider = ridersArray[index];
                ulElem.innerHTML += `<li>${rider["name"]}</li>`;
                console.log(ulElem.innerHTML);
            }
            console.log(ulElem);
            riderDataDiv.appendChild(ulElem);

        });
}, 3000);
