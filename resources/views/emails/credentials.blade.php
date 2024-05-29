<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Credentials</title>
</head>

<body style="background-color: #f0f4f8; font-family: sans-serif;">

    <div
        style="margin: 0 auto; border-radius: 0.375rem; background-color: #fff; padding: 2rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div style="margin: 0 auto; background-color: #edf2f7; padding: 1rem; border-radius: 0.375rem;">
            <div class="container">
                <h1 style="text-align:center; font-weight:700; font-size:2rem;">Savzaika</h1>
                <h1 style="font-size: 1.5rem; margin:1rem 0; font-weight: bold;">Your Account is created.</h1>
            </div>
            <h1 style="font-size: 1.2rem;  margin:1rem 0; font-weight: bold;">Your credential is</h1>
            <p>
                <span style="font-size: .9rem; margin:1rem .5rem; font-weight: bold;">Email:</span>{{ $user->email }}
                <span></span> <br>
                <span style=" margin:1rem .5rem;font-size: .9rem; font-weight: bold;">Password:</span>{{ $password }}
                <span></span>
            </p>
            <a href="{{ route('login') }}"
                style=" margin:1rem 0;display: inline-block; padding: 0.5rem 1rem; border-radius: 0.25rem; background-color: #000; color: #fff; text-decoration: none;">Login
                Here</a>
        </div>
</body>

</html>