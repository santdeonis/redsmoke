<div class="modal fade modal-signin py-5"
     tabindex="-1"
     role="dialog"
     id="loginModal"
     aria-hidden="true"
     aria-labelledby="loginModal"
>
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">{{ __('view/auth_modal.header') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="{{ route('web.auth.login') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control rounded-3"
                               id="username"
                               name="username"
                               placeholder="{{ __('view/auth_modal.username') }}"
                               required
                        >
                        <label for="username">{{ __('view/auth_modal.username') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password"
                               class="form-control rounded-3"
                               id="password"
                               name="password"
                               placeholder="{{ __('view/auth_modal.password') }}"
                               required
                        >
                        <label for="password">{{ __('view/auth_modal.password') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   value=""
                                   id="remember"
                                   name="remember"
                            >
                            <label class="form-check-label" for="remember">
                                {{ __('view/auth_modal.remember') }}
                            </label>
                        </div>
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary"
                            type="submit"
                    >{{ __('view/auth_modal.login_button') }}</button>
                </form>
                <a href="{{route('web.registration.index')}}" class="link-secondary">Регистрация</a>
            </div>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script>
            $(document).ready(function () {
                let shouldOpenModal = {{ request()->boolean('should_login') ? 'true' : 'false' }};

                if (shouldOpenModal) {
                    $('#loginModal').modal('show');
                }
            });
        </script>
    @endpush
@endonce
