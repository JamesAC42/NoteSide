function showNav() {
    var x = document.getElementById("rightNav");
    console.log("hello");
    if (x.className === "navbar right") {
        x.className += " responsive";
    } else {
        x.className = "navbar right";
    }
}