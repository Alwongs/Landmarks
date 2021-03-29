<ol class="breadcrumb mb-2">
    <li class="active breadcrumb-item"><a href="{{ route('welcom') }}">{{$home}}</a></li>
    @isset($city)
    <li class="active breadcrumb-item"><a href="{{ route('cities', $countrySlug) }}">{{$country}}</a></li>
    @else
    <li class="active breadcrumb-item">{{$country}}</li>
    @endisset




    @isset($city)
    @isset($place)
    <li class="active breadcrumb-item"><a href="{{ route('places', $citySlug) }}">{{$city}}</a></li>
    @else
    <li class="active breadcrumb-item">{{$city}}</li>
    @endisset
    @endisset
    @isset($place)
    <li class="active breadcrumb-item">{{$place}}</li>
    @endisset
</ol>