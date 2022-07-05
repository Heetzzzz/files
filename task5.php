<!DOCTYPE html>
<html>
<head>
    <title>Task5</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">

    function my_fun() 
    {
        var Name = $('#slc :selected').text();

        if(Name == "Time Converter")
        {
            $('#time').show();
            $('#clc').hide();
        }
        else
        {
            $('#clc').show();
            $('#time').hide();
        }
    }

    function store2()
    {
        $(document).ready(function(){
            $("#sec").keyup(function(){
            
            });
            $("#min").keyup(function(){
            
            });
        });
    }

    function my_fun_time() 
    {
      var Names = $('#mins :selected').text();
      
        if(Names == "Minute")
        {
            $("#secs").val('Second').change(store2());
            $("#min").val(($('#sec').val() * 60));
        }
        else
        {
            $("#secs").val('Minute').change(store2());
            $("#min").val(($('#sec').val() / 60));
        }
    }

    function my_fun_time2() 
    {
        var Names = $('#secs :selected').text();
      
        if(Names == "Minute")
        {
            $("#mins").val('Second').change(store2());
            $("#sec").val(($('#min').val() * 60));
        }
        else
        {
            $("#mins").val('Minute').change(store2());
            $("#sec").val(($('#min').val() / 60));
        }
    }

    // function my_fun_time() 
    // {
    //     var Names  = $('#mins :selected').text();
    //     var Names1 = $('#secs :selected').text();

    //     if(Names == 'Minute')
    //     {
    //         $("#secs").val('Second').change(store2());
    //         $("#min").val(($('#sec').val() * 60));
    //     }
    //     else
    //     {
    //         $("#secs").val('Minute').change(store2());
    //         $("#min").val(($('#sec').val() / 60));
    //     }

    //     // if(Names1 == 'Minute')
    //     // {
    //     //     $("#mins").val('Second').change(store2());
    //     //     $("#sec").val(($('#min').val() * 60));
    //     // }
    //     // else
    //     // {
    //     //     $("#mins").val('Minute').change(store2());
    //     //     $("#sec").val(($('#min').val() / 60));
    //     // }
    // }

    function store1()
    {
        $(document).ready(function(){
            $("#cels").keyup(function(){
          
            });
            $("#fehr").keyup(function(){
          
            });
        });
    }
    function my_fun_far() 
    {
        var Name = $('#far :selected').text();

        if(Name == "Fehrenheit")
        {
            $("#far1").val('Celsius').change(store1());
            $("#fehr").val(($('#cels').val() - 32) * (5/9));
        }

        if(Name == "Celsius")
        {
            $("#far1").val('Fehrenheit').change(store1());
            $("#fehr").val(($('#cels').val() * 1.8) + 32);
        }
    }

    function my_fun_cel() 
    {
        var Name1 = $('.far1 :selected').text();

        if(Name1 == "Fehrenheit")
        {
            $("#far").val('Celsius').change(store1());
            $("#cels").val(($('#fehr').val() - 32) * (5/9));
        }
        if(Name1 == "Celsius")
        {
            $("#far").val('Fehrenheit').change(store1());
            $("#cels").val(($('#fehr').val() * 1.8) + 32);
        }
    }

 </script>

</head>
<body>

<div align="center">

    <h1>Task:5</h1>

    <select id="slc" onchange="my_fun()">
        <option value="time">Time Converter</option>
        <option value="ctof">Celsius to Fahrenheit converter</option>
    </select><br><br>

<div id="time">

    <input type="text" name="sec" id="sec" size="10" value="3600" oninput="my_fun_time()">
    = 
    <input type="text" name="min" id="min" size="10" value="60" oninput="my_fun_time2()">
    <br><br>

    <select style="margin-right: 90px;" id="mins" onchange="my_fun_time()">

        <option value="Second">Second</option>
        <option value="Minute">Minute</option>

    </select>
    <select id="secs" onchange="my_fun_time2()">

        <option value="Minute">Minute</option>
        <option value="Second">Second</option>

    </select>

</div>

<div id="clc" style="display: none">

    <input type="text" class="" name="cels" id="cels" placeholder="Celsius" size="10" oninput="my_fun_far()">
    = <input type="text" name="fehr" id="fehr" placeholder="Fehrenheit" size="10" oninput="my_fun_cel()">

    <br><br>

    <select style="margin-right: 50px;" id="far" onchange="my_fun_far()">

        <option value="Celsius">Celsius</option>
        <option value="Fehrenheit">Fehrenheit</option>

    </select>
    <select class="far1" onchange="my_fun_cel()">

        <option value="Fehrenheit">Fehrenheit</option>
        <option value="Celsius">Celsius</option>

    </select>

</div>

</div>

</body>
</html>