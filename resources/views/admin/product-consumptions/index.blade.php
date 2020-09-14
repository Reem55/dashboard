@extends('layouts.admin')
@section('content')
@can('product_consumption_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.product-consumptions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.product-consumptions.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.product-consumptions.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.product_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.receiver_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.product-consumptions.fields.quantity') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product_consumptions as $key => $productConsumption)
                        <tr data-entry-id="{{ $productConsumption->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productConsumption->code ?? '' }}
                            </td>
                            <td>
                                {{ $productConsumption->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $productConsumption->reason ?? '' }}
                            </td>
                            <td>
                                {{ $productConsumption->receiver_name ?? '' }}
                            </td>
                            <td>
                                {{ $productConsumption->date ?? '' }}
                            </td>
                            <td>
                                {{ $productConsumption->quantity ?? '' }}
                            </td>
                            <td>
                                @can('product_consumption_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.product-consumptions.show', $productConsumption->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_consumption_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.product-consumptions.edit', $productConsumption->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_consumption_delete')
                                    <form action="{{ route('admin.product-consumptions.destroy', $productConsumption->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('product_consumption_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.product-consumptions.massDestroy') }}",
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