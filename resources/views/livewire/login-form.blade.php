<div>
    <div class="login-page bk-img">
    <div class="form-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
                    <div class="well row pt-2x pb-3x bk-light">
                        <div class="col-md-8 col-md-offset-2">
                            <form wire:submit.prevent="login">
                                {{-- Email --}}
                                <label for="email" class="text-uppercase text-sm">Email</label>
                                <input type="email" placeholder="Email" name="email" id="email" wire:model="email"
                                       class="form-control mb">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- Password --}}
                                <label for="password" class="text-uppercase text-sm">Password</label>
                                <input type="password" placeholder="Password" name="password" id="password"
                                       wire:model="password" class="form-control mb">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- Submit --}}
                                <button class="btn btn-primary btn-block" type="submit">LOGIN</button>

                                {{-- Error Message --}}
                                @if (session()->has('error'))
                                    <div class="alert alert-danger padding-top-4" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
