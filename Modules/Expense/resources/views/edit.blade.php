@extends('layouts.app')

@section('content')
    <div class="container-fluid mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Xərci yeniləyin</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('expense.update', $expense->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                        <div class="mb-3">
                            <label for="description" class="inline-block mb-2 text-base font-medium">Təsvir<span class="text-red-500">*</span></label>
                            <input type="text" id="description" name="description" value="{{old('description', $expense->description)}}" class="form-input border-slate-200">
                            @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="inline-block mb-2 text-base font-medium">Məbləğ<span class="text-red-500">*</span></label>
                            <input type="number" step="0.01" id="amount" name="amount" value="{{old('amount', $expense->amount)}}" class="form-input border-slate-200">
                            @error('amount')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date" class="inline-block mb-2 text-base font-medium">Tarix<span class="text-red-500">*</span></label>
                            <input type="date" id="date" name="date" value="{{old('date', $expense->date)}}" class="form-input border-slate-200">
                            @error('date')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn bg-custom-500 text-white">Yenilə</button>
                </form>
            </div>
        </div>
    </div>
@endsection
