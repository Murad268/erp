@extends('layouts.app')

@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Məhsul yeniləyin</h5>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
            <div class="card col-span-2">
                <div class="card-body">
                    <form method="post" action="{{route('product.update', $product->id)}}">
                        @method('PATCH')
                        @csrf
                        <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                            <div class="mb-3">
                                <label for="inputText1" class="inline-block mb-2 text-base font-medium">Məhsulun adı<span class="text-red-500">*</span></label>
                                <input type="text" id="inputText1" name="title" value="{{old('title', $product->title)}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>
                        @error('title')
                        <div>
                            <label for="translate_value" class="inline-block mb-2 text-base font-medium">Açıqlama <span class="text-red-500">*</span></label>
                            <div class="mt-5 tab-content">
                                <div class="tab-pane" id="tab">
                                    <textarea name="description">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                            @error('description')
                        </div>

                        <div class="mt-5 grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                            <div class="mb-3">
                                <label for="inputText1" class="inline-block mb-2 text-base font-medium">Stok sayı<span class="text-red-500">*</span></label>
                                <input type="text" id="inputText1" name="stock_count" value="{{old('stock_count', $product->stock_count)}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>
                        @error('stock_count')
                        <div class="mt-5 grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                            <div class="mb-3">
                                <label for="inputText1" class="inline-block mb-2 text-base font-medium">Qiymət<span class="text-red-500">*</span></label>
                                <input type="text" id="inputText1" name="price" value="{{old('price', $product->price)}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            </div>
                        </div>
                        @error('price')
                        <div>
                            <div class="flex flex-wrap gap-3">
                                <div class="flex-1 min-w-[150px]">
                                    <label for="category" class="inline-block mb-2 text-base font-medium">Kateqoriya<span class="text-red-500">*</span></label>
                                    <select id="category_id" name="category_id" class="w-full py-3 pl-5 pr-8 form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 text-15">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @selected($category->id == old('category_id',$product->category_id))>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex-1 min-w-[150px]">
                                    <label for="supplier" class="inline-block mb-2 text-base font-medium">Tədarükçü<span class="text-red-500">*</span></label>
                                    <select id="supplier_id" name="supplier_id" class="w-full py-3 pl-5 pr-8 form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 text-15">
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}" @selected($supplier->id == old('supplier_id', $product->supplier_id))>{{$supplier->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="mt-3 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
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

@push('scripts')
<script>
    document.querySelectorAll('textarea').forEach((textarea) => {
        CKEDITOR.replace(textarea);
    });
</script>
@endpush
