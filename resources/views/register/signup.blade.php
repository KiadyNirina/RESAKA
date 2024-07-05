@extends('base')

@section('content')

    <div class="w3-row w3-margin">
        <div class="w3-col s6 w3-center">
            <img id='profile' src="img/icons/giphy.gif" alt="" style="height: 80%; width: 80%;">  
        </div>

        <div class="w3-col s6 w3-padding-16">    
            <h1><b>Inscription</b></h1>
            <p>Veuillez entrez votre information pour créer votre compte!</p>
                
            <div class="w3-padding-16">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Nom : </label>
                        <input class="w3-input w3-light-grey" type="text" name="name" id="" placeholder="Ex : John Doe">
                    </div>
                    
                    <div class="form-group w3-margin-top">
                        <label for="">Âge :</label>
                        <input class="w3-input w3-light-grey" type="text" name="age" id="" placeholder="Ex : 20">
                    </div>

                    <div class="form-group w3-margin-top">
                        <label for="">Email :</label>
                        <input class="w3-input w3-light-grey" type="text" name="email" id="" placeholder="Ex : johndoe96@gmail.com">
                    </div>

                    <div class="form-group w3-margin-top">
                        <label for="">Mot de passe :</label>
                        <input class="w3-input w3-light-grey" type="password" name="password" id="" placeholder="Ex : **************">
                    </div>

                    <div class="form-group w3-margin-top">
                        <label for="">Confirmation mot de passe :</label>
                        <input class="w3-input w3-light-grey" type="password" name="confirm_password" id="" placeholder="Ex : **************">
                    </div>

                    <button class="w3-margin-top w3-button w3-border" type="submit" name="submit">S'inscrire</button>
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