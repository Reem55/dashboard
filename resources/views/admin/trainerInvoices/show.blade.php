@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trainerInvoice.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trainerInvoice.fields.id') }}
                        </th>
                        <td>
                            {{ $trainerInvoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainerInvoice.fields.trainer') }}
                        </th>
                        <td>
                            {{ $trainerInvoice->trainer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainerInvoice.fields.amount') }}
                        </th>
                        <td>
                            ${{ $trainerInvoice->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainerInvoice.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $trainerInvoice->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainerInvoice.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $trainerInvoice->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainerInvoice.fields.notes') }}
                        </th>
                        <td>
                            {!! $trainerInvoice->notes !!}
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