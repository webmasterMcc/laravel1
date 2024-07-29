   <x-nav_menu></x-nav_menu>
 @if (@isset($id))
 {{ $myLanguages[$id] }} {{$id}} 
 @else
    <p>datashow</p>
 @endif