@extends('../HeadBar')

@section('title', 'Tools list')


@section('bar')


@section('pageContent')
    <div class="main-container">
        <form method="GET" action="{{ route('tools.index') }}">
            <label for="price-greater-than">Prix supérieur à : </label>
            <input type="number" id="price_higher_than" name="price_higher_than">
        </form>

        <table class="table-auto">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($tools as $tool)

                <tr>
                    <td>{{$tool->name}}</td>
                    <td>{{$tool->description}}</td>
                    <td>{{$tool->price}}</td>
                    <td><a href="{{ route('tools.show', $tool->id) }}">Details</a></td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection