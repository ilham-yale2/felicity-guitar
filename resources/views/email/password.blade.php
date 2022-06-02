<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
    <style>
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .btn-primary {
            color: #fff!important;
            text-decoration: none!important;
            background-color: #007bff;
            border-color: #007bff;

        }

    </style>
</head>
<body>
    <h1>Hello , {{$name}}</h1>
    <p>You receive this email because our system got a password reset request, Click
        button below if you want to continue. <br> ignore it if you didn't submit the request or want to cancel</p>
    <a href="{{$url}}" class="btn btn-primary">Verification</a>
</body>
</html>