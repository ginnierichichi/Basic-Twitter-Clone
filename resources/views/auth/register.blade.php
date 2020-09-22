<x-master>

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

    <div class="container mx-auto flex justify-center">
        <div class="rounded-lg px-5 pr-20 py-10 bg-gray-300 border border-gray-500">
            <div class="col-md-8">

                <div class="font-weight-bold text-center text-gray-700 text-lg mb-4 ml-10">{{ __('Register') }}</div>

                    <form method="POST" action="{{ route('register') }}" class="m-10 p-5 w-full">
                        @csrf

                        <div class="form-group row mb-4 pr-5">
                            <label for="username" class="w-full col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6 mt-2">
                                <input id="username" type="text" class="w-full form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pr-5 mb-4 ">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6 mt-2">
                                <input id="name" type="text" class="w-full form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pr-5 mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 mt-2">
                                <input id="email" type="email" class="w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row pr-5 mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 mt-2">
                                <input id="password" type="password" class="w-full form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-6 pr-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6 mt-2">
                                <input id="password-confirm" type="password" class="w-full form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="px-4 py-2 text-sm text-uppercase bg-blue-400 rounded text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>

</x-master>
