<x-layout>
    <x-slot:heading>
       steps calculator
    </x-slot:heading>

   <div class="w-full md:w-auto">
        <div class="relative isolate bg-white">
            <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
                <form action="{{ route('stepCalculator') }}"  method="POST" class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48">
                    @csrf
                    <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <div>
                                <x-input name="steps" id="steps"  Label="steps"  placeholder='steps' type='number'  class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                        </div>
                        <div class="mt-8 flex">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                calculate steps
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                @if(session('data'))
                {{-- <p>Data: {{ print_r(session('data')) }}</p> --}}
                <p>Total Steps: {{ session('totalSteps') }} Km</p>
            @endif
     
   </div>
</x-layout>