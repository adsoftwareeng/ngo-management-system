<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
     body, html {
                margin: 0;
                padding: 0;
            }
            body {
                color: black;
                display: table;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
            }
            .box {
                width: 750px;
                height: 563px;
                /*display: table-cell;*/
                vertical-align: middle;
                border: 20px solid #d2b48c;
            }
            .logo {
                color: tan;
            }
            .marquee {
                color: tan;
                font-size: 48px;
                margin: 20px;
            /*}*/
            .assignment {
                margin: 20px;
            }
            .person {
                border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 400px;
            }
            .reason {
                margin: 20px;
            }
            .logo_image{
                width:80px;
                height:80px;
            }
    </style>
</head>
<body>
    <div class="box">
       <div class="logo">
            <img src="{{ asset('public/uploads/general/'.generalSetting()->logo) }}" class="logo_image">
        </div>
        <div class="marquee">
            Certificate of Completion
        </div>
        <div class="assignment">
            This certificate is presented to
        </div>
        <div class="person">
            {{ $users->name }}
        </div>
        <div class="reason">
            {{ $users->program }}
        </div>
    </div>
</body>
</html>
