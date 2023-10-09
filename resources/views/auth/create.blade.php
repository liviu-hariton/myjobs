<x-layout>
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('auth.store') }}" method="post">
            @csrf

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="row my-3">
                <div class="col">
                    <div class="form-check text-start">
                        <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                </div>
                <div class="col text-end">
                    <a href="#" class="text-primary text-decoration-none">Forgot password?</a>
                </div>
            </div>

            <button class="btn btn-success w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>
</x-layout>

