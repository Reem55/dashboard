@extends('layouts.admin')
@section('content')
@can('player_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.players.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.player.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.player.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.player.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.phone') }}
                        </th>
                         <th>
                            {{ trans('cruds.player.fields.dob') }}
                        </th>

                         <th>
                            {{ trans('cruds.player.fields.stadia_id') }}
                        </th>

                        <th>
                            {{ trans('cruds.player.fields.notes') }}
                        </th>                        
                         <th>
                            {{ trans('cruds.player.fields.start') }}
                        </th>
                         <th>
                            {{ trans('cruds.player.fields.end') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $key => $player)
                        <tr data-entry-id="{{ $player->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $player->name ?? '' }}
                            </td>
                            <td>
                                {{ $player->phone ?? '' }}
                            </td>
                             <td>
                                {{ $player->dob ?? '' }}
                            </td>
                           <td>
                                {{ $player->stadia->name ?? '' }}
                            </td>
                            <td>
                                {{ $player->notes ?? '' }}
                            </td>
                             <td>
                                {{ $player->start ?? '' }}
                            </td>
                             <td>
                                {{ $player->end ?? '' }}
                            </td>
                            <td>
                                @can('player_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.players.show', $player->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('player_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.players.edit', $player->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('player_delete')
                                    <form action="{{ route('admin.players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('player_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.players.massDestroy') }}",
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