@extends('layouts.admin')
@section('content')
@can('trainer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.trainers.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.trainer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.trainer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.trainer.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainer.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainer.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainer.fields.notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trainers as $key => $trainer)
                        <tr data-entry-id="{{ $trainer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $trainer->name ?? '' }}
                            </td>
                            <td>
                                {{ $trainer->phone ?? '' }}
                            </td>
                            <td>
                                {{ App\Trainer::STATUS_SELECT[$trainer->status] ?? '' }}
                            </td>
                            <td>
                                {{ $trainer->notes ?? '' }}
                            </td>
                            <td>
                                @can('trainer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trainers.show', $trainer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('trainer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trainers.edit', $trainer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('trainer_delete')
                                    <form action="{{ route('admin.trainers.destroy', $trainer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('trainer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trainers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection