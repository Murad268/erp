@extends('layouts.app')

@section('content')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Maliyyə Hesabatları</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="alternativePagination_wrapper" class="dataTables_wrapper dt-tailwindcss">
                        <div class="grid grid-cols-12 lg:grid-cols-12 gap-3">
                            <div class="self-center col-span-12 lg:col-span-6">
                                @sessionMessages

                            </div>
                            <div class="self-center col-span-12 lg:col-span-6 lg:place-self-end">

                            </div>
                            <div class="my-2 col-span-12 overflow-x-auto lg:col-span-12">
                                <table id="alternativePagination" class="display dataTable w-full text-sm align-middle whitespace-nowrap" style="width:100%" aria-describedby="alternativePagination_info">
                                    <thead class="border-b border-slate-200">
                                    <tr>
                                        <th class="p-3 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Tarix</th>
                                        <th class="p-3 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Gəlir</th>
                                        <th class="p-3 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Xərc</th>
                                        <th class="p-3 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left" tabindex="0" aria-controls="alternativePagination" rowspan="1" colspan="1" style="width: 415.15px;" aria-label="Position: activate to sort column ascending">Balans</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports as $report)
                                        <tr class="transition-all duration-150 ease-linear hover:bg-slate-50">

                                            <td class="p-3 sorting_1">{{ $report->date }}</td>
                                            <td class="p-3 sorting_1">{{ $report->income }}</td>
                                            <td class="p-3 sorting_1">{{ $report->expense }}</td>
                                            <td class="p-3 sorting_1">{{ $report->balance }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="self-center col-span-12 lg:place-self-end lg:col-span-12">

                            </div>
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
                    confirmButtonText: 'Bəli',
                    cancelButtonText: 'Xeyr',
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
                                Swal.fire(data.success, "", "success").then(() => {
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
