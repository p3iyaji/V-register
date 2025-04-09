 
 <div>
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
                    <a href="{{ route('addUser') }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Add New User
                    </a>
                </div>
                <div class="card-body p-6">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="flex items-center gap-10">
                                            <div class="form-check style-check flex items-center">
                                                <input class="form-check-input rounded border input-form-dark" type="checkbox" name="checkbox"
                                                        id="selectAll">
                                            </div>
                                            #ID
                                        </div>
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-10">
                                            <div class="form-check style-check flex items-center">
                                                <input class="form-check-input rounded border border-neutral-400" type="checkbox" name="checkbox"
                                                        id="SL-1">
                                            </div>
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="grow">
                                                <span class="text-base mb-0 font-normal text-secondary-light">{{ $user->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-base mb-0 font-normal text-secondary-light">{{ $user->email }}</span></td>
                                   @if($user->department)
                                    <td>{{ $user->department->name }}</td>
                                    @else
                                    <td class="text-base mb-0 font-normal text-warning-600">Not Assigned</td>
                                    @endif
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td class="text-center">
                                        <span wire:click="changeStatus({{ $user->id }})" class="px-6 py-1.5 rounded-lg font-medium text-sm border 
                                                    {{ $user->is_active === 1 ? 'bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 border-success-600' : 'bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 border-danger-600' }}">
                                            {{ $user->is_active === 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center gap-3 justify-center">
                                            <a href="{{ route('viewProfile', $user->id) }}" type="button"
                                                    class="bg-info-100 dark:bg-info-600/25 hover:bg-info-200 text-info-600 dark:text-info-400 font-medium w-10 h-10 flex justify-center items-center rounded-full">
                                                <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                            </a>
                                            <a href="{{ route('editUser', $user->id) }}" type="button"
                                                    class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 bg-hover-success-200 font-medium w-10 h-10 flex justify-center items-center rounded-full">
                                                <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                            </a>
                                            <a type="button" href="{{ route('deleteUser', $user->id) }}"
                                                class="remove-item-btn bg-danger-100 dark:bg-danger-600/25 hover:bg-danger-200 text-danger-600 dark:text-danger-500 font-medium w-10 h-10 flex justify-center items-center rounded-full"
                                                onclick="confirmDelete(event, '{{ route('deleteUser', $user->id) }}')">
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
                        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
                    </span>
                    <ul class="pagination flex flex-wrap items-center gap-2 justify-center">
                        <!-- Pagination Elements -->
                        @foreach ($users->links()->elements[0] as $page => $url)
                            <li class="page-item {{ $users->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link {{ $users->currentPage() == $page ? 'bg-primary-600 text-white' : 'bg-neutral-300 dark:bg-neutral-600 text-secondary-light' }} font-semibold rounded-lg border-0 flex items-center justify-center h-8 w-8 text-base"
                                   href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
