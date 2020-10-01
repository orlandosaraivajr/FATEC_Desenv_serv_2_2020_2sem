<h3>Clientes </h3>
<a href="{{route('cliente.create')}}"> Novo Cliente</a>
<ul>
@foreach ($clientes as $cliente)
<li>
    {{ $cliente['id'] }} | {{ $cliente['nome'] }}
    <a href="{{route('cliente.edit',$cliente['id'])}}"> Editar</a>
    <a href="{{route('cliente.show',$cliente['id'])}}"> Info</a>
    <form action="{{ route('cliente.destroy', $cliente['id'])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Apagar">
    </form>
</li>
@endforeach
</ul>