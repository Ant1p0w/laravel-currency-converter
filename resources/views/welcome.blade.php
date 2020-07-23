<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Currency Converter</title>
</head>
<body>
<div id="app">
    <currency-converter-component></currency-converter-component>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
