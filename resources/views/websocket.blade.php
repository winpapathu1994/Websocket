@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{mix('css/helper.css')}}">
    <link rel="stylesheet" href="{{mix('css/ws.css')}}">
@endpush
@section('content')

<main class="d-flex align-center h-100vh">

    <section id="section-chat" class="d-flex flex-col justify-between align-center card mx-auto h-80 hide">
       
        <nav id="nav-online" class="w-100 d-flex">

             <input id="input-email" type="hidden" placeholder="Email" value={{$authUser}}>
            <h3 class="white pl-1">Chat </h3>

            <div id="avatars">   </div>
        </nav>


        <ul id="list-messages" class="px-1 d-flex flex-col">
        @foreach ($messages as $message)
        <li class="d-flex flex-col">
            <span class="message-author">{{$message->name}}</span>
            <span style="color: black;">{{$message->body}}</span>
        </li>
        @endforeach
        
        </ul>

        <form id="form" class="w-100 d-flex flex-col">

            <span id="span-typing"></span>
            <input
                    id="input-message"
                    class="py-2 pl-1"
                    placeholder="Type a message"
                   type="text">
        </form>

    </section>

</main>


@endsection
