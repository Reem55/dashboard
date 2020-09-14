@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trainer.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trainer.fields.id') }}
                        </th>
                        <td>
                            {{ $trainer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainer.fields.name') }}
                        </th>
                        <td>
                            {{ $trainer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainer.fields.phone') }}
                        </th>
                        <td>
                            {{ $trainer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainer.fields.status') }}
                        </th>
                        <td>
                            {{ App\Trainer::STATUS_SELECT[$trainer->status] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainer.fields.notes') }}
                        </th>
                        <td>
                            {{ $trainer->notes }}
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