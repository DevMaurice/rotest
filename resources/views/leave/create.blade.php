@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div class="card-body">
            <form method="POST" action="{{ route('leaves.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="date_from" class="col-md-4 col-form-label text-md-right">Date From</label>

                    <div class="col-md-6">
                        <input id="date_from" type="date" class="form-control{{ $errors->has('date_from') ? ' is-invalid' : '' }}" name="date_from" value="{{ old('date_from') }}" required autofocus>

                        @if ($errors->has('date_from'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_from') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_to" class="col-md-4 col-form-label text-md-right">Date To</label>

                    <div class="col-md-6">
                        <input id="date_to" type="date" class="form-control{{ $errors->has('date_to') ? ' is-invalid' : '' }}" name="date_to" value="{{ old('date_to') }}" required autofocus>

                        @if ($errors->has('date_to'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_to') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reason" class="col-md-4 col-form-label text-md-right">Reason</label>

                    <div class="col-md-6">
                        <input id="reason" type="text" class="form-control{{ $errors->has('reason') ? ' is-invalid' : '' }}" name="reason" value="{{ old('reason') }}" required autofocus>

                        @if ($errors->has('reason'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Request
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
