<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>

        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
        <meta name="application-name" content="JMagic">
        <meta name="author" content="JRCSalter">
        <meta name="description" content="">
        <meta name="keywords" content="">
        
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body lang="en">
        <div id="skip-to-main">
            <a href="#main">Skip to Main</a>
        </div>

        <x-header />

        <x-nav />

        <main id="main" role="main">

            {{ $slot }}

        </main>

        <x-footer />

    </body>
</html>
