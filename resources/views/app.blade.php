<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Task - PHP Developer</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>

    <body>
        <div class="p-5">
            <h2 class="text-center">Main Categories</h2>

            @if(count($categories) > 0)
                <select class="categories">
                    <option value="na" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            @else
                <div class="pt-2 text-center">No categories found</div>
            @endif

            <div class="sub-cat"></div>
            <div class="pt-2 alert text-center"></div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
