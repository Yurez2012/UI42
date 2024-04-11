<ul>
    @foreach($cities as $city)
        <li>
            <a href="{{ route('city.show', ['city' => $city->id]) }}">{{$city->name}}</a>
        </li>
    @endforeach
</ul>
