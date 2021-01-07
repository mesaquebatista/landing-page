<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EBOOK: Como se tornar um programador PHP profissional</title>
    <link rel="stylesheet" href="{{ url('/css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/myStyle.css') }}">
</head>
<body class="has-background-black">
    <section class="hero">
        <div class="hero-body centered">
            <div class="container">
                <h1 class="title has-text-centered has-text-white">
                    EBOOK: Como se tornar um programador PHP profissional
                </h1>
                <h2 class="subtitle has-text-centered has-text-light">
                    Preencha os dados para baixar o ebook completo e se tornar um profissional no desenvolvimento Web
                </h2>            
            </div>
            <div class="columns is-mobile my-6">
                <div class="column">
                    <form action="{{ route('visitants.store') }}" method="post">
                        @csrf
                        <div class="field">
                            <label class="label has-text-white">Nome</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="e.g Alex Smith" name="name">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                          
                        <div class="field">
                            <label class="label has-text-white">Email</label>
                            <div class="control">
                                <input class="input" type="email" placeholder="e.g. alexsmith@gmail.com" name="email">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label has-text-white">Data de Nascimento</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="e.g. 26/01/2002" name="nascimento" id="nascimento">
                            </div>
                            @error('nascimento')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label has-text-white">CEP</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="e.g. 59815-000" name="cep" id="cep">
                            </div>
                            <div id="nameCity" class="has-text-light"></div>
                            @error('nascimento')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="button is-fullwidth is-rounded my-5 has-background-warning" type="submit" value="Cadastrar" placeholder="e.g. 26/01/2002">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ url('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ url('js/jquery.mask.js') }}"></script>

    <script>
        function requestCity(cep){
            let request = new XMLHttpRequest();
            request.open('GET', `https://viacep.com.br/ws/${cep}/json/`);
            request.send();
            request.onload = () => {
                console.log(request);
                if(request.status == 200){
                    console.log(JSON.parse(request.response));
                    let result = JSON.parse(request.response);
                    if(!result.error){
                        $("#nameCity").text(`${result.localidade}/${result.uf}`);
                    }else{
                        $("#nameCity").text(`CEP não encontrado`);
                    }
                }else{
                    console.dir(request)
                }
            }
        }
        $(document).ready(function(){
            $('#nascimento').mask('00/00/0000');
            $('#cep').mask('00000-000');

            $('#cep').keyup(function() {
                let cep = $(this).val();
                if(cep.length == 9){
                    let newCep = cep.replace(/([^0-9])/, '')
                    requestCity(newCep);
                }else{
                    $("#nameCity").text(`CEP não encontrado`);
                }
            });
        });
    </script>
</body>
</html>