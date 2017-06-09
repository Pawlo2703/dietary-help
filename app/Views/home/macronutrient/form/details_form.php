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

<div class="reg">
    <h1>Put your current macros below</h1>
    <form method="post" action="http://localhost/Tren/public/Macronutrients/setMacros">
       <input autocomplete="off" name="protein" type="text" placeholder="Pros">
       <input autocomplete="off" name="fat" type="text" placeholder="Fats">
       <input autocomplete="off" name="carbs" type="text" placeholder="Carbs">
       <label><b>Weight:</b></label> <input autocomplete="off" name="weight" type="text" placeholder="Weight">
        <label><b>Height:</b></label> <input autocomplete="off" name="height" type="text" placeholder="Height">
       <p>Your goal:</p><select class="body_text" onchange="getText(this)" name="state">
                <option style="display:none">Choose one..</option>
                <option>Regular bulk</option>
                <option>Lean bulk</option>
                <option>Mini cut</option>
                <option>Long term cut</option>
  </select></br>
  <div id="textDiv"> </div>
     <button  type="submit" >Submit</button>
    </form>
</div>
    
    <!-- footer !-->
    <?php
    include __DIR__ . '/../../headfoot/footer.php'
    ?>

  
</body>
</html>


