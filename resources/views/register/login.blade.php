@extends('base')

@section('content')

    <div class="w3-row w3-margin"> 
        <div class="w3-col s6 w3-center">
            <img id='profile' src="img/icons/giphy.gif" alt="" style="height: 80%; width: 80%;">  
        </div>

        <div class="w3-col s6 w3-padding-16">    
            <h1><b>Connexion</b></h1>
            <p>Veuillez entrez votre nom et mot de passe pour vous connectez!</p>
                
            <div class="w3-padding-16">
                <form action="{{ route('register.login_action') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nom : </label>
                        <input class="w3-input w3-light-grey" type="text" name="email" id="" placeholder="Ex : John Doe">
                    </div>
                    
                    <div class="form-group w3-margin-top">
                        <label for="">Mot de passe :</label>
                        <input class="w3-input w3-light-grey" type="password" name="password" id="" placeholder="Ex : **************">
                    </div>

                    <p><a class="w3-text-blue" href="">Mot de passe oublié?</a></p>
                    <button class="w3-button w3-border" type="submit" name="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="w3-center w3-black">
        <img id="mail" src="img/icons/email.png" alt="logo" height="40">
        <img id="fb" src="img/icons/fb.png" alt="logo" height="40">
        <img id="insta" src="img/icons/insta.png" alt="logo" height="40">
        <img id="tel" src="img/icons/tel.png" alt="logo" height="35">
    </div>

@endsection