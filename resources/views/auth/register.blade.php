<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="display-6">
                    Register
                </h3>
            </div>
            <div class="col-12 col-md-6 my-5">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="my-2">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control mombra">
                    </div>

                    <div class="my-2">
                        <label class="form-label">E-mail Address</label>
                        <input name="email" type="email" class="form-control mombra">
                    </div>

                    <div class="my-2">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control mombra">
                    </div>

                    <div class="my-2">
                        <label class="form-label">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control mombra">
                    </div>
                    <x-btncstm class="my-3" inner="Register"/>
                    <a class="nav-link" href="{{route('login')}}"><U>Alredy registerd? Login!</U></a>
                </form>
            </div>
            <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center">
                <img src="/img/prestoRose.png" alt="" width="400" height="400">
            </div>
        </div>
    </div>
</x-layout>