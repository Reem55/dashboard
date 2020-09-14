@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stadium.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stadium.fields.id') }}
                        </th>
                        <td>
                            {{ $stadium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stadium.fields.name') }}
                        </th>
                        <td>
                            {{ $stadium->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stadium.fields.amount') }}
                        </th>
                        <td>
                            ${{ $stadium->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stadium.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $stadium->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stadium.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $stadium->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stadium.fields.notes') }}
                        </th>
                        <td>
                            {!! $stadium->notes !!}
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