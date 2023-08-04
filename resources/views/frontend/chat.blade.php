<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/css/caht.css')}}">
    <title>{{translate('chat')}}</title>
</head>
<body>





<section class="msger" style="">
    <header class="msger-header">
        <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> {{translate('technical support')}}
        </div>
        <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
            <a href="{{route('index')}}" style="padding: 0 5px; color: red">{{translate('back')}}</a>
        </div>
    </header>

{{--@if($row->user->name == 'Super Admin')--}}
    <main class="msger-chat">

        @foreach($rows as $row)
        <div class="msg right-msg">
            <div
                class="msg-img"
                style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
            ></div>


            <div class="msg-bubble">
                <div class="msg-info"  id="{{$row->id}}">
                    <div class="msg-info-name">{{$row->user->name}}</div>
                    <div class="msg-info-time">{{$row->created_at}}</div>
                </div>

                <div class="msg-text">
                    {{$row->message}}
                </div>
            </div>
        </div>
        @endforeach
            @foreach($rows as $row)
                <div class="msg left-msg">
                    <div
                        class="msg-img"
                        style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
                    ></div>

                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name">technical support</div>
                            <div class="msg-info-time">{{$row->created_at}}</div>
                        </div>

                        <div class="msg-text">
                            Hi, welcome with gouda Go ahead and send me a message. 😄
                        </div>
                    </div>

                </div>
                {{--        @endif--}}
            @endforeach
    </main>

    <form action="{{route('create')}}" method="post" class="msger-inputarea" id="addMessage">
        @csrf
        <input type="text" class="msger-input" name="message" value="" placeholder="{{translate('Enter your message')}}">
        @error('$message') <p>{{$message}}</p> @enderror
        <button type="submit" class="msger-send-btn">Send</button>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    $.ajaxSetup({
        headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $("#addMessage").submit(function(e)
    {
        e.preventDefault();
        var formData  = new FormData(jQuery('#addMessage')[0]);
        // console.log(formData);
        $.ajax({
            url:"{{url('/create')}}",
            type:"POST",
            data:formData,
            contentType: false,
            processData: false,
            success:function(dataBack)
            {

                // console.log(dataBack)
                $(".msg-bubble").prepend(dataBack)
                // $("#error").html("<li class='alert alert-success text-center p-1'> Added Success </li>");
                // $(".cont-data").prepend(dataBack)
                // $('#exampleModal').modal('hide')

            }, error: function (xhr, status, error)
            {

                // console.log(xhr.responseJSON.errors);
                $.each(xhr.responseJSON.errors,function(key,item)
                {

                    $("#error").html("<li class='alert alert-danger text-center p-1'>"+ item +" </li>");
                })
            }
        })

    })


</script>

<script src="{{asset('frontend/js/chat.js')}}"></script>
</body>
</html>
