@extends('layouts.app')

@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Sifariş əlavə edin</h5>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
            <div class="card col-span-2">
                <div class="card-body">
                    <form method="post" action="{{ route('order.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                        
                            <div class="mb-3">
                                <label for="order_status" class="inline-block mb-2 text-base font-medium">Sifariş statusu<span class="text-red-500">*</span></label>
                                <select id="order_status" name="order_status" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                    <option value="1" {{ old('order_status') == 1 ? 'selected' : '' }}>gözləmədə</option>
                                    <option value="2" {{ old('order_status') == 2 ? 'selected' : '' }}>yerinə yetirilir</option>
                                    <option value="3" {{ old('order_status') == 3 ? 'selected' : '' }}>tamamlandı</option>
                                    <option value="4" {{ old('order_status') == 4 ? 'selected' : '' }}>ləğv edildi</option>
                                </select>
                                @error('order_status')

                            </div>
                            <div class="mb-3">
                                <label for="customer_name" class="inline-block mb-2 text-base font-medium">Müştərinin adı<span class="text-red-500">*</span></label>
                                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('customer_name')

                            </div>
                            <div class="mb-3">
                                <label for="customer_surname" class="inline-block mb-2 text-base font-medium">Müştərinin soyadı<span class="text-red-500">*</span></label>
                                <input type="text" id="customer_surname" name="customer_surname" value="{{ old('customer_surname') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('customer_surname')

                            </div>
                            <div class="mb-3">
                                <label for="customer_email" class="inline-block mb-2 text-base font-medium">Müştərinin emaili<span class="text-red-500">*</span></label>
                                <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('customer_email')

                            </div>
                            <div class="mb-3">
                                <label for="phone" class="inline-block mb-2 text-base font-medium">Telefon nömrəsi<span class="text-red-500">*</span></label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                @error('phone')

                            </div>
                            <div class="mb-3">
                                <label for="address" class="inline-block mb-2 text-base font-medium">Ünvan<span class="text-red-500">*</span></label>
                                <textarea id="address" name="address" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">{{ old('address') }}</textarea>
                                @error('address')

                            </div>
                        </div>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
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
