@extends('layouts.app')

@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Sifarişlər </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="alternativePagination_wrapper" class="dataTables_wrapper dt-tailwindcss">
                    <div class="grid grid-cols-12 lg:grid-cols-12 gap-3">
                        <div class="self-center col-span-12 lg:col-span-6">
                            @sessionMessages
                            <div style="display: flex; column-gap: 10px" class="dataTables_length" id="alternativePagination_length">
                                <a href="{{route('order.create')}}" style="display: flex; justify-content: center; align-items: center; cursor: pointer" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Əlavə et</a>
                                <a data-link="/api/order/delete_selected_items" style="cursor: pointer" type="button" class="delete-all px-4 py-3 text-sm text-purple-500 border border-purple-200 rounded-md bg-purple-50 dark:bg-purple-400/20 dark:border-purple-500/50">
                                    Seçilənləri sil
                                </a>
                                <label>
                                </label>
                            </div>
                        </div>
                        <div class="self-center col-span-12 lg:col-span-6 lg:place-self-end">
                            <div id="alternativePagination_filter" class="dataTables_filter">

                                <form action="">
                                    <label>Axtar
                                        :

                                    </label>
                                    <input name="q" type="search" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 inline-block w-auto ml-2" placeholder="" value="{{$q}}" aria-controls="alternativePagination">
                                </form>
                            </div>
                        </div>
                        <div class="my-2 col-span-12 overflow-x-auto lg:col-span-12">
                            <table id="alternativePagination" class="display dataTable w-full text-sm align-middle whitespace-nowrap" style="width:100%" aria-describedby="alternativePagination_info">
                                <thead class="border-b border-slate-200 dark:border-zink-500">
                                    <tr>
                                        <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500 sorting_asc" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 270.867px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Seçim et
                                        </th>
                                        <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Sifariş kodu
                                        </th>
                                        <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Sifariş statusu
                                        </th>
                                        <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Ümumi qiymət
                                        </th>
                                        <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Müştəri adı
                                        </th>
                                        <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Müştəri elektron poçtu
                                        </th>
                                        <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Əməliyyatlar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr class="group-[.stripe]:even:bg-slate-50 group-[.stripe]:dark:even:bg-zink-600 transition-all duration-150 ease-linear group-[.hover]:hover:bg-slate-50 dark:group-[.hover]:hover:bg-zink-600 [&amp;.selected]:bg-custom-500 dark:[&amp;.selected]:bg-custom-500 [&amp;.selected]:text-custom-50 dark:[&amp;.selected]:text-custom-50">
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">
                                            @if(\App\Helpers\PermissionHelper::hasPermission(4, 7))
                                                <input data-id='{{$item->id}}' id="checkboxCircle2" class="select-item border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-green-500 checked:border-green-500 dark:checked:bg-green-500 dark:checked:border-green-500 checked:disabled:bg-green-400 checked:disabled:border-green-400" type="checkbox" value="">
                                            @endif
                                        </td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">
                                            {{ $item->order_code }}
                                        </td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">
                                            @if ($item->order_status == 1)
                                                <button type="button" class="bg-blue-100 border-dashed text-blue-500 btn border-blue-500 hover:text-blue-500 hover:bg-blue-50 hover:border-blue-600 focus:text-blue-600 focus:bg-blue-50 focus:border-blue-600 active:text-blue-600 active:bg-blue-50 active:border-blue-600 dark:bg-zink-700 dark:ring-blue-400/20 dark:hover:bg-blue-800/20 dark:focus:bg-blue-800/20 dark:active:bg-blue-800/20">gözləmədə</button>
                                            @elseif ($item->order_status == 2)
                                                <button type="button" class="bg-yellow-100 border-dashed text-yellow-500 btn border-yellow-500 hover:text-yellow-500 hover:bg-yellow-50 hover:border-yellow-600 focus:text-yellow-600 focus:bg-yellow-50 focus:border-yellow-600 active:text-yellow-600 active:bg-yellow-50 active:border-yellow-600 dark:bg-zink-700 dark:ring-yellow-400/20 dark:hover:bg-yellow-800/20 dark:focus:bg-yellow-800/20 dark:active:bg-yellow-800/20">yerinə yetirilir</button>
                                            @elseif ($item->order_status == 3)
                                                <button type="button" class="bg-green-100 border-dashed text-green-500 btn border-green-500 hover:text-green-500 hover:bg-green-50 hover:border-green-600 focus:text-green-600 focus:bg-green-50 focus:border-green-600 active:text-green-600 active:bg-green-50 active:border-green-600 dark:bg-zink-700 dark:ring-green-400/20 dark:hover:bg-green-800/20 dark:focus:bg-green-800/20 dark:active:bg-green-800/20">tamamlandı</button>
                                            @elseif ($item->order_status == 4)
                                                <button type="button" class="bg-red-100 border-dashed text-red-500 btn border-red-500 hover:text-red-500 hover:bg-red-50 hover:border-red-600 focus:text-red-600 focus:bg-red-50 focus:border-red-600 active:text-red-600 active:bg-red-50 active:border-red-600 dark:bg-zink-700 dark:ring-red-400/20 dark:hover:bg-red-800/20 dark:focus:bg-red-800/20 dark:active:bg-red-800/20">ləğv edildi</button>
                                            @endif
                                        </td>

                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">
                                            {{ array_sum($item->products->pluck('price')->toArray()) }} AZN
                                        </td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">
                                            {{ $item->customer_name }}
                                        </td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">
                                            {{ $item->customer_email }}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('order.edit', $item->id)}}" class="btn btn-phoenix-success me-1 mb-1" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen">
                                                        <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                        <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                    </svg>
                                                </a>
                                                <a href="{{route('order.orderList', $item->id)}}" class="btn btn-phoenix-success me-1 mb-1" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                        <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm0 2c0-.55-.45-1-1-1s-1 .45-1 1 .45 1 1 1 1-.45 1-1zm10-2c-1.1 0-1.99.9-1.99 2S15.9 22 17 22s2-.9 2-2-.9-2-2-2zm0 2c0-.55-.45-1-1-1s-1 .45-1 1 .45 1 1 1 1-.45 1-1zM5 4h2l1.6 3.59L9.27 9H16a1 1 0 0 1 .99 1.14l-1.15 6.14A2 2 0 0 1 14 18H8a2 2 0 0 1-1.85-1.3L4 4H3a1 1 0 0 1 0-2h2zm1.24 4l.38 2h8.52l1-5H8.27z"/>
                                                    </svg>
                                                </a>
                                            </div>
                        </div>
                        </td>
                        </tr>
                        @endforeach

                        </tbody>

                        </table>
                    </div>
                    <div class="self-center col-span-12 lg:place-self-end lg:col-span-12">
                        {{ $items->appends(['q' => request()->query('q')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div><!--end card-->
</div>
<!-- container-fluid -->
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
    let selectedItems = [];
    document.querySelectorAll('.select-item').forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            const id = e.target.getAttribute('data-id');
            if (e.target.checked) {

                if (!selectedItems.includes(id)) {
                    selectedItems.push(id);
                }
            } else {
                const index = selectedItems.indexOf(id);
                if (index > -1) {
                    selectedItems.splice(index, 1);
                }
            }
        });
    });

    document.querySelector('.delete-all').addEventListener('click', (e) => {
        e.preventDefault();

        const url = e.target.getAttribute('data-link');
        if (selectedItems.length > 0) {
            Swal.fire({
                title: 'Məlumatları silmək istəyirsiz?',
                showCancelButton: true,
                confirmButtonText: 'bəli',
                cancelButtonText: 'xeyr',
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                ids: selectedItems
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire(data.message, "", "success").then(() => {
                                location.reload();
                            });
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error', "", "error");
                        });
                }
            });
        } else {
            Swal.fire('Heç bir məlumat seçilməyib', "", "info");
        }
    });
</script>


@endpush
