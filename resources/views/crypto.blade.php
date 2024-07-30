<x-layout>
    <x-slot:heading>
        About Page
    </x-slot:heading>

    @isset($data->name)
    {{$data->name}}
    <script src="{{ asset('js/coinGeccko.js') }}" defer></script>
    @endisset
    
     
    
     
    
    
    @foreach ($data as $key => $val)
    @if (is_array($val))
    <p class="bg-emerald-600 my-2">{{ $val['title'] }}</p>
    @else
    <p>Data is not an array. {{$key}}</p>
    @endif
    @endforeach
</x-layout>



