@extends('layouts.admin')

@section('title' , 'chat with '.$receiver->name)
@section('content')

{{-- <h3 class=" text-center">Messaging</h3> --}}
<div class="inbox_msg">
    <div class="mesgs">
        <div class="msg_history">
            @foreach ($messages as $item)
            @if ($item->sender == Auth::id())
            <div class="outgoing_msg">
                <div class="sent_msg">
                    <p>{{$item->message}}</p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>
            @else
            <div class="incoming_msg">
                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                </div>
                <div class="received_msg">
                    <div class="received_withd_msg">
                        {{-- messages --}}
                        <p>{{$item->message}}</p>
                        <span class="time_date"> 11:01 AM | June 9</span>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
        <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 3"
                style="width: 40px; height: 100%;">
            <input type="text" class="form-control form-control-lg" name="message" id="message"
                placeholder="Type message">
            {{-- <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a> --}}
            <button id="sent" type="button"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>


    {{-- <p class="text-center top_spac"> Design by <a target="_blank"
                    href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p> --}}


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    const Id = {{Auth::id()}};
</script>
@vite(['resources/js/app.js'])
<script>
    $(document).ready(function () {
var msgHistory = $('.msg_history');
msgHistory.scrollTop(msgHistory[0].scrollHeight);
});
    $('#sent').on('click', function () {
        $.post("http://127.0.0.1:8000/admin/chat/"+{{$receiver->id}}, {
        message: $('#message').val(),
        },
        function (data, textStatus) {
            console.log(textStatus);
        let senderMessage = `
        <div class="outgoing_msg">
            <div class="sent_msg">
                <p>`+ $('#message').val()+`</p>
                <span class="time_date"> 11:01 AM | Today</span>
            </div>
        </div>
        `;
        $('.msg_history').append(senderMessage);
        $('#message').val('');
        var msgHistory = $('.msg_history');
        msgHistory.scrollTop(msgHistory[0].scrollHeight);
        
        }).fail(function (error) {
        console.log(error);
        });
    });
  
</script>

@endsection