<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_mail.css">
    <link rel="text/css" href="/css/bootstrap.min.cs">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body class="bg-dark">

<div class="row">

    <div class="row">

      <div class="col-4">
      </div>

      <div class="col-4">
          <div class="boxy">
            <h4 class="text-white text-center"> Veuillez entrer votre mail </h4>

            <div class="form-outline boxy-input">
              <form class="form-inline" method="post" action="mailpassword.php">
                <div class="form-group mx-sm-3 mb-2">
                  <input class="form-control" type="email" name="email" placeholder="Votre email" required>
                  <br>
                  <input type="submit" class="btn btn-warning mb-1">
                </div>
              </form>
            </div>

          </div>
      </div>

      <div class="col-4">
      </div>

    </div>


</div>


</body>
</html>
