<!DOCTYPE html>
<html lang="en">

<head>
    <title>Task 6</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function rgb() {

            var r = document.getElementById("red").value;
                red.value = InputId.value;

            var g = document.getElementById("green").value;
                green.value = InputId1.value;

            var b = document.getElementById("blue").value;
                blue.value = InputId2.value;

            document.getElementById("id1").style.backgroundColor ="rgb(" + r + ","+ g + ","+ b + ")";
            //document.getElementById("id2").style.backgroundColor ="rgb(" + r + ","+ g + ","+ b + ")";
        }
        function rgb1() {

            var r = document.getElementById("red").value;
                InputId.value = red.value;

            var g = document.getElementById("green").value;
                InputId1.value = green.value;

            var b = document.getElementById("blue").value;
                InputId2.value = blue.value;

            document.getElementById("id1").style.backgroundColor ="rgb(" + r + ","+ g + ","+ b + ")";
            //document.getElementById("id2").style.backgroundColor ="rgb(" + r + ","+ g + ","+ b + ")";
        }
    </script>
    <style type="text/css">

        .main {
            height: 500px;
            width: 250px;
            background: grey;
            border-radius: 10px;
            display: grid;
            place-items: center;
            color: #fff;
        }
        #id1{
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 15px;
            color: white;
        }
        #InputId {
            -webkit-appearance: none;
            height: 15px;
            width: 200px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            border-radius: 5px;
            background-image: linear-gradient(to right, black, red );
        }
        #InputId1 {
            -webkit-appearance: none;
            height: 15px;
            width: 200px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            border-radius: 5px;
            background-image: linear-gradient(to right, black, green );
        }
        #InputId2 {
            -webkit-appearance: none;
            height: 15px;
            width: 200px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            border-radius: 5px;
            background-image: linear-gradient(to right, black, blue );
        }
        #InputId::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: red;
            border-radius: 50%;
        }
        #InputId1::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: green;
            border-radius: 50%;
        }
        #InputId2::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: blue;
            border-radius: 50%;
        }

    </style>
</head>

<body>

<div align="center">

    <h1>Task 6</h1>

    <div class="main" id="id2">

    <input type="text" id="id1" style="height: 100px;" value="Color Change.">

    <br>

    <label>R:</label>

    <input id="red" type=number size=3 value="0" min="0" max="255" style="width: 70px;" oninput="rgb1()"> 

    <input type="range" class="edit" id="InputId" value="0" min="0" max="255" oninput="rgb()">
    <br>

    <label>G:</label>

    <input id="green" type=number size=3 value="0" style="width: 70px;" oninput="rgb1()"> 
        
    <input type="range" class="edit" id="InputId1" value="0" min="0" max="255" oninput="rgb()">
    <br>

    <label>B:</label>
    <input id="blue" type=number size=3 value="0" style="width: 70px;" oninput="rgb1()">
    
    <input type="range" class="edit" id="InputId2" value="0" min="0" max="255" oninput="rgb()"><br>

    </div>

</div>
</body>
</html>