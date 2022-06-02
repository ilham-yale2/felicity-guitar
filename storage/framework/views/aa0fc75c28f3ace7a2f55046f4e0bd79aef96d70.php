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
    <h1>Hello , <?php echo e($name); ?></h1>
    <p>Thanks for your participation , click button below to finish your registration</p>
    <a href="<?php echo e($url); ?>" class="btn btn-primary">Verification</a>
</body>
</html><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/email/verification.blade.php ENDPATH**/ ?>