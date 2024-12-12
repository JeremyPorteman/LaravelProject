@extends('../HeadBar')

@section('title', 'Invoices list')


@section('bar')


@section('pageContent')
    <div class="main-container">
        <table class="table-auto">
            <thead>
                <tr>
                    <td>Id Client</td>
                    <td>Id Purchase Order</td>
                    <td>Total Amount</td>
                    <td>Before Tax</td>
                    <td>Tax</td>
                    <td>Send At</td>
                    <td>Acquitted At</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)

                <tr>
                    <td>{{$invoice->client_id}}</td>
                    <td>{{$invoice->purchase_order_id}}</td>
                    <td>{{$invoice->total_amount}}</td>
                    <td>{{$invoice->amount_before_tax}}</td>
                    <td>{{$invoice->tax}}</td>
                    <td>{{$invoice->send_at}}</td>
                    <td>{{$invoice->acquitted_at}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $invoices->links() }}
        </div>
    </div>
@endsection