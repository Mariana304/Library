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
            background-image: url({{ asset('storage/images/background-library.jpg') }});
            filter: brightness(90%);
        }
    </style>
   

</head>
<body class="bg-[#faebd7]">
    @livewire('contentcomponent')
</body>
</html>