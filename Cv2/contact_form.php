<?php
$style = "/css/form_style.css";
$title = "Contact form";
include_once "header.php";
?>
<body onload="checkDateOfBirth()">
<?php
include_once "navbar.html";
?>

<form class="form">
    <fieldset>
        <div class="control">
            <h1>Contact us</h1>
        </div>
        <div class="control block-cube block-input">
            <input name="username" placeholder="Name&Surname" type="text" maxlength="60">
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
        </div>
        <div class="control block-cube block-input">
            <input type="email" name="email" id="email" required="required" placeholder="E-mail..." maxlength="255"
                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
        </div>
        <div class="control block-cube block-input">
            <input type="date" name="dateOfBirth" id="dateOfBirth">
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
        </div>
        <div class="control block-cube block-input checkbox">
            <input type="checkbox" onclick="isChecked(this)">
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
        </div>
        <div class="control block-cube block-input">
            <textarea id="about" name="about" maxlength="500" placeholder="Type here..."></textarea>
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
        </div>
        <div id="remainingChars"></div>
        <button class="btn block-cube block-cube-hover" type="button">
            <div class="bg-top">
                <div class="bg-inner"></div>
            </div>
            <div class="bg-right">
                <div class="bg-inner"></div>
            </div>
            <div class="bg">
                <div class="bg-inner"></div>
            </div>
            <div class="text">Send</div>
        </button>
    </fieldset>
</form>

<script type="text/javascript">
    function checkDateOfBirth() {
        const currentDate = new Date();
        const month = currentDate.getMonth() + 1;
        //build a date format like: yyyy-MM-dd. If month = 7, for correct work date.max must be 07
        document.getElementById("dateOfBirth").max
            = `${currentDate.getFullYear()}-${month < 10 ? `0${month}` : month}-${currentDate.getDate()}`;
    }

    const input = document.getElementById("about");
    input.oninput = function () {
        if (input.value === "") {
            document.getElementById("remainingChars").innerHTML = "";
        } else {
            document.getElementById("remainingChars").innerHTML = "Characters remaining: " + (500 - input.value.length);
        }
    };

    function isChecked(checkbox) {
        const input = document.getElementById("dateOfBirth");
        console.log(checkbox.checked)
        if (checkbox.checked) {
            input.disabled = true;
        } else {
            input.disabled = false;
        }
    }
</script>
</body>
</html>