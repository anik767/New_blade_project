<div class="w-full">
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">{{ $title ?? 'Form' }}</h2>
        </div>
        
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @if(isset($method))
                @method($method)
            @endif
            
            {{ $slot }}
            
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ $cancelUrl ?? url()->previous() }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ $submitText ?? 'Save' }}
                </button>
            </div>
        </form>
    </div>
</div> 