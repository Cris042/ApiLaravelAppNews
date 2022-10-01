@extends('templates.model')

@section('content')  
    <div class="content-edit">
        <div class = "card-edit">
            <p class = "title"> Cadastre </p>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="msn-erro">{{ $error }}</li>
                     @endforeach
                </ul>
            @endif

            <div class = "card-content-edit">
                <form action="{{ route('user.store') }}"  method="post">
                    @csrf
                    <input class = "input-w80" type = "email" name = "email"   placeholder="Email" />
                    <input class = "input-w80" type = "text" name = "name"   placeholder="Name" />
                    <input class = "input-w80" type = "password" name = "password"  placeholder="Senha" />
                    <input class = "input-w80 btn-input" type = "submit" />
                </form>          
                
                <a class="text-link" href="{{ route('user.loginView')}}" > Login </a>
            </div><!--\ card-content !-->

        </div><!--\ card-edit !-->

        </div><!--\ content-edit !-->
@endsection