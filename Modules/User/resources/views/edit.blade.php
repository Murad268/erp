@extends('layouts.app')

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">{{auth()->user()->name}}</h5>
                    <span>isci</span>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
                <div class="card col-span-2">
                    <div class="card-body">
                        @sessionMessages
                        <form method="post" action="{{route('user.update', auth()->user()->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-5" style="display: flex; column-gap: 10px; align-items: center"><span>email: {{auth()->user()->email}}</span>  <small><a href="{{route('new-email')}}" style="color: blue">emaili yenilə</a></small></div>

                            <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                                <div class="mb-3">
                                    <label for="inputText1" class="inline-block mb-2 text-base font-medium">Ad<span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="inputText1"
                                           name="name"
                                           value="{{auth()->user()->name}}"
                                           class="mb-3 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    >
                                    @error('name')
                                </div>
                            </div>
                            <button type="submit"
                                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Məlumatları yenilə
                            </button>
                        </form>
                        <div class="mt-3">
                            <form class="send_email" action="{{route('send_email_password_reset')}}">
                                @csrf
                                <input name="email" value="{{auth()->user()->email}}" type="hidden">
                                <input id="password-reset-button" type="submit" value="Şifrə yenilənməsi üçün sorğu göndər">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('password-reset-button').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Siz əminsiniz?',
                text: "Bu əməliyyat şifrəni yeniləmək üçün sizin elektron poçtunuza sorğü göndərəcək!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bəli, davam edin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('.send_email').submit();
                }
            });
        });
    </script>
@endpush
