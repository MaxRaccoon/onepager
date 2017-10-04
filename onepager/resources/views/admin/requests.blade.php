@extends('layouts.dashboard')

@section('page_heading')
    Запросы
@endsection

@section('section')
    <div  ng-controller="requestController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Дата и место рождения</th>
                <th>Индекс</th>
                <th>Телефон</th>
                <th>E-mail</th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="request in requests">
                <td><% request.id %></td>
                <td><% request.name %></td>
                <td><% request.dt_born %> <% request.place_born %></td>
                <td><% request.post_address %></td>
                <td><% request.phone %></td>
                <td><% request.email %></td>
                <td>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(request.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection