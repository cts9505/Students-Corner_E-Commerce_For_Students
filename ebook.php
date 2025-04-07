<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-Book</title>
   <link rel="shortcut icon" tpye="x-icon" href="./images/scicon.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<style>
    /* *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #EEEEEE;
} */

.container{
    text-align: center;
}

.container h2{
    font-size: 2vw;
    font-family: 'Courier New', Courier, monospace;
    margin-bottom: 40px;
    letter-spacing: 1.2px;
}

form{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 15px;
}

form select{
    width: 450px;
    padding: 15px;
    padding-left: 10px;
    background-color: #fff;
    border-radius: 10px;
    border: none;
    outline: none;
    font-size: 1.2rem;
    box-shadow: 0 5px 10px 0 rgb(0,0,0,0.25);
    cursor: pointer;
}
option{
  border-radius:10%
}
</style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="container"><br>
<div style="margin-bottom:15px">
   <span style="font-size:medium;margin:10rem;color:black" >
<i class="fa-solid fa-circle-info"></i><a href="home.php">&nbsp;Home&nbsp;</a><i class="fa-solid fa-chevron-right"></i>&nbsp;E-book
   </span></div>
        <h2>Find Ebook / PYQ's / Notes .</h2>

        <form action="#">
            <select name="" id="country" required>
                <option value="" required>Select Year</option>
            </select>
            <select name="" id="state" required>
                <option value="" required>Select Branch </option>
            </select>
            <select name="" id="city" required>
                <option value="" required>Select Subject</option>
            </select>
            <select name="" id="zip" required>
                <option value="" required>What you want ?</option>
            </select><br>
            <input type="submit" onclick="sub()" value="SUBMIT" class="option-btn"><br>
        </form>

    </div>

<?php include 'components/footer.php'; ?>

<script src="js/script.js">
    
</script>
<script>
    
var countrySateCityinfo = {
    FE: {
        "Common (2019 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        },
        "Common (2015 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        }
    },
    SE: {
        "Common (2019 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        },
        "Common (2015 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        }
    },

    TE: {
        "Common (2019 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        },
        "Common (2015 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        }
    },
    BE: {
        "Common (2019 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        },
        "Common (2015 Pattern)": {
            "M-1": ["Notes","Question Paper","Techknowledge"],
            "BXE": ["Notes","Question Paper","Techknowledge"],
            "BEE": ["Notes","Question Paper","Techknowledge"],
            "PHY": ["Notes","Question Paper","Techknowledge"],
            "CHEM": ["Notes","Question Paper","Techknowledge"],
            "MECH":["Notes","Question Paper","Techknowledge"],
            "PPS": ["Notes","Question Paper","Techknowledge"],
            "SME": ["Notes","Question Paper","Techknowledge"],
            "EG": ["Notes","Question Paper","Techknowledge"],
            "M-2": ["Notes","Question Paper","Techknowledge"],
        }
    }
}
function sub()
{
    alert('We Are Currently Working On It !!! We will Notify you when available.')
}
// window.onload = function(){
    const selectCountry = document.getElementById('country'),
        selectState = document.getElementById('state'),
        selectCity = document.getElementById('city'),
        selectZip = document.getElementById('zip'),
        selects = document.querySelectorAll('select')

        selectState.disabled = true
        selectCity.disabled = true
        selectZip.disabled = true

        selects.forEach(select => {
            if(select.disabled == true){
                select.style.cursor = "auto"
            }
            else{
                select.style.cursor = "pointer"
            }
        })

        for(let country in countrySateCityinfo){
            // console.log(country);
            selectCountry.options[selectCountry.options.length] = new Option(country, country)
        }


        // country change
        selectCountry.onchange = (e) =>{
            
            selectState.disabled = false
            selectCity.disabled = true
            selectZip.disabled = true

            selects.forEach(select => {
                if(select.disabled == true){
                    select.style.cursor = "auto"
                }
                else{
                    select.style.cursor = "pointer"
                }
            })

            selectState.length = 1
            selectCity.length = 1
            selectZip.length = 1

            for(let state in countrySateCityinfo[e.target.value]){
                // console.log(state);
                selectState.options[selectState.options.length] = new Option(state, state)
            }
        }

        // state change
        selectState.onchange = (e) =>{
            selectCity.disabled = false
            selectZip.disabled = true

            selects.forEach(select => {
                if(select.disabled == true){
                    select.style.cursor = "auto"
                }
                else{
                    select.style.cursor = "pointer"
                }
            })

            selectCity.length = 1
            selectZip.length = 1

            for(let city in countrySateCityinfo[selectCountry.value][e.target.value]){
                // console.log(city);
                selectCity.options[selectCity.options.length] = new Option(city, city)
            }
        }

        // change city
        selectCity.onchange = (e) =>{
            selectZip.disabled = false

            selects.forEach(select => {
                if(select.disabled == true){
                    select.style.cursor = "auto"
                }
                else{
                    select.style.cursor = "pointer"
                }
            })
            
            selectZip.length = 1

            let zips = countrySateCityinfo[selectCountry.value][selectState.value][e.target.value]
            
            for(let i=0; i<zips.length; i++){
                selectZip.options[selectZip.options.length] = new Option(zips[i], zips[i])
            }
        }
        
// }
</script>
</body>
</html>