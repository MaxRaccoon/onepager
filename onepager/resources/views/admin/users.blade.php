@extends('layouts.dashboard')

@section('page_heading')
    Список пользователей
@endsection

@section('section')
    <div  ng-controller="userController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Дата</th>
                    <th>
                        <button id="btn-add" class="btn btn-primary btn-xs"
                                ng-click="toggle('add', 0)">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Добавить нового
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
            <tr ng-repeat="user in users">
                <td><% user.id %></td>
                <td><% user.name %></td>
                <td><% user.email %></td>
                <td><% user.created_at %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', user.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(user.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', ['entity' => 'user', 'form' => 'user'])

    </div>
@endsection