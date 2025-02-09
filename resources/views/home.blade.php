

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($images as $image) <?php //imagenes que vienen desde el HomeController 
                                        ?>

            <div class="card post_image">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if($image->user->image) <?php // Se Obtiene el usuario de la imagen a travez del modelo image?>
                <div>
                    <div id="avatarContainer" class="avatar-container">
                        <img src="{{ route('user.avatar',['filename'=>$image->user->image]) }}" alt="" class="avatar">
                    </div>
                </div>

                @endif

                <div class="data_user">
                    <a href="">
                        {{$image->user->name. ' '. $image->user->surname}}
                        <span class="nickname">
                            {{' | @'.$image->user->nickname}}
                        </span>
                    </a>
                </div>



                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>


            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection