<div class="col-span-12 2xl:col-span-12 mt-8">
    <div class="grid grid-cols-2 gap-3 w-full text-2xl">  <!-- Changed to grid layout -->
      
        <button 
            wire:click="$dispatch('toggleSearch')"
            class="btn btn-default bg-purple-600 dark:bg-purple-800 hover:bg-purple-400 dark:hover:bg-purple-900 text-white w-full text-center"  
            :class="{ 'bg-purple-400 dark:bg-purple-600': $wire.showSearch }"
        >
            Pre-Registered Visitor
        </button>
      
        <a 
            href="{{ route('addVisitor') }}" 
            class="btn btn-primary bg-primary-600 dark:bg-primary-800 text-white w-full text-center" 
        >
            Walk-in Visitor
        </a>
    </div>

    @if($showSearch)
        <div class="mt-4 text-2xl">
            <input 
                type="text" 
                class="form-control w-full text-center text-2xl" 
                placeholder="Enter name/national_id_no/email/phone to search"
                wire:keydown.enter="searchVisitor" wire:model="search"
            >
            
        </div>
    @endif

    @if(count($searchResults) > 0)
    <div class="table-responsive scroll-sm">
        <table class="table bordered-table sm-table mb-0">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Expected Date</th>
                    <th scope="col">Expected Time</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($searchResults as $visitor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $visitor->created_at }}</td>
                    <td>{{ $visitor->first_name }} {{ $visitor->last_name }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>{{ $visitor->phone }}</td>
                    <td>{{ $visitor->expected_date }}</td>
                    <td>{{ $visitor->expected_time }}</td>
                    <td>{{ $visitor->check_in }}</td>
                    <td>{{ $visitor->check_out }}</td>
                    <td>{{ $visitor->employee_name }}</td>
                    <td class="text-center">
                        <div class="flex items-center gap-3 justify-center">
                            <a href="{{ route('viewVisitor', $visitor->id) }}" type="button"
                                class="btn btn-primary bg-primary-600 dark:bg-primary-800 text-white w-full text-center">
                                View & Checkin
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif       
</div>