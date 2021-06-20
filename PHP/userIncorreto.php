<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <!-- css -->
    <style>
        html, body, .nav {
            height: 100%;
        }

        body {
            background-color: #be4646;
        }
        .nav {
            padding: 50px;
            display: table;
            width: 100%;
        }

        .nav .content {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            background-color: rgba(0, 0, 0, 0.3);
            padding: 10px;
        }

        a {
            color: #1877f2;
        }

        h3 {
            color: white;
        }

        svg {
            color: white;
            margin: 20px;
            width: 150px;
            height: 150px;
            transition: width 1s, height 1s;
        }

        svg:hover {
            color: rgb(255, 224, 224);
            margin: 20px;
            width: 170px;
            height: 170px;
        }

        @font-face {
            font-family: 'Medium';
            src: url('../fonts/Arimo/Arimo-Medium.ttf');
            font-weight: normal;
            font-style: normal;
        }

        .body {
            font-family: "Medium";
        }
    </style>
</head>
<body class="body">
    <nav class="nav">
        <div class="content">
            <h3>Usuário ou senha incorretos, clique no ícone abaixo para resgatar seu login</h3>
            <a href="../Security/alterarUsuario.php?pesquisa=">    
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
            </a>
        </div>
    </nav>
</body>
</html>