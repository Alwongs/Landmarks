<ol class="breadcrumb">
    <li class="active breadcrumb-item"><a href="{{ route('welcom') }}">{{$home}}</a></li>
    <li class="active breadcrumb-item"><a href="{{ route('cities', $countrySlug) }}">{{$country}}</a></li>
    @isset($city)
    <li class="active breadcrumb-item"><a href="{{ route('places', $citySlug) }}">{{$city}}</a></li>
    @endisset
    @isset($place)
    <li class="active breadcrumb-item">{{$place}}</li>
    @endisset
</ol>