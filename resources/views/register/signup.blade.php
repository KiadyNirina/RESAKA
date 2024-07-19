@extends('base')

@section('content')

    <div class="w3-row w3-margin">
        <div class="w3-col s6 w3-center">
            <img id='profile' src="icons/giphy.gif" alt="" style="height: 80%; width: 80%;">  
        </div>

        <div class="w3-col s6 w3-padding-16">    
            <h1><b>Inscription</b></h1>
            <p>Veuillez entrez votre information pour créer votre compte!</p>
                
            <div class="w3-padding-16">
                <form action="{{ route('register.signup_action') }}" method="POST">
                    
                    @csrf
                    
                    <div class="form-group">
                        <label for="">Nom : </label>
                        <input class="w3-input w3-light-grey @error('name') w3-border w3-border-red @enderror" type="text" name="name" id="" placeholder="Ex : John Doe" value="{{ old('name') }}">
                        @error('name')
                            <p class="w3-small w3-text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group w3-margin-top">
                        <label for="">Email :</label>
                        <input class="w3-input w3-light-grey @error('email') w3-border w3-border-red @enderror" type="text" name="email" id="" placeholder="Ex : johndoe96@gmail.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="w3-small w3-text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group w3-margin-top">
                        <label for="">Mot de passe :</label>
                        <input class="w3-input w3-light-grey @error('password') w3-border w3-border-red @enderror" type="password" name="password" id="" placeholder="Ex : **************" value="{{ old('password') }}">
                        @error('password')
                            <p class="w3-small w3-text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group w3-margin-top">
                        <label for="">Confirmation mot de passe :</label>
                        <input class="w3-input w3-light-grey @error('password_confirmation') w3-border w3-border-red @enderror" type="password" name="password_confirmation" id="" placeholder="Ex : **************" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <p class="w3-small w3-text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="w3-margin-top w3-button w3-border" type="submit" name="submit">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <div class="w3-center w3-black">
        <img id="mail" src="icons/email.png" alt="logo" height="40">
        <img id="fb" src="icons/fb.png" alt="logo" height="40">
        <img id="insta" src="icons/insta.png" alt="logo" height="40">
        <img id="tel" src="icons/tel.png" alt="logo" height="35">
    </div>

@endsection