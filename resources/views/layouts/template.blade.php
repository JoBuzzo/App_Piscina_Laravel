<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/JS/tinymce/tinymce.min.js"></script>
    
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            plugins: [
                'advlist', 'lists',
                'searchreplace', 
                'insertdatetime', 'table',
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image ' ,
            menu: {
                favs: {
                    title: 'Descrição',
                    items: 'code visualaid'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            content_css: 'css/content.css'
        });
    </script>

    <title>Painel de Administrador</title>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

</body>

</html>
