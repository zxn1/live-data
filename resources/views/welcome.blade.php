<!DOCTYPE html>
<html>
<head>
    <title>Livewire</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div class="container">
        <!-- part ni panggil livewire view component -->
        @livewire('posts')
    </div>
    @livewireScripts
</body>
</html>