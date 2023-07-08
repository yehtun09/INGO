<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>NavBar</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="light">
        <a class="navbar-brand mx-5" href="#">Navbar</a>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>

                @auth
                    <form class="d-flex">
                        <span class="badge badge-info mx-3 mt-2">{{ auth()->user()->name }}</span>
                        <a href="{{ route('logout') }}" class="btn btn-secondary my-2 my-sm-0">LogOut</a>

                        <ul class="navbar-nav mx-2 bg-secondary ml-auto">
                            <li class="nav-item dropdown">
                                <select name="language" id="language-option" class="form-control">
                                    <option value="en" @if (Session::get('locale') == 'en') selected @endif>English</option>
                                    <option value="mm" @if (Session::get('locale') == 'mm') selected @endif>Myanmar</option>
                                </select>
                            </li>
                        </ul>
                    </form>
                @endauth

                @guest
                    <form class="d-flex">
                        <a class="btn btn-secondary my-2 my-sm-0 mx-2" href="{{ route('register.registration') }}"
                            type="submit">Singup</a>
                        <a class="btn btn-secondary my-2 my-sm-0" href="{{ route('login.show') }}">Login</a>

                        <ul class="navbar-nav mx-2 bg-secondary ml-auto">
                            <li class="nav-item dropdown">
                                <select name="language" id="language-option" class="form-control">
                                    <option value="en" @if (Session::get('locale') == 'en') selected @endif>
                                        English
                                    </option>
                                    <option value="mm" @if (Session::get('locale') == 'mm') selected @endif>
                                        Myanmar
                                    </option>
                                </select>
                            </li>
                        </ul>
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</body>
<script>
    $(document).ready(function() {
        $('#language-option').change(function() {
            window.location.href = "/locale/" + $(this).val();
        });
    });
</script>

</html>
