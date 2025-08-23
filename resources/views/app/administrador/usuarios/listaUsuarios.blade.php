@extends('layouts.app')

@section('title', 'usuarios')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Administración de Usuarios</h1>
        <p class="mb-4">La tabla mostrará los usuarios ingresados</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-user-plus"></i> Nuevo usuario
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>En linea</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $user)
                                <tr>
                                    <td class="text-center">
                                        @if (!empty($user->foto))
                                            <img class="img-profile rounded-circle"
                                                src="{{ asset('storage/' . $user->foto) }}" alt="Foto Empleado"
                                                style="width:40px; height:40px; object-fit:cover;">
                                        @else
                                            <i class="fa-solid fa-user-xmark"></i>
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ ucfirst($user->rol) }}</span>
                                    </td>
                                    <td>
                                        @if ($user->estado === 'activo')
                                            <span class="badge bg-primary text-white">{{ ucfirst($user->estado) }}</span>
                                        @else
                                            <span class="badge bg-secondary text-white">{{ ucfirst($user->estado) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($user->isOnline())
                                            <span class="badge bg-success">En línea</span>
                                        @else
                                            <span class="badge bg-secondary">Desconectado</span>
                                            <small class="d-block text-muted">
                                                {{ $user->last_activity ? \Carbon\Carbon::parse($user->last_activity)->diffForHumans() : 'Nunca' }}
                                            </small>
                                        @endif
                                    </td>


                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-1">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 6,
                "lengthMenu": [5, 10, 25, 25, 50],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
    </script>
@endsection
@endsection
