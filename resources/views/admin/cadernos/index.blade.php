@extends('layout.app')
@section('title', 'Cadernos')
@section('conteudo')
<div class="mt-4">
    <div>
        <h2>Cadernos</h2>
        <a href="/admin/cadernos/create" class="btn btn-sucess">Novo</a>
    </div>
    <!-- tabela -->
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="text-center">
                <tr>
                    <th>Nome</th>
                    <th colspan="3">Ações</th>
                </tr>

            <tbody>

                @foreach ($cadernos as $caderno)
                <tr>
                    <td>{{ $caderno->nome }}</td>
                    
                    <td>
                        <!-- href é o link da pagina /admin/cadernos/1/show -->
                        <a href="/admin/cadernos/{{ $caderno->id }}"
                            class="btn btn-sm btn-primary">
                            <i class="bi bi-pass"></i>
                        </a>
                    </td>
                    <td><a href="/admin/cadernos/{{ $caderno->id }}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    
                    
                    <td>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-caderno-id="{{ $caderno->id }}">
                                <i class="bi bi-trash"></i>

                        </td>

                </tr>
                @endforeach

            </tbody>

            </thead>
        </table>
    </div>
</div>
<!-- Modal de exclusão -->
<div class="modal fade" id="confirmDeleteModal"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar exclusão</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>


            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja excluir?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="/admin/cadernos" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Remover</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) { 
        var button = event.relatedTarget;
        var cadernoId = button.getAttribute('data-caderno-id');
        var form = document.getElementById('deleteForm');
        form.action = '/admin/cadernos/' + cadernoId;
    });

</script>
@endsection

