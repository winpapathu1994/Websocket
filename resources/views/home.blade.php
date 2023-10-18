@extends('layouts.app')
@push('scripts')

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
@endpush
@section('content')

<!-- <example-component /> -->
    <center>
<div class="col-md-8">

    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
    </tr>
</table>

</div>
</center>
@endsection
