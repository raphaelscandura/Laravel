<form action="{{ $action }}" method="POST">
    @csrf

    @isset($nome)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            class="form-control"
            value="{{ ($nome?$nome:'') }}"
        >
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
