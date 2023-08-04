{{--<div class="msg-bubble" id="{{$row->id}}"  style="margin-top: 10px">--}}
{{--    <div class="msg-info">--}}
{{--        <div class="msg-info-name">{{$row->user->name}}</div>--}}
{{--        <div class="msg-info-time">{{$row->created_at}}</div>--}}
{{--    </div>--}}

{{--    <div class="msg-text">--}}
{{--        {{$row->message}}--}}
{{--    </div>--}}
{{--</div>--}}


<div class="msg right-msg" id="{{$row->id}}">
    <div
        class="msg-img"
        style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
    ></div>


    <div class="msg-bubble"  style="margin-top: 10px">
        <div class="msg-info"  >
            <div class="msg-info-name">{{$row->user->name}}</div>
            <div class="msg-info-time">{{$row->created_at}}</div>
        </div>

        <div class="msg-text">
            {{$row->message}}
        </div>
    </div>
</div>
