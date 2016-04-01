@extends('layout.header')
@section('content')
    <style>

    </style>

    <script>

        $(function(){
            //console.log($('#container ul li').text());

            $('#container ul li').css('background-color','red');
        })
    </script>

    <div id="container">
        <ul>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
        </ul>
    </div>
@stop