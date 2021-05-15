@php
    $errorClasses = 'text-red-700 bg-red-200';
    $successClasses = 'text-green-600 bg-green-200';
@endphp

@if (session('status'))

    <div x-data="{ show: true }">

        <div x-show="show">
            
            <div class="px-2 py-1.5 text-sm {{ (session('status')['type'] == 'success' ? $successClasses : $errorClasses) }}">
                
                <div class="container flex items-center justify-between mx-auto font-semibold leading-none">
                    
                    <p>{{ (string) session('status')['message'] }}</p>

                    <button x-on:click="show = false" class="p-1 leading-none rounded focus:ring-1 focus:bg-green-100 focus:outline-none focus:ring-offset-transparent focus:ring-offset-2 focus:ring-green-700">
                        <x-icon-x class="w-5 h-5" />
                    </button>                    

                </div>

            </div>
        
        </div>

    </div>

@endif
    


