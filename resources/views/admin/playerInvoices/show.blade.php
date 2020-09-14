@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.playerInvoice.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.playerInvoice.fields.id') }}
                        </th>
                        <td>
                            {{ $playerInvoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.playerInvoice.fields.palyer') }}
                        </th>
                        <td>
                            {{ $playerInvoice->palyer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.playerInvoice.fields.amount') }}
                        </th>
                        <td>
                            ${{ $playerInvoice->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.playerInvoice.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $playerInvoice->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.playerInvoice.fields.invoice_type') }}
                        </th>
                        <td>
                            {{ App\PlayerInvoice::INVOICE_TYPE_SELECT[$playerInvoice->invoice_type] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.playerInvoice.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $playerInvoice->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.playerInvoice.fields.notes') }}
                        </th>
                        <td>
                            {!! $playerInvoice->notes !!}
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