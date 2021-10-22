<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código qr</title>
</head>
<body>
    <div class="px-3">
        <h2 class="text-2xl text-center">Tu codigo Qr</h2>
        <div class="flex justify-center my-3 py-3">
            {{QrCode::size(350)->encoding('UTF-8')->generate(url('/'.$restaurant->name))}};
        </div>
    </div>    
</body>
</html>