@extends('layouts.pages-layout')
@section('pageTitle', isset($pageTile)? $pageTile: 'home')
@section('content')

<table class="table">
    <thead>
    <tr>
        <th scope="col">Class</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Default</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-primary">
        <th scope="row">Primary</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-secondary">
        <th scope="row">Secondary</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-success">
        <th scope="row">Success</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-danger">
        <th scope="row">Danger</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-warning">
        <th scope="row">Warning</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-info">
        <th scope="row">Info</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-light">
        <th scope="row">Light</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    <tr class="table-dark">
        <th scope="row">Dark</th>
        <td>Cell</td>
        <td>Cell</td>
    </tr>
    </tbody>
</table>







@endsection
