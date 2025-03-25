<div> <!-- Root HTML tag -->
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                    <div class="flex items-center flex-wrap gap-3">
                        <span class="text-base font-medium text-secondary-light mb-0">Show</span>
                        <select wire:model="perPage" class="form-select form-select-sm w-auto dark:bg-neutral-600 dark:text-white border-neutral-200 dark:border-neutral-500 rounded-lg">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <div class="navbar-search">
                            <input 
                                type="text" 
                                wire:model="search"
                                wire:keydown.debounce.300ms="mySearch"
                                class="bg-white dark:bg-neutral-700 h-10 w-auto" 
                                placeholder="Search"
                            >
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </div>
                    </div>
                    <a href="{{ route('addVisitor') }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Add New Visitor now
                    </a>
                </div>
                <div class="card-body p-6">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Check-in</th>
                                    <th scope="col">Check-out</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitors as $visitor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $visitor->created_at }}</td>
                                    <td>{{ $visitor->first_name }}</td>
                                    <td>{{ $visitor->last_name }}</td>
                                    <td>{{ $visitor->check_in }}</td>
                                    <td>{{ $visitor->check_out }}</td>
                                    <td>{{ $visitor->email }}</td>
                                    <td>{{ $visitor->phone }}</td>
                                    <td class="text-center">
                                        <div class="flex items-center gap-3 justify-center">
                                            <a href="{{ route('viewVisitor', $visitor->id) }}" type="button"
                                                class="bg-info-100 dark:bg-info-600/25 hover:bg-info-200 text-info-600 dark:text-info-400 font-medium w-10 h-10 flex justify-center items-center rounded-full">
                                                <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                            </a>
                                            <a type="button" href="{{ route('editVisitor', $visitor->id) }}"
                                                class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 bg-hover-success-200 font-medium w-10 h-10 flex justify-center items-center rounded-full">
                                                <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                            </a>
                                            <a type="button" href="{{ route('deleteVisitor', $visitor->id) }}"
                                                class="remove-item-btn bg-danger-100 dark:bg-danger-600/25 hover:bg-danger-200 text-danger-600 dark:text-danger-500 font-medium w-10 h-10 flex justify-center items-center rounded-full"
                                                onclick="confirmDelete(event, '{{ route('deleteVisitor', $visitor->id) }}')">
                                                <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex items-center justify-between flex-wrap gap-2 mt-6">
                        <span>
                            Showing {{ $visitors->firstItem() }} to {{ $visitors->lastItem() }} of {{ $visitors->total() }} entries
                        </span>
                        {{ $visitors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End of root HTML tag -->