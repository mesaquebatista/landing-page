<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('/css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/myStyle.css') }}">
</head>
<body>
    <section class="hero">
        <div class="hero-body centered">
            <div class="container">
                <h1 class="title has-text-centered">
                    Hero title
                </h1>
                <h2 class="subtitle has-text-centered">
                    Hero subtitle
                </h2>                
            </div>
            <div class="columns is-mobile my-6">
                <div class="column">
                    <form action="" method="post">
                        <div class="field">
                            <label class="label">Nome</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="e.g Alex Smith">
                            </div>
                        </div>
                          
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" placeholder="e.g. alexsmith@gmail.com">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Data de Nascimento</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="e.g. 26/01/2002">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">CEP</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="e.g. 59815-000">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="button is-fullwidth is-rounded my-5" type="submit" value="Cadastrar" placeholder="e.g. 26/01/2002">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            $('.date').mask('00/00/0000');
            $('.cep').mask('00000-000');
        }
    </script>
</body>
</html>