@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <main class="py-4">
                    <ul>
                        @if(isset($message) && $message->count()>0)
                            @foreach($message as $message_value)
                                <li>
                                    {{ $message_value->message_text }}
                                    <span>{{ $message_value->user->name }}</span>
                                </li>
                            @endforeach
                        @endif
                        <li>
                    </ul>
                    <form class="chat-form" action="{{ route('send-message') }}" method="post">
                        @csrf()
                        <input type="text" class="form-control" name="message"/>
                        <input type="submit" class="btn btn-success" />
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection

