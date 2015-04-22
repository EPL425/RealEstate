<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real Estate Cyprus</title>

    <link rel="stylesheet" type="text/css" href="css/myCSS.css">
    <link href="css/bootstrap-slider.css" rel="stylesheet">

    <!-- Bootstrap -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style>
        .form-inline .control-label {
            margin-bottom: 0;
            vertical-align: middle;
            margin-top: 9px;
        }
        html, body, .container {
            height: 100%;
        }
        #myDiv{
            text-align: center;
            background:rgba(255,255,255,0.6);
            height: 20%;
            padding-top: 4%;
            margin-top: 20%;
        }

    </style>
</head>

<body style=" background-color: inherit;">

    <div id = "myDiv">
            <form class="form-inline">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="city">City:</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="city" id="city">
                            <option value="0">Select City...</option>
                            <option value="1">Nicosia</option>
                            <option value="2">Limassol</option>
                            <option value="3">Larnaca</option>
                            <option value="4">Paphos</option>
                            <option value="5">Famagusta</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-6" for="forSale">Rent or Sale:</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="forSale" id="forSale">
                            <option value="0">Any</option>
                            <option value="1">For Rent</option>
                            <option value="2">For Sale</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="type">Type:</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="type" id="type">
                            <option value="0">Any</option>
                            <option value="1">House</option>
                            <option value="2">Apartment</option>
                            <option value="3">Studio</option>
                            <option value="4">Plot</option>
                            <option value="5">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
<!--                    <label class="control-label col-sm-4" for="beds">Bedrooms</label>-->
<!--                    <div class="col-sm-4">-->
<!--                        <select class="form-control" name="beds" id="beds">-->
<!--                            <option value="0">Any</option>-->
<!--                            <option value="1">1</option>-->
<!--                            <option value="2">2</option>-->
<!--                            <option value="3">3</option>-->
<!--                            <option value="4">4</option>-->
<!--                            <option value="5">5+</option>-->
<!--                        </select>-->
<!--                    </div>-->
                    Bedrooms: <b>1.</b> <input id="Bedrooms" type="text" class="span2" value="" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="[0,10]"/> <b>.10</b>

                </div>

                <div class="form-group">
                    Plot: <b>0m².</b> <input id="Plot" type="text" class="span2" value="" data-slider-min="0" data-slider-max="1000" data-slider-step="10" data-slider-value="[0,1000]"/> <b>.1000m²</b>
                </div>

                <div class="form-group">
<!--                    Price: <b>€0</b> <input id="Price" type="text" class="span2" value="" data-slider-min="0" data-slider-max="1000000" data-slider-step="100" data-slider-value="[0,1000000]"/> <b>€1000000+</b>-->
                    <label class="control-label col-sm-3" for="min_price">Price:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" style="width: 120px" name="min_price" id="min_price" placeholder="€ Min. Price"/>
                    </div>
                    </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="number" class="form-control" style="width: 120px"  name="max_price" id="max_price" placeholder="€ Max. Price"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>


            </form>


<!--        price   -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-slider.js"></script>

    <script>
        $("#Bedrooms").slider({});
          $("#Plot").slider({});
    </script>
</body>
</html>