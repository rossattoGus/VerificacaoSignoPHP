<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>Saiba seu signo!</title>
</head>
<body>
    <?php include('header.php')?>
    
    <div>
        <h1 style="text-align: center; line-height: 2.5">Descubra seu Signo</h1>
        <form id="signo-form" method="POST" action="show_zodiac_sing.php">
            <p style="text-align: center">
                Data de nascimento: 
                <input type="date" class="form-control" placeholder="27/06/2000" name="data_nascimento">
                <input type="submit">
            </p>
            
        </form>
    </div>
</body>
</html>