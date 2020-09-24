<h3>Clientes </h3>

<ol>
    @foreach ($clientes as $cliente)
    <li>
        {{ $cliente['nome'] }}
    </li>
    @endforeach
</ol>