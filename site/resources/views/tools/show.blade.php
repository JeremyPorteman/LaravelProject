@extends('../HeadBar')

@section('title', "Tool's detail")


@section('bar')


@section('pageContent')
<div class="main-container">
    <table class="table-auto">
        <thead>
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$tool->name}}</td>
                <td>{{$tool->description}}</td>
                <td>{{$tool->price}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection