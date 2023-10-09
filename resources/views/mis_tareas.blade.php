@extends('menu')

@section('content')
    <div style="display:flex; align-items:center; flex-direction:column; width;">
        <button style="margin-top:10%;" id="abrirModal" class="AgregarTarea">Agregar Tarea</button>
        @auth
        <div style="background-color:white; border-radius:25px; padding:10px; display:flex; align-items:center; gap:10px;"><div style="font-size:18px;">Bienvenid@  </div> <div style="font-size:20px; color:green; font-weigth:700;">{{auth()->user()->username}}</div></div>
        @endauth
    </div>
    
    <div id="miModal" class="modal">               
        <div class="modal-contenido">
            <span style="" class="cerrar" id="cerrarModal">&times;</span>
            <h1 style="text-align:center;">Agregar tareas</h1>
                <form class="atareas" action="{{ route('tareas') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="usuario_id" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="user_id" value="{{auth()->user()->id}}"readonly>  
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="title">  
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" name="Description">
                    </div>
                    <div class="mb-3">
                        <label for="CaductDate" class="form-label">Fecha de vencimiento</label>
                        <input type="date" class="form-control" name="CaductDate">
                    </div>   
                        <button type="submit" class="btn btn-primary">Crear Tarea</button>
                </form>
        </div>
    </div>
    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                        
                    @endif

                    @error('title')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror
                    @error('Description')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror
    <div class= "table-dv">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha de Vencimiento</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    @foreach ($tareas as $tarea )  
        <tbody>
            <tr class="{{ $tarea->Complete == 1 ? 'fila-verde' : '' }}">
                <th scope="row">{{ $tarea->id }}</th>
                    <td>{{ $tarea->title }}</td>
                    <td>{{ $tarea->Description }}</td>
                    <td>{{ $tarea->CaductDate }}</td>
                    <td>
                        <div class="dv-icons">
                            <div class="icons"><a href="{{ route('tareas-edit', ['id'=> $tarea-> id]) }}"><img src="..\img\lapiz.png" alt=""></a></div>                    
                            <div class="icons">
                                <form action="{{ route('tareas-destroy', [$tarea-> id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button><img src="..\img\borrar.png" alt=""></button>
                            </form></div>
                            <div class="icons cheque">
                                <form action="{{ route('tareas-estado', [$tarea-> id]) }}" method="POST">
                                @method('POST')
                                @csrf
                                <button type="submit"><img src="..\img\cheque.png" alt=""></button>
                            </form></div>
                            <div class="complete"> Completado</div>
                        </div>
                    </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
    @if ($tareas->total() > $tareas->perPage())
        <div class="d-flex justify-content-center links">
            {{ $tareas->links() }}
        </div>
    @endif

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection