function onClick(elementId) {
    const url = document.getElementById(elementId).style.backgroundImage;
    document.getElementById("img01").src = url.substring(5, url.length - 2);
    document.getElementById("modal-block").style.display = "block";
}