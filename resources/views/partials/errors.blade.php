@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops! Verifica los errores:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif