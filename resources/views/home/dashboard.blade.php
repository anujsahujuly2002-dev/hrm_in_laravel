@extends('layouts.main')
@section('content')
@livewire('home.dashboard')
@endsection
@section('css')
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
.hide {display: none;}
</style>
@endsection
@section('js')
<script>
function hide() {
  document.getElementById("myDropdown").classList.toggle("hide");
}
function findP() {
  Livewire.emit('findP');
}
</script>
@endsection

