@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product-consumptions.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.code') }}
                        </th>
                        <td>
                            {{ $productConsumption->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.product_name') }}
                        </th>
                        <td>
                            {{ $productConsumption->product->name ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.receiver_name') }}
                        </th>
                        <td>
                            {{ $productConsumption->receiver_name ?? '' }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.reason') }}
                        </th>
                        <td>
                            {{ $productConsumption->reason ?? '' }}
                        </td>
                    </tr>
                      <tr>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.date') }}
                        </th>
                        <td>
                            {{ $productConsumption->date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.quantity') }}
                        </th>
                        <td>
                            {{ $productConsumption->quantity }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection