@extends('layouts.app')	
	
@push('sidebar')	
	@include("libressltd.lbsidemenu.sidemenu")
@endpush	
	
@push('css')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('public/fontawesome-picker/css/fontawesome-iconpicker.css')}}">	
<style type="text/css">	
.note-error {	
	color: #b94a48;
}	
</style>	
@endpush
@push('script')	
	<script src="{{asset('public/fontawesome-picker/js/fontawesome-iconpicker.js')}}"></script>
@endpush	

