<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='style.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.3.1.js"></script>
    <title>Weather App</title>
</head>
<body>
    <div class="jumbotron heroImage text-center">
        <div class="container">
            <h1 id = "title" class="display-4 text-light mt-3">Your Weather App</h1>
            <div class='result-container'>
                <h1 id = 'temp-container'><span id='temp'></span>°C<h1>
                <div id = "found" class="alert col-md-12 mx-auto"></div>
            </div>
            <p id = "ques" class="lead text-light">Enter Your City</p>
            <form method="get">
            <div class="form-group col-md-7 mx-auto">
                <input id = 'city' type="text" name="city" class="form-control" placeholder="eg. New York">
            </form>

            <button id = 'btn' type="submit" name="submit" class="btn btn-warning btn-log"> OK </button>

            <div class="col-md-12 mx-auto">
                <div id = "not-found" class="alert alert-danger">Please Try Again, We Can't Find Your City!</div>
                <div id = "no-input" class="alert alert-danger">Please Enter a City!</div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $("#btn").click(function(e){
        $('#found').fadeOut();
        $("temp-container").fadeOut();
        e.preventDefault();
        if($("#city").val() == ""){
            $("#no-input").fadeIn();
        }
        else{
            $.get("scraper.php?city=" + $("#city").val(), function(text){
                if(text == ""){
                    $("#not-found").fadeIn();
                }
                else{
                    temp = text.substring(text.lastIndexOf(".") + 1, text.length+1);
                    $("#title").html($("#city").val());
                    $("#temp").html(temp);
                    $("#temp-container").fadeIn();
                    $("#found").html(text.substring(0, text.lastIndexOf(".") + 1)).fadeIn();
                }
            });
        }
    });
</script>
</html>