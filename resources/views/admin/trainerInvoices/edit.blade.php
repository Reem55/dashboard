@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.trainerInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.trainer-invoices.update", [$trainerInvoice->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('trainer_id') ? 'has-error' : '' }}">
                <label for="trainer">{{ trans('cruds.trainerInvoice.fields.trainer') }}*</label>
                <select name="trainer_id" id="trainer" class="form-control select2" required>
                    @foreach($trainers as $id => $trainer)
                        <option value="{{ $id }}" {{ (isset($trainerInvoice) && $trainerInvoice->trainer ? $trainerInvoice->trainer->id : old('trainer_id')) == $id ? 'selected' : '' }}>{{ $trainer }}</option>
                    @endforeach
                </select>
                @if($errors->has('trainer_id'))
                    <p class="help-block">
                        {{ $errors->first('trainer_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.trainerInvoice.fields.amount') }}*</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($trainerInvoice) ? $trainerInvoice->amount : '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <p class="help-block">
                        {{ $errors->first('amount') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trainerInvoice.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
                <label for="invoice_number">{{ trans('cruds.trainerInvoice.fields.invoice_number') }}</label>
                <input type="number" id="invoice_number" name="invoice_number" class="form-control" value="{{ old('invoice_number', isset($trainerInvoice) ? $trainerInvoice->invoice_number : '') }}" step="1">
                @if($errors->has('invoice_number'))
                    <p class="help-block">
                        {{ $errors->first('invoice_number') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trainerInvoice.fields.invoice_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
                <label for="invoice_date">{{ trans('cruds.trainerInvoice.fields.invoice_date') }}*</label>
                <input type="text" id="invoice_date" name="invoice_date" class="form-control date" value="{{ old('invoice_date', isset($trainerInvoice) ? $trainerInvoice->invoice_date : '') }}" required>
                @if($errors->has('invoice_date'))
                    <p class="help-block">
                        {{ $errors->first('invoice_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trainerInvoice.fields.invoice_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('cruds.trainerInvoice.fields.notes') }}</label>
                <textarea id="notes" name="notes" class="form-control ">{{ old('notes', isset($trainerInvoice) ? $trainerInvoice->notes : '') }}</textarea>
                @if($errors->has('notes'))
                    <p class="help-block">
                        {{ $errors->first('notes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trainerInvoice.fields.notes_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection