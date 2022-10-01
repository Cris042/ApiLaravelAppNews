@extends('templates.model')

@section('content')  
    <div class="content-edit">
        <div class = "card-edit">
            <p class = "title"> Editar </p>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="msn-erro">{{ $error }}</li>
                     @endforeach
                </ul>
            @endif

            <div class = "card-content-edit">
                <form action="{{ route('news.update', $news->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input class = "input-w80" type = "text" name = "name"  value ="{{ $news->name }}" placeholder="Nome" />
                    <input class = "input-w80" type = "hidden" name = "nameAc"  value ="{{ $news->name }}" />
                    <input class = "input-w80" type = "text" name = "content" value ="{{ $news->content }}" placeholder="Conteudo" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form>                     
            </div><!--\ card-content !-->

        </div><!--\ card-edit !-->

        </div><!--\ content-edit !-->
@endsection