<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/src/img/DEV Panther Short Logo.png">
    <title>Dev Panther</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/src/css/cdn/bootstrap/4.0.0/bootstrap.min.css">
    <link rel="stylesheet" href="/src/css/cdn/bootstrap/3.4.1/bootstrap.min.css">
    <link rel="stylesheet" href="/src/css/cdn/fontawesome/all.css">
    <link rel="stylesheet" href="/src/css/cdn/fontawesome/font-awesome.min.css">
    <link rel="stylesheet" href="/src/css/cdn/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/src/css/cdn/googleapis/googleicon.css">
    <link rel="stylesheet" href="/src/css/cdn/cloudflare/normalize.min.css">
    <link rel="stylesheet" href="/src/css/select2/select2.min.css" />
    <link rel="stylesheet" href="/src/css/cropper/cropper.min.css" />
    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="stylesheet" href="/src/css/profile.css">
    <link rel="stylesheet" href="/src/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <!-- jQuery library file -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Datatable plugin JS library file -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr"></script>

</head>
</head>
<body>
    @yield('content')



    
    <script src="/src/js/cropper/cropper.min.js"></script>
    <script src="/src/js/profile.js"></script>
    <script src="/src/js/pin.js"></script>
    <script type="text/javascript" src="/src/js/jquery.js"></script>
    <script src="/src/js/shared.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="/src/js/select2/select2.min.js"></script>
    <script src="./src/js/side.js"></script>
    <script src="./src/js/pagefunctions/@yield('pagefunction')"></script>
    {{-- <script src="./src/js/human.js"></script> --}}
    @yield('modal')
    @yield('indscripts')
    
</body>
</html>