@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>
           Welcome to the guest book
        </h1>
        <p>
            This was a learning challenge sent to Phillip, who has never coded a website.... EVER!<br/>
        </p>

        <div>
            <p>To learn PHP, Laravel, mySql, html (at least enough to get this working) and everything else,</br> So, I signed up for the following crash courses:</>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="https://www.udemy.com/learning-path-laravel-complete-guide-to-laravel/">udemy: LEARNING PATH: Laravel: Complete Guide to Laravel</a>
                </li>

                <li class="list-group-item">
                    <a href="https://www.udemy.com/php-with-laravel-for-beginners-become-a-master-in-laravel/">udemy: PHP with Laravel for beginners - Become a Master in Laravel</a>
                </li>

                <li class="list-group-item">
                    <a href="https://www.youtube.com/watch?v=EU7PRmCpx-0&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-">YouTube : Laravel From Scratch</a>
                </li >
                <li class="list-group-item">
                    <a href="https://www.google.com/">Google for everything else</a>
                </li>

            </ul>

        </div>
        <hr/>
        <small class="align-bottom">p.s. He still has no clue what he is doing.</small>
    </div>
@endsection