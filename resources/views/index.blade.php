<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #header {
            background-image: url({{ asset('storage/images/background-library-1.jpg') }});
            filter: brightness(85%);
        }

        #name {
            opacity: 1;
            font-size: 5em;
            color: #623307;
            letter-spacing: 0.1em;
            text-shadow: -1px 0 white, 0 1.5px white, 1.5px 0 white, 0 -1.5px white;
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap");

        :root {
            --accent-color: #a876aa;
            --main-transition: all 0.3s ease-in-out;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Montserrat", sans-serif;
            color: #222;
            padding-bottom: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav {
            position: fixed;
            background-color: transparent;
            top: 0;
            left: 0;
            right: 0;
            transition: var(--main-transition);
            text-transform: uppercase;
        }

        .nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 0;
            transition: var(--main-transition);
        }

        .nav ul {
            display: flex;
            list-style-type: none;
            align-items: center;
            justify-content: center;
        }

        .nav a {
            position: relative;
            color: #fff;
            text-decoration: none;
            padding: 7px 15px;
            font-weight: 300;
            transition: var(--main-transition);
        }

        .nav * {
            font-size: 16px;
            letter-spacing: 0.1rem;
        }

        .nav a.current,
        .nav a:hover {
            color: var(--accent-color);
        }

        .nav a.current {
            font-weight: 600;
        }

        .nav a.current::before {
            content: "";
            width: 50%;
            height: 2px;
            background-color: var(--accent-color);
            position: absolute;
            bottom: -3px;
            left: 50%;
            transform: translateX(-50%);
            transition: var(--main-transition);
        }

        .nav.active {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .nav.active a {
            color: #000;
        }

        .nav.active a.current::before {
            opacity: 0;
        }

        .nav.active .container {
            padding: 20px 0;
        }

        i {
            margin: 0 10px;
        }

        .hero {
            background-image: url("https://unsplash.com/es/fotos/libros-sobre-la-mesa-fz4Du9f9OBU");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            height: 100vh;
            color: #fff;
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            margin-bottom: 20px;
            z-index: -2;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: hue-rotate(290deg) saturate(50%) contrast(90%);
            z-index: -1;
        }

        .hero h1 {
            font-size: 46px;
            margin: -20px 0 20px;
            font-weight: 800;
            letter-spacing: 0.1rem;
        }

        .hero p {
            font-size: 16px;
            letter-spacing: 0.2rem;
            font-weight: 200;
        }

        .content h2 {
            font-size: 150%;
            margin: 20px 0;
            text-transform: uppercase;
        }

        .content p {
            color: #555;
            
            margin-bottom: 10px;
        }

        @media (max-width: 700px) {
            .hero h1 {
                font-size: 30px;
            }

            .nav .container {
                display: flex;
                flex-direction: column;
            }

            .nav .logo {
                display: none;
            }
        }
    </style>


</head>

<body class="bg-[#faebd7]">
    @livewire('contentcomponent')
</body>

</html>
