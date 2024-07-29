<div>
<nav>
    <a href='/laravel1/public/' > welcome</a>
     <a href='/laravel1/public/data' >data</a>
      <a href='/laravel1/public/datashow' > datashow</a>
       <a href='/laravel1/public/marable' > marable</a>
</nav>
</div>
<div>
    {{$slot}}
</div>

  {{ request()->url() }}
  {{  url()->current() }}