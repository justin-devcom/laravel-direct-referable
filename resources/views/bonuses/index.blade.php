@extends('referral::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @if ($bonuses->count())
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                </div>
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