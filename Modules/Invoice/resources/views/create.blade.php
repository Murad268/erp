@extends('layouts.app')

@section('content')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Faktura əlavə edin</h5>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
                <div class="card col-span-2">
                    <div class="card-body">
                        <form method="post" action="{{route('invoice.store')}}">
                            @csrf
                            <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                                <div class="mb-3">
                                    <label for="invoice_number" class="inline-block mb-2 text-base font-medium">Faktura nömrəsi<span class="text-red-500">*</span></label>
                                    <input type="text" id="invoice_number" name="invoice_number" value="{{old('invoice_number')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('invoice_number')

                                </div>
                                <div class="mb-3">
                                    <label for="invoice_date" class="inline-block mb-2 text-base font-medium">Faktura tarixi<span class="text-red-500">*</span></label>
                                    <input type="date" id="invoice_date" name="invoice_date" value="{{old('invoice_date')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('invoice_date')

                                </div>
                                <div class="mb-3">
                                    <label for="seller_name" class="inline-block mb-2 text-base font-medium">Satıcı adı<span class="text-red-500">*</span></label>
                                    <input type="text" id="seller_name" name="seller_name" value="{{old('seller_name')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('seller_name')

                                </div>
                                <div class="mb-3">
                                    <label for="seller_address" class="inline-block mb-2 text-base font-medium">Satıcı ünvanı<span class="text-red-500">*</span></label>
                                    <input type="text" id="seller_address" name="seller_address" value="{{old('seller_address')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('seller_address')

                                </div>
                                <div class="mb-3">
                                    <label for="buyer_name" class="inline-block mb-2 text-base font-medium">Alıcı adı<span class="text-red-500">*</span></label>
                                    <input type="text" id="buyer_name" name="buyer_name" value="{{old('buyer_name')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('buyer_name')

                                </div>
                                <div class="mb-3">
                                    <label for="buyer_address" class="inline-block mb-2 text-base font-medium">Alıcı ünvanı<span class="text-red-500">*</span></label>
                                    <input type="text" id="buyer_address" name="buyer_address" value="{{old('buyer_address')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('buyer_address')

                                </div>
                                <div class="mb-3">
                                    <label for="total_amount" class="inline-block mb-2 text-base font-medium">Ümumi məbləğ<span class="text-red-500">*</span></label>
                                    <input type="text" id="total_amount" name="total_amount" value="{{old('total_amount')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('total_amount')

                                </div>
                                <div class="mb-3">
                                    <label for="tax_rate" class="inline-block mb-2 text-base font-medium">Vergi dərəcəsi<span class="text-red-500">*</span></label>
                                    <input type="text" id="tax_rate" name="tax_rate" value="{{old('tax_rate')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('tax_rate')

                                </div>
                                <div class="mb-3">
                                    <label for="tax_amount" class="inline-block mb-2 text-base font-medium">Vergi məbləği<span class="text-red-500">*</span></label>
                                    <input type="text" id="tax_amount" name="tax_amount" value="{{old('tax_amount')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('tax_amount')

                                </div>
                                <div class="mb-3">
                                    <label for="grand_total" class="inline-block mb-2 text-base font-medium">Ümumi cəm<span class="text-red-500">*</span></label>
                                    <input type="text" id="grand_total" name="grand_total" value="{{old('grand_total')}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    @error('grand_total')

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
