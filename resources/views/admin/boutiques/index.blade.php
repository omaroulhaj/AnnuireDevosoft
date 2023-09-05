@extends('layouts.admin')
@section('content')
@can('boutique_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.boutiques.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.boutique.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.boutique.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Boutique">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.nom') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.categorie') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.ville') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.telephone') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.galery') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.video') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.site_web') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.instagram') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.tiktok') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.youtube') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.boutique.fields.latitude') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boutiques as $key => $boutique)
                        <tr data-entry-id="{{ $boutique->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $boutique->id ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->nom ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Boutique::TYPE_SELECT[$boutique->type] ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->categorie->nom ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->ville->nom ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->email ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->telephone ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->image ?? '' }}
                            </td>
                            <td>
                                @foreach($boutique->galery as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($boutique->video as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $boutique->site_web ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->facebook ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->instagram ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->tiktok ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->youtube ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->longitude ?? '' }}
                            </td>
                            <td>
                                {{ $boutique->latitude ?? '' }}
                            </td>
                            <td>
                                @can('boutique_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.boutiques.show', $boutique->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('boutique_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.boutiques.edit', $boutique->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('boutique_delete')
                                    <form action="{{ route('admin.boutiques.destroy', $boutique->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('boutique_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.boutiques.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Boutique:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection