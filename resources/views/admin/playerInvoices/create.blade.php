@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.playerInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.player-invoices.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('palyer_id') ? 'has-error' : '' }}">
                <label for="palyer">{{ trans('cruds.playerInvoice.fields.palyer') }}*</label>
                <select name="palyer_id" id="palyer" class="form-control select2" required>
                    @foreach($palyers as $id => $palyer)
                        <option value="{{ $id }}" {{ (isset($playerInvoice) && $playerInvoice->palyer ? $playerInvoice->palyer->id : old('palyer_id')) == $id ? 'selected' : '' }}>{{ $palyer }}</option>
                    @endforeach
                </select>
                @if($errors->has('palyer_id'))
                    <p class="help-block">
                        {{ $errors->first('palyer_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.playerInvoice.fields.amount') }}*</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($playerInvoice) ? $playerInvoice->amount : '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <p class="help-block">
                        {{ $errors->first('amount') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.playerInvoice.fields.amount_helper') }}
                </p>
            </div>
            <!-- remaining amount -->
            <div class="form-group {{ $errors->has('remaining_amount') ? 'has-error' : '' }}">
                <label for="remaining_amoun">{{ trans('cruds.playerInvoice.fields.remaining_amount') }}*</label>
                <input type="number" id="remaining_amount" name="remaining_amount" class="form-control" value="{{ old('remaining_amount', isset($playerInvoice) ? $playerInvoice->remaining_amount : '') }}" step="0.01" required>
                @if($errors->has('remaining_amount'))
                    <p class="help-block">
                        {{ $errors->first('remaining_amount') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.playerInvoice.fields.remaining_amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
                <label for="invoice_number">{{ trans('cruds.playerInvoice.fields.invoice_number') }}*</label>
                <input type="number" id="invoice_number" name="invoice_number" class="form-control" value="{{ old('invoice_number', isset($playerInvoice) ? $playerInvoice->invoice_number : '') }}" step="1" required>
                @if($errors->has('invoice_number'))
                    <p class="help-block">
                        {{ $errors->first('invoice_number') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.playerInvoice.fields.invoice_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('invoice_type') ? 'has-error' : '' }}">
                <label for="invoice_type">{{ trans('cruds.playerInvoice.fields.invoice_type') }}*</label>
                <select id="invoice_type" name="invoice_type" class="form-control" required>
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\PlayerInvoice::INVOICE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('invoice_type', 'subscription') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice_type'))
                    <p class="help-block">
                        {{ $errors->first('invoice_type') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
                <label for="invoice_date">{{ trans('cruds.playerInvoice.fields.invoice_date') }}*</label>
                <input type="text" id="invoice_date" name="invoice_date" class="form-control date" value="{{ old('invoice_date', isset($playerInvoice) ? $playerInvoice->invoice_date : '') }}" required>
                @if($errors->has('invoice_date'))
                    <p class="help-block">
                        {{ $errors->first('invoice_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.playerInvoice.fields.invoice_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('cruds.playerInvoice.fields.notes') }}</label>
                <textarea id="notes" name="notes" class="form-control ">{{ old('notes', isset($playerInvoice) ? $playerInvoice->notes : '') }}</textarea>
                @if($errors->has('notes'))
                    <p class="help-block">
                        {{ $errors->first('notes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.playerInvoice.fields.notes_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection