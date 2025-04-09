<div class="visitor-card bg-white rounded-lg overflow-hidden shadow-md" style="width: 85mm; min-height: 120mm;">
    <div class="bg-blue-600 text-white p-2 text-center font-bold text-sm">
        VISITOR PASS
    </div>
    <div class="p-3 flex flex-col items-center text-center">
        <!-- Photo Section -->
        @if($visitor->image)
            <img src="{{ asset('storage/'.$visitor->image) }}" alt="Visitor Photo" 
                 class="w-24 h-24 rounded-full object-cover border-2 border-blue-500 mb-2">
        @else
        <div class="w-24 h-24 rounded-full bg-gray-200 border-2 border-blue-500 flex items-center justify-center mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full pb-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        @endif

        <!-- Text Section -->
        <div class="w-full">
            <h3 class="text-sm font-bold leading-tight text-gray-800 text-2xl mb-1 truncate">
                {{ $visitor->title }} {{ $visitor->first_name }} {{ $visitor->last_name }}
            </h3>
            <p class="text-xs text-gray-600 mb-2 truncate">{{ $visitor->company_name }}</p>

            <div class="text-xs text-gray-800 space-y-1">
                <div>
                    <span class="font-semibold">ID:</span>
                    <span>{{ $visitor->national_id_no }}</span>
                </div>
                <div>
                    <span class="font-semibold">Host:</span>
                    <span>{{ $visitor->employee->name ?? 'N/A' }}</span>
                </div>
                <div>
                    <span class="font-semibold">Date:</span>
                    <span>{{ $visitor->check_in }}</span>
                </div>
                <div>
                    <span class="font-semibold">Valid Until:</span>
                    <span>{{ now()->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-blue-600 text-white p-2 text-center font-bold text-xxs">
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
