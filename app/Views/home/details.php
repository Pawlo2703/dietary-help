<script language="JavaScript">
 
var DivTxt = new Array()
DivTxt[0] = ""
DivTxt[1] = "Gaining weight faster, which maximalizes muscle gain"
DivTxt[2] = "Gaining weight slowly, with fat gain minimalized"
DivTxt[3] = "Shorten fat loss phase with a greater deficit that lasts from 4 to 8 weeks"
DivTxt[4] = "Long term fat loss phase that lasts from 8 to 16 weeks"
 
function getText(slction){
txtSelected = slction.selectedIndex;
document.getElementById('textDiv').innerHTML = DivTxt[txtSelected];
}
</script>
 

<!-- header !-->
<?php
include('headfoot/header.php')
?>

<body>
    <!-- menu & img !-->
    <?php
    include('headfoot/menu.php')
    ?>

    <div class="reg">

        <form method="post" action="http://localhost/Tren/public/Macros/saveDetails">
            <p>Current Weight:</p><input autocomplete="off" name="weight" type="text" placeholder="weight">
            <p>Current Height:</p><input autocomplete="off" name="height" type="text" placeholder="height">
            <p>Your goal:</p><select class="body_text" onchange="getText(this)" name="state">
                <option>Choose one..</option>
                <option>Regular bulk</option>
                <option>Lean bulk</option>
                <option>Mini cut</option>
                <option>Long term cut</option>
            </select>
            <div id="textDiv"> </div>
            <button  type="submit" >Submit</button>
        </form>
    </div>

    <!-- footer !-->
    <?php
    include('headfoot/footer.php')
    ?>


</body>
</html>


