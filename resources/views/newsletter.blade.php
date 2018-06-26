@extends('layouts.layout')

@section('content')
<div class="newsletter-container">
	@if($status == 'success')
	<div class="newsletter-info col-md-12">Thank you for registering to our newsletter.</div>
	@else
	<div class="newsletter-info col-md-12">Email <span>{{ $email }}</span> was already registered to our newsletter.</div>
	@endif
</div>
@endsection

@section('footer')
@endsection
