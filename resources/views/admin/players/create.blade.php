@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.player.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.players.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.player.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($player) ? $player->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.player.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.player.fields.phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($player) ? $player->phone : '') }}">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.player.fields.phone_helper') }}
                </p>
            </div>


              <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                <label for="dob">{{ trans('cruds.player.fields.dob') }}</label>
                <input type="text" id="phone" name="dob" class="form-control" value="{{ old('dob', isset($player) ? $player->dob : '') }}">
                @if($errors->has('dob'))
                    <p class="help-block">
                        {{ $errors->first('dob') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.player.fields.dob_helper') }}
                </p>
            </div>

<!-- select elmal3ab  -->

 <div class="form-group {{ $errors->has('stadia_id') ? 'has-error' : '' }}">
                <label for="stadia">{{ trans('cruds.player.fields.stadia_id') }}*</label>
                <select name="stadia_id" id="stadia_id" class="form-control select2" required>
                    @foreach($stadia as $id => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('stadia_id'))
                    <p class="help-block">
                        {{ $errors->first('stadia_id') }}
                    </p>
                @endif
            </div>
        

            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('cruds.player.fields.notes') }}</label>
                <textarea id="notes" name="notes" class="form-control ">{{ old('notes', isset($player) ? $player->notes : '') }}</textarea>
                @if($errors->has('notes'))
                    <p class="help-block">
                        {{ $errors->first('notes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.player.fields.notes_helper') }}
                </p>
            </div>
<!-- bdayt eleshtrak -->
             <div class="form-group {{ $errors->has('start') ? 'has-error' : '' }}">
                <label for="start">{{ trans('cruds.player.fields.start') }}*</label>
                <input type="text" id="start" name="start" class="form-control date" value="{{ old('invoice_date', isset($player) ? $player->start : '') }}" required>
                @if($errors->has('start'))
                    <p class="help-block">
                        {{ $errors->first('start') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.player.fields.start_helper') }}
                </p>
            </div>
            <div>

                <!-- nahyat eleshtrak  -->
                    <div class="form-group {{ $errors->has('end') ? 'has-error' : '' }}">
                <label for="end">{{ trans('cruds.player.fields.end') }}*</label>
                <input type="text" id="end" name="end" class="form-control date" value="{{ old('invoice_date', isset($player) ? $player->end : '') }}" required>
                @if($errors->has('end'))
                    <p class="help-block">
                        {{ $errors->first('end') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.player.fields.end_helper') }}
                </p>
            </div>
            <div>


                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection