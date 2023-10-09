@extends('menu')

@section('content')
    <div class="edit-form">
    <h1 style="text-align:center;">Editar tarea</h1>
                <form class="updatetareas" action="{{ route('tareas-update', ['id' => $tarea->id]) }}" method="POST">
                    @method('PATCH') 
                    @csrf
                    <div class="mb-3">
                        <div><label for="title" class="form-label">Titulo</label></div>
                        <div><input type="text" class="form-control" name="title" value="{{$tarea->title}}"></div>
                    </div>
                    <div class="mb-3">
                        <div><label for="Description" class="form-label">Descripcion</label></div>
                        <div><input type="text" class="form-control" name="Description" value="{{$tarea->Description}}"></div>
                    </div>
                    <div class="mb-3">
                        <div><label for="CaductDate" class="form-label">Fecha de vencimiento</label></div>
                        <div><input type="date" class="form-control" name="CaductDate" value="{{$tarea->CaductDate}}" readonly></div>
                    </div>   
                        <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
                </form>
    </div>
@endsection