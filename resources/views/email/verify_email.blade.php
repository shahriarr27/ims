<DOCTYPE html>
<html>
    <head>
        <title>Verify Mail</title>
    </head>
    <body>
        <h1>Verify Mail</h1>
        <h3>Hello Mr, {{$user['name']}}</h3>
        <a href="{{ route('users.verify_mail',$user['id'])}}" target="_blank">Click now are your verify</a>
        <p>Thank you</p>
    </body>
</html>