<!DOCTYPE html>
<html>
<head>
    <title>Task4.1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">

        // function my_fun_far() 
        // {
        //     var Name = $('#far :selected').text();

        //     if(Name == "Fehrenheit")
        //     {
        //         $("#far1").val('Celsius').change(store1());
        //         $("#fehr").val(($('#cels').val() - 32) * (5/9));
        //     }

        //     if(Name == "Celsius")
        //     {
        //         $("#far1").val('Fehrenheit').change(store1());
        //         $("#fehr").val(($('#cels').val() * 1.8) + 32);
        //     }
        // }

        // function my_fun_cel() 
        // {
        //     var Name1 = $('#far1 :selected').text();

        //     if(Name1 == "Fehrenheit")
        //     {
        //         $("#far").val('Celsius').change(store1());
        //         $("#cels").val(($('#fehr').val() - 32) * (5/9));
        //     }
        //     if(Name1 == "Celsius")
        //     {
        //         $("#far").val('Fehrenheit').change(store1());
        //         $("#cels").val(($('#fehr').val() * 1.8) + 32);
        //     }
        // }
        
        function my_fun_far()
        {
            var Name = $('#far :selected').text();
            var Name1 = $('#far1 :selected').text();

            $(document).ready(function(){
                $("#cels").keyup(function(){

                    if(Name == "Fehrenheit")
                    {
                        $("#far1").val('Celsius').change();
                        $("#fehr").val(($('#cels').val() - 32) * (5/9));
                    }
                    else
                    {
                        $("#far1").val('Fehrenheit').change();
                        $("#fehr").val(($('#cels').val() * 1.8) + 32);
                    }
                });
                $("#fehr").keyup(function(){

                    if(Name1 == "Fehrenheit")
                    {
                        $("#far").val('Celsius').change();
                        $("#cels").val(($('#fehr').val() - 32) * (5/9));
                    }
                    else
                    {
                        $("#far").val('Fehrenheit').change();
                        $("#cels").val(($('#fehr').val() * 1.8) + 32);
                    }
                });
            });
        }
            // function my_fun_far1() 
            // {
            //     var Name = $('#far :selected').text();

            //     if(Name == "Fehrenheit")
            //     {
            //         $("#far1").val('Celsius').change();
            //         $("#fehr").val(($('#cels').val() - 32) * (5/9));
            //     }

            //     if(Name == "Celsius")
            //     {
            //         $("#far1").val('Fehrenheit').change();
            //         $("#fehr").val(($('#cels').val() * 1.8) + 32);
            //     }
            // }
            // function my_fun_far2() 
            // {
            //     var Name1 = $('#far1 :selected').text();

            //     if(Name1 == "Fehrenheit")
            //     {
            //         $("#far").val('Celsius').change();
            //         $("#cels").val(($('#fehr').val() - 32) * (5/9));
            //     }
            //     if(Name1 == "Celsius")
            //     {
            //         $("#far").val('Fehrenheit').change();
            //         $("#cels").val(($('#fehr').val() * 1.8) + 32);
            //     }
            // } 
        
    </script>

</head>
<body>

<div align="center">

    <h1>Task:4.1</h1>

    <input type="text" class="" name="cels" id="cels" size="10" oninput="my_fun_far()">
     = <input type="text" name="fehr" id="fehr" size="10" oninput="my_fun_far()">

     <br><br>

    <select style="margin-right: 50px;" id="far" onchange="my_fun_far()">

        <option value="Celsius" >Celsius</option>
        <option value="Fehrenheit" >Fehrenheit</option>

    </select>

    <select id="far1" onchange="my_fun_far()">

        <option value="Fehrenheit">Fehrenheit</option>
        <option value="Celsius">Celsius</option>
        
    </select>

</div>

</body>
</html>