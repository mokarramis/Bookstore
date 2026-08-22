@include('master')

@foreach ($colors as $item)

   @json($colors): {{ $item }}
@endforeach