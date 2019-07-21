@extends('referral::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($bonuses->count())
            <div class="card">
                <div class="card-header">Direct Referral Bonuses</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Referable</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Earning Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bonuses as $key => $bonus)
                            <tr>
                                <td>{{ $bonus->referable->name }}</td>
                                <td>&#8369; {{ number_format($bonus->amount, 2) }}</td>
                                <td>{{ $bonus->created_at->toFormattedDateString() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-right" style="margin-top: 15px">
                {{ $bonuses->links() }}
            </div>
            @else
            <div class="alert alert-warning" role="alert">
                You don't have Direct Referral Bonuses.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection