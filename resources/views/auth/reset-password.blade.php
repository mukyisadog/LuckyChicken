<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <title>重設密碼</title>
</head>
<style>
/* logo */
#logo {
  background-color: #b1bba0;
  width: 300px;
  height: 70px;
  font-size: 40px;
  text-align: center;
  position: relative;
  top: 10px;
  left: 1%;
}


/* 註冊 */
label{
    color:rgb(42, 42, 42);
    font-size: 30px;
}
.registercontainer {
  padding: 30px;
  background-color:#F8F6F2;
  width: 40%;
  margin-top: -70px;
}
.registercontainer h1{
    text-align: center;
    color:rgb(42, 42, 42)
}
/* Full-width input fields */
input[type="text"],
input[type="email"],
input[type="password"] {
  width: 80%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #ffffff;
  font-size: 20px;
}

input[type="text"]:focus,
input[type="password"]:focus {
  background-color: rgb(255, 255, 255);
  /* outline: none; */
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #646464;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #b1bba0;
  color: rgb(42, 42, 42);
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
  font-size: 25px;
  margin-left: 31%;
}


button:hover {
  opacity: 1;
}

form{
    display: flex;
    justify-content: center;
}

  
#inputcontianer{
    position: relative;
    left: 50px;
}

@media screen and (max-width: 1200px) {
  form {
    margin-top: 30px;
  }
}

@media screen and (max-width: 600px) {
  .registercontainer {
    width: 90%;
    margin: 40px;
    margin-top: -40px;
  }

  #logo {
    background-color: #b1bba0;
    width: 300px;
    height: 70px;
    font-size: 40px;
    text-align: center;
    position: relative;
    top: 50px;
    left: 25%;
  }
}


</style>
<body>
    <div>
        <a href="/BigProject/public"><div id="logo">與山同行LOGO</div></a>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <div>
    <!-- Session Status -->


    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <div class="registercontainer">
            <h1>重設密碼</h1>
            <hr>
            <div id="inputcontianer">
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('信箱：')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('密碼：')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <br>
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('確認密碼：')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <br>
                <br>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="registerbtn">
                        {{ __('重設密碼') }}
                    </x-primary-button>
                </div>
            </div>
        </div>

    </form>

</body>

</html>
    
