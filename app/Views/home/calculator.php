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
    <h1>Calculate your macro intake</h1>
    <form method="post" action="http://localhost/Tren/public/calc/setMacros">
        <label><b>Age:</b></label> <input autocomplete="off" name="age" type="text" placeholder="Age">
        <label><b>Weight:</b></label> <input autocomplete="off" name="weight" type="text" placeholder="Weight">
        <label><b>Height:</b></label> <input autocomplete="off" name="height" type="text" placeholder="Height">
        <label><b>Gender:</b></label><select name="gender">
  <option >Male</option>
  <option >Female</option></select>
        
        <label><b>Workout intensity:</b></label><select name="workout">
  <option >Low</option>
  <option >Moderate</option>
  <option >Intense</option></select>
<label><b>Time:</b></label><input autocomplete="off" name="workouttime" type="text" placeholder="Time">
<label><b>Times a week:</b></label><input autocomplete="off" name="workouttimesperweek" type="text" placeholder="Times per week">

  <label><b>Cardio intensity:</b></label><select name="cardio">
  <option >Low</option>
  <option >Moderate</option>
  <option >Intense</option></select>
  <label><b>Time:</b></label><input autocomplete="off" name="cardiotime" type="text" placeholder="Time">
<label><b>Times a week:</b></label><input autocomplete="off" name="cardiotimesperweek" type="text" placeholder="Times per week0">
 
    <label><b>Daily activity outside the gym:</b></label><select name="activity">
  <option >Setendary</option>
  <option >Moderate</option>
  <option >Intense</option></select>
  <p>Your goal:</p><select class="body_text" onchange="getText(this)" name="state">
                <option>Choose one..</option>
                <option>Regular bulk</option>
                <option>Lean bulk</option>
                <option>Mini cut</option>
                <option>Long term cut</option>
  </select></br>
  <div id="textDiv"> </div>

        <button type="submit" >Submit</button>
    </form>
</div>
    
    <!-- footer !-->
    <?php
    include('headfoot/footer.php')
    ?>

  
</body>
</html>


