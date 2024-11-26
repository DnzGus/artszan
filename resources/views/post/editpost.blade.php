<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artszan</title>
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('style/styleupl.css')}}">
</head>

<body>
    <!-- NAV -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand fw-bolder text-white" id="logo" href="#">
                <img class="logo" src="{{url('/imgs/image.png')}}" alt="Logo Artszan">
            </a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" id="search" type="search" placeholder="🔍 Pesquisar"
                    aria-label="Search">
            </form>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3 ">
                    <a href="#">
                        @if($user->profilePhoto != null)
                        <img class="imagemUsuario rounded-circle" src="data:image/png;base64,{{ $user->profilePhoto }}" alt="foto do usuário"><br>
                        @else
                        <img class="imagemUsuario rounded-circle" src="{{URL('/imgs/userImage.png')}}" alt="foto do usuário"><br>
                        @endif 
                    </a>
                </ul>
            </div>
        </nav>
    </header>

<form class="my-3" method="POST" action="{{ url('/post/' . $post->id) }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="mb-3 col-12">
                <label for="exampleFormControlInput1" id="titulo" class="form-label fw-semibold">Título do
                    post:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
            </div>

            <div class="mb-3 col-12">
                <label for="exampleFormControlTextarea1" id="descricao"
                    class="form-label fw-semibold">Descrição:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="form-check-reverse form-switch">
            <label class="form-check-label me-2" id="nsfw" for="flexSwitchCheckDefault">🔒Privado</label>
            <input class="form-check-input" type="checkbox" role="switch" active='1' name="private" id="flexSwitchCheckDefault">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="form-check-reverse form-switch">
            <label class="form-check-label me-2" id="nsfw" for="flexSwitchCheckDefault">🔞NSFW</label>
            <input class="form-check-input" type="checkbox" role="switch" active='1' name="nsfw" id="flexSwitchCheckDefault">
        </div>
    </div>

    <p>Tags</p>

    <table>
        <tr>
            <td>
                @foreach($tags as $value)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$value->id}}" id="flexCheckDefault" name="tags[]" value="{{$value->id}}">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$value->name}}
                    </label>
                </div>
                @endforeach
            </td>
        </tr>
    </table>

    <div class="d-flex justify-content-center">
        <button class="btn btn-primary fw-semibold" id="confirmar" role="button" type="submit">Editar</button>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>


</body>

</html>