@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.conversations.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.conversations.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(auth()->user()->isSuperAdmin())
             <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="user_name">{{ trans('cruds.conversations.fields.user_name') }}*</label>
                <select name="user_id" id="user_name" class="form-control select2">
                    @foreach($users as $id => $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <p class="help-block">
                        {{ $errors->first('user_id') }}
                    </p>
                @endif
            </div>
            @endif

            @if(auth()->user()->isUserAdmin())
                <input type="hidden" name="user_id" value="1">
            @endif

           <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.conversations.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title')}}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.conversations.fields.title_helper') }}
                </p>
            </div>
             
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection