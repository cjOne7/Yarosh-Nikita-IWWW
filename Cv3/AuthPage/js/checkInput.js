function checkInputFields(maxSymbolsAllowed, name, id) {
    const value = document.getElementsByName(name)[0].value;
    const btn = document.getElementById(id);
    if (value.trim().length < maxSymbolsAllowed) {
        btn.disabled = true;
        btn.style.cursor = "not-allowed";
        document.getElementById('errMes').innerHTML = value.trim() === ""
            ? "" : "Username too short. Minimum is " + maxSymbolsAllowed + " chars.";
    } else {
        btn.disabled = false;
        btn.style.cursor = "pointer";
        document.getElementById('errMes').innerHTML = "";
    }
}