@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.conversations.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    @if(auth()->user()->isSuperAdmin())
                    <tr>
                        <th>
                            {{ trans('cruds.conversations.fields.user_name') }}
                        </th>
                        <td>
                            {{ $conversation->user->name }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th>
                            {{ trans('cruds.conversations.fields.title') }}
                        </th>
                        <td>
                            {{ $conversation->title ?? '' }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>

            <div class="row">
                <div class="message-wrap col-lg-12">
                    @foreach($messages as $value)

                    <div class="msg-wrap">


                        <div class="media msg">
                            <h5 class="{{$value->user->id == 1 ? 'media-heading' : 'media-heading-user'}}">{{$value->user->name}}</h5>

                            <div class="media-body">
                                <small class="float-right time"><i class="fa fa-clock-o"></i> {{$value->created_at->diffForHumans()}}</small>

                                <p class="col-lg-10">{{$value->message}}</p>
                            </div>
                        </div>

                    </div>

                    @endforeach
                    <form action="{{route('admin.conversation-messages.store',$conversation->id)}}" method="POST">
                        @csrf

                        <div class="send-wrap ">
                            <textarea name="message" class="form-control send-message" rows="3" placeholder="... أكتب رسالتك"></textarea>


                        </div>
                        <br>
                        <div class="btn-panel text-center">
                            <button type = "submit" href="" class=" col-lg-2 text-center btn btn-success" role="button"><i class="fa fa-plus"></i>إرسال</button>
                        </div>
                    </form>

                </div>
            </div>


            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection

@section('styles')

<style>
        .conversation-wrap
    {
        box-shadow: -2px 0 3px #ddd;
        padding:0;
        max-height: 400px;
        overflow: auto;
    }
    .conversation
    {
        padding:5px;
        border-bottom:1px solid #ddd;
        margin:0;

    }

    .message-wrap
    {
        box-shadow: 0 0 3px #ddd;
        padding:0;

    }
    .msg
    {
        padding:5px;
        /*border-bottom:1px solid #ddd;*/
        margin:0;
    }
    .msg-wrap
    {
        padding:10px;
        max-height: 400px;
        overflow: auto;

    }

    .time
    {
        color:#bfbfbf;
    }

    .send-wrap
    {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding:10px;
        /*background: #f8f8f8;*/
    }

    .send-message
    {
        resize: none;
    }

    .highlight
    {
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
    }

    .send-message-btn
    {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;

        border-bottom-right-radius: 0;
    }
    .btn-panel
    {
        background: #f7f7f9;
    }

    .btn-panel .btn
    {
        color:#b8b8b8;

        transition: 0.2s all ease-in-out;
    }

    .btn-panel .btn:hover
    {
        color:#666;
        background: #f8f8f8;
    }
    .btn-panel .btn:active
    {
        background: #f8f8f8;
        box-shadow: 0 0 1px #ddd;
    }

    .btn-panel-conversation .btn,.btn-panel-msg .btn
    {

        background: #f8f8f8;
    }
    .btn-panel-conversation .btn:first-child
    {
        border-right: 1px solid #ddd;
    }

    .msg-wrap .media-heading
    {
        color:#003bb3;
        font-weight: 700;
    }

    .msg-wrap .media-heading-user
    {
        color:#28a745;
        font-weight: 700;
    }


    .msg-date
    {
        background: none;
        text-align: center;
        color:#aaa;
        border:none;
        box-shadow: none;
        border-bottom: 1px solid #ddd;
    }


    body::-webkit-scrollbar {
        width: 12px;
    }
 
    
    /* Let's get this party started */
    ::-webkit-scrollbar {
        width: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
/*        -webkit-border-radius: 10px;
        border-radius: 10px;*/
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
/*        -webkit-border-radius: 10px;
        border-radius: 10px;*/
        background:#ddd; 
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    }
    ::-webkit-scrollbar-thumb:window-inactive {
        background: #ddd; 
    }

</style>

@endsection