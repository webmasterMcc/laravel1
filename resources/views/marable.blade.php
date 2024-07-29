{{ $marable }}
<!--{{ $wpterms }}-->
{{ $testview }}



@php
    $dataArray = json_decode($wpterms); // Convert JSON to PHP array
  // echo  gettype($wpterms);
@endphp


<x-nav_menu></x-nav_menu>
    
    <!--@dump($dataArray)-->

<!--@dump($wpterms)-->

   @if($wpterms->isNotEmpty())
        <ul>
            <!--take(10) this command create a limit -->
            @foreach($wpterms->take(5) as $term)
                <li>
                    <strong>ID:</strong> {{ $term->term_id }}<br>
                    <strong>Name:</strong> {{ $term->name }}<br>
                    <strong>Slug:</strong> {{ $term->slug }}<br>
                    <strong>Term Group:</strong> {{ $term->term_group }}<br>
                    <strong>Term Order:</strong> {{ $term->term_order }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No terms found.</p>
    @endif

    


