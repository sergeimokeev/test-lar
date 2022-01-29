<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css"
          crossorigin="anonymous">
    <title>Form</title>
</head>
<body>
<div class="grid-container" style="padding-top: 10px">
    <div class="grid-x grid-padding-y">
        <div class="cell medium-8 callout">
            <form id="form" action="/form" method="post">
                @csrf
                <div class="grid-x grid-padding-x align-middle">
                    <div class="cell">
                        Сервис по сокращению ссылок
                    </div>
                    <div class="cell medium-10">
                        <input name="link" type="text" placeholder="Вставьте ссылку сюда" value="">
                    </div>
                    <div class="cell medium-2">
                        <button class="button" type="submit" >Отправить</button>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell" id="errors">
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell" id="success">
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <label for="newLink">Вот твоя новая ссылка</label>
                        <input id="new-link" type="text" value="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
