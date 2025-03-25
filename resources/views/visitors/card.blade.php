<div class="visitor-card bg-white rounded-lg overflow-hidden shadow-md" style="width: 85mm; min-height: 120mm;">
    <div class="bg-blue-600 text-white p-2 text-center font-bold text-sm">
        VISITOR PASS
    </div>
    <div class="p-3 flex flex-nowrap">
        <!-- Photo Section -->
        <div class="flex-shrink-0 mr-3">
            @if($visitor->image)
                <img src="{{ asset('storage/'.$visitor->image) }}" alt="Visitor Photo" 
                     class="w-20 h-20 rounded-full object-cover border-2 border-blue-500">
            @else
                <div class="w-20 h-20 rounded-full bg-gray-200 border-2 border-blue-500 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            @endif
            <hr class="my-2 mb-2"  />
            
            <div class="flex-grow overflow-hidden">
            <h3 class="text-sm font-bold leading-tight truncate text-center text-2xl">
                {{ $visitor->title }} {{ $visitor->first_name }} {{ $visitor->last_name }}
            </h3>
            <p class="text-xs text-gray-600 mb-1 truncate text-center">{{ $visitor->company_name }}</p>
            
            <div class="text-xs space-y-1 text-1xl">
                <div class="flex justify-center">
                    <span class="font-semibold whitespace-nowrap">ID:</span>
                    <span class="text-right truncate pl-2">{{ $visitor->national_id_no }}</span>
                </div>
                <div class="flex justify-center">
                    <span class="font-semibold whitespace-nowrap">Host:</span>
                    <span class="text-right truncate pl-2">{{ $visitor->employee->name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-center">
                    <span class="font-semibold whitespace-nowrap">Date:</span>
                    <span class="text-right truncate pl-2">{{ $visitor->check_in }}</span>
                </div>
                <div class="flex justify-center">
                    <span class="font-semibold whitespace-nowrap">Valid Until:</span>
                    <span class="text-right truncate pl-2">{{ now()->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
        </div>
        
        <!-- Info Section -->
       
    </div>
    <div class="bg-gray-100 p-1 text-center text-xxs text-gray-600">
        Please wear this badge visibly at all times
    </div>
</div>

<style>
    .visitor-card {
        font-family: 'Arial', sans-serif;
        box-sizing: border-box;
        font-size: 10px;
    }
    .text-xxs {
        font-size: 0.7rem;
    }
    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    @media print {
        body, html {
            margin: 0 !important;
            padding: 0 !important;
            background: white !important;
            width: 85mm !important;
            height: 54mm !important;
        }
        .visitor-card {
            margin: 0 !important;
            box-shadow: none !important;
            width: 85mm !important;
            height: 54mm !important;
        }
    }
</style>