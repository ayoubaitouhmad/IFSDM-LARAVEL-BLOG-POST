<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? config('app.name').'-'.config('app.tag_line')  }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include("includes.style")
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">
@yield('body')
@include("includes.script")
</body>
</html>
