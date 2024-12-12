@extends('../HeadBar')

@section('title', 'Logs list')


@section('bar')


@section('pageContent')
    <div class="main-container">
        <table class="table-auto">
            <thead>
                <tr>
                    <td>Request</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)

                <tr>
                    <td>{{$log->request}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $logs->links() }}
        </div>
    </div>
@endsection