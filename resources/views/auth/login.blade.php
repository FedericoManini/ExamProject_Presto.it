<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="display-6">
                    Login
                </h3>
            </div>
            <div class="col-12 col-md-6 my-5">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="my-2">
                        <label class="form-label">E-mail Address</label>
                        <input name="email" type="email" class="form-control mombra">
                    </div>

                    <div class="my-2">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control mombra">
                    </div>

                    <x-btncstm class="my-3" inner="Login"/>
                    <a class="nav-link" href="{{route('register')}}"><U>Not registered yet? Register</U></a>
                </form>
            </div>
            <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center">
                <img src="/img/prestoRose.png" alt="" width="400" height="400">
            </div>
        </div>
    </div>
</x-layout>