<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientų valdymas</title>
    <style>
        html,
        body {
            height: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header {
            text-align: center;
        }
        .funkcijos{
            margin: 5px;
            width: 250px;
        }
    </style>
</head>
<body>
    <a href="index.php" class="btn btn-warning">Grįžti</a>

    <h3 class="header">Klientų valdymo meniu</h3>
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="#" class="btn btn-warning funkcijos">Pridėti postą</a></li>
            <li><a href="#" class="btn btn-warning funkcijos">Ištrinti postą</a></li>
			<li><a href="#" class="btn btn-warning funkcijos">Redaguoti postą</a></li>
            <li><a href="#" class="btn btn-warning funkcijos">Komentuoti</a></li>
			<li><a href="#" class="btn btn-warning funkcijos">Patvirtinti</a></li>
            <li><a href="#" class="btn btn-warning funkcijos">Kliento ataskaitos kūrimas</a></li>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>