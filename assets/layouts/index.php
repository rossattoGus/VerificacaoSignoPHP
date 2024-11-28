<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="..\css\style.css" rel="stylesheet">
    
<title>Saiba seu signo!</title>
</head>
<body>
    <?php include('header.php')?>

    <div>
        <h1 style="text-align: center">Descubra seu Signo</h1>
        <form id="signo-form" method="POST" action="show_zodiac_sing.php">
            <p style="text-align: center">
                <label for="data_nascimento">Data de nascimento:
                    <br>
                    <input type="text" name="data_nascimento" placeholder="Ex. dd/mm/yyyy">
                    <br>
                    <input type="submit" value="Descobrir">
                </label>
            </p>
        </form>
    </div>
</body>
</html>