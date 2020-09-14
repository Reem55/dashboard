@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product-consumptions.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.product-consumptions.update", [$productConsumption->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="code">{{ trans('cruds.product-consumptions.fields.code') }}*</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ old('code', isset($productConsumption) ? $productConsumption->code : '') }}" required>
                @if($errors->has('code'))
                    <p class="help-block">
                        {{ $errors->first('code') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product.fields.name_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                <label for="product_name">{{ trans('cruds.product-consumptions.fields.product_name') }}*</label>
                <select name="product_id" id="product_name" class="form-control select2">
                    @foreach($products as $id => $product)
                        <option {{$product->id == $productConsumption->product_id ? 'selected' : ''}} value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_id'))
                    <p class="help-block">
                        {{ $errors->first('product_id') }}
                    </p>
                @endif
            </div>
                       <div class="form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
                <label for="reason">{{ trans('cruds.product-consumptions.fields.reason') }}*</label>
                <input type="text" id="reason" name="reason" class="form-control" value="{{ old('reason',$productConsumption->reason)}}">
                @if($errors->has('reason'))
                    <p class="help-block">
                        {{ $errors->first('reason') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product-consumptions.fields.reason_helper') }}
                </p>
            </div>
              <div class="form-group {{ $errors->has('receiver_name') ? 'has-error' : '' }}">
                <label for="receiver_name">{{ trans('cruds.product-consumptions.fields.receiver_name') }}*</label>
                <input type="text" id="receiver_name" name="receiver_name" class="form-control" value="{{ old('receiver_name',$productConsumption->receiver_name)}}">
                @if($errors->has('receiver_name'))
                    <p class="help-block">
                        {{ $errors->first('receiver_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product-consumptions.fields.receiver_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.product-consumptions.fields.date') }}*</label>
                <input type="text" id="date" name="date" class="form-control date" value="{{ old('date',$productConsumption->date) }}" required>
                @if($errors->has('date'))
                    <p class="help-block">
                        {{ $errors->first('date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product-consumptions.fields.date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                <label for="quantity">{{ trans('cruds.product-consumptions.fields.quantity') }}*</label>
                <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', isset($productConsumption) ? $productConsumption->quantity : '') }}" step="0.01" required>
                @if($errors->has('quantity'))
                    <p class="help-block">
                        {{ $errors->first('quantity') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.product-consumptions.fields.quantity_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection