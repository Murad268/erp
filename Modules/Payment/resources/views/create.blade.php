@extends('layouts.app')

@section('content')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Ödəniş əlavə edin</h5>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
                <div class="card col-span-2">
                    <div class="card-body">
                        <form method="post" action="{{ route('payment.store') }}">
                            @csrf
                            <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                                <div class="mb-3">
                                    <label for="payment_number" class="inline-block mb-2 text-base font-medium">Ödəniş Nömrəsi<span class="text-red-500">*</span></label>
                                    <input type="text" id="payment_number" name="payment_number" value="{{ old('payment_number') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('payment_number')

                                </div>
                                <div class="mb-3">
                                    <label for="payment_date" class="inline-block mb-2 text-base font-medium">Ödəniş Tarixi<span class="text-red-500">*</span></label>
                                    <input type="date" id="payment_date" name="payment_date" value="{{ old('payment_date') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('payment_date')

                                </div>
                                <div class="mb-3">
                                    <label for="payer_name" class="inline-block mb-2 text-base font-medium">Ödəyici Adı<span class="text-red-500">*</span></label>
                                    <input type="text" id="payer_name" name="payer_name" value="{{ old('payer_name') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('payer_name')

                                </div>
                                <div class="mb-3">
                                    <label for="payer_address" class="inline-block mb-2 text-base font-medium">Ödəyici Ünvanı<span class="text-red-500">*</span></label>
                                    <input type="text" id="payer_address" name="payer_address" value="{{ old('payer_address') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('payer_address')

                                </div>
                                <div class="mb-3">
                                    <label for="receiver_name" class="inline-block mb-2 text-base font-medium">Qəbul Edən Adı<span class="text-red-500">*</span></label>
                                    <input type="text" id="receiver_name" name="receiver_name" value="{{ old('receiver_name') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('receiver_name')

                                </div>
                                <div class="mb-3">
                                    <label for="receiver_address" class="inline-block mb-2 text-base font-medium">Qəbul Edən Ünvanı<span class="text-red-500">*</span></label>
                                    <input type="text" id="receiver_address" name="receiver_address" value="{{ old('receiver_address') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('receiver_address')

                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="inline-block mb-2 text-base font-medium">Məbləğ<span class="text-red-500">*</span></label>
                                    <input type="number" step="0.01" id="amount" name="amount" value="{{ old('amount') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('amount')

                                </div>
                            </div>
                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 focus:text-white focus:bg-custom-600">
                                Əlavə et
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
