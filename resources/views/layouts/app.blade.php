<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name")}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/main.css">
    <style>
        th,td {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="/" class="navbar-brand">{{ config("app.name")}}</a>
        </div>
    </header>
    <div class="container py-4">
        @yield("content")
    </div>
    
</body>
</html>