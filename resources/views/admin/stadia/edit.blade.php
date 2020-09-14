@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stadium.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.stadia.update", [$stadium->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.stadium.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($stadium) ? $stadium->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.stadium.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.stadium.fields.amount') }}*</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($stadium) ? $stadium->amount : '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <p class="help-block">
                        {{ $errors->first('amount') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.stadium.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
                <label for="invoice_number">{{ trans('cruds.stadium.fields.invoice_number') }}</label>
                <input type="number" id="invoice_number" name="invoice_number" class="form-control" value="{{ old('invoice_number', isset($stadium) ? $stadium->invoice_number : '') }}" step="1">
                @if($errors->has('invoice_number'))
                    <p class="help-block">
                        {{ $errors->first('invoice_number') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.stadium.fields.invoice_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
                <label for="invoice_date">{{ trans('cruds.stadium.fields.invoice_date') }}*</label>
                <input type="text" id="invoice_date" name="invoice_date" class="form-control date" value="{{ old('invoice_date', isset($stadium) ? $stadium->invoice_date : '') }}" required>
                @if($errors->has('invoice_date'))
                    <p class="help-block">
                        {{ $errors->first('invoice_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.stadium.fields.invoice_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('cruds.stadium.fields.notes') }}</label>
                <textarea id="notes" name="notes" class="form-control ">{{ old('notes', isset($stadium) ? $stadium->notes : '') }}</textarea>
                @if($errors->has('notes'))
                    <p class="help-block">
                        {{ $errors->first('notes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.stadium.fields.notes_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection