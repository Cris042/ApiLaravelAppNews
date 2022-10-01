@extends('templates.model')

@section('content')  
    <div class="content">
        <div class = "card-cadastro w50">
            <p class = "title"> Cadastre-se </p>

            @if ( $errors->any() )
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="msn-erro">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class = "card-content">
                <form action="{{ route('news.store') }}" method="post">
                    @csrf
                    <input class = "input-w80" type = "text" name = "name" placeholder="Nome" />
                    <input class = "input-w80" type = "text" name = "content" placeholder="Conteudo" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form>        
                
                <a class="text-link" href="{{ route('user.logout')}}" > Sair </a>
            </div><!--\ card-content !-->

        </div><!--\ card-cadastro !-->

        <div class = "card-users w50">
            <p class = "title"> News </p>

            <form action="{{ route('news.search') }}" method="post">
                @csrf
                <input class = "input-w80 input-search search" type = "text" name = "search" placeholder="Pesquiser por nome" />
            </form>

            <div class="card-content">
                <ul>
                    @foreach ( $news as $new ) 
                        <li> 
                            {{ $new->name }}
                            <a class = "btn-edit" href = "{{ route('news.show', $new->id) }}"> Editar </a> 

                            <form action="{{ route('news.destroy', $new->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class = "btn-delet" > Deletar </a>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div><!--\ card-content !-->

        </div><!--\ card-users !-->
            
    </div><!--\ content !-->
@endsection