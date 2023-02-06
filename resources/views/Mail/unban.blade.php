<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .mail-box{
        margin-left: 20px;
        margin-top: 20px;
        padding: 20px;
        border-radius: 10px;
    }
    
    h2{
    }
    h3{
        margin-left: 20px;
        font-style: italic;
    }
    p{
        margin-left: 130px;
    }
</style>
<body>
    <div class="mail-box">
    <h2>Hello,{{ $data['name'] }}</h2>
    <h3>Your email has been unbanned . </h3>
    <p>Thank you,</p>

    </div>
</body>
</html>

