@extends ('admin.layouts.dashboard')

@section ('page_heading','Listado de notas')

@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Regular Table')
                    @slot('panelBody')
                        @include('admin.widgets.table', array('class'=>''))
                    @endslot
                @endcomponent
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Coloured Table')
                    @slot('panelBody')
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($notes as $note)
                                    <tr>
                                        <td>{{ $note->id }}</td>
                                        <td>{{ $note->title }}</td>
                                        <td>
                                            @can('destroy_notes')
                                                <a href="{{ route('notes.destroy', $note->id) }}">Eliminar nota</a>
                                            @else
                                                Usted no puede eliminar esta nota
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
    </div>

@endsection