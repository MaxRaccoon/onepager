@extends('layouts.dashboard')

@section('page_heading')
    Данные лэндинга
@endsection

@section('section')
    <div  ng-controller="landingController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ключ</th>
                <th>Описние</th>
                <th>Значение</th>
                <th>
                    <button id="btn-add" class="btn btn-primary btn-xs"
                            ng-click="toggle('add', 0)">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="landingData in landingListData">
                <td><% landingData.id %></td>
                <td><% landingData['key_name'] %></td>
                <td><% landingData.description %></td>
                <td><% landingData['key_value'] %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', landingData.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    {{--<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(user.id)">--}}
                        {{--<i class="fa fa-ban" aria-hidden="true"></i>--}}
                    {{--</button>--}}
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', ['entity' => 'landing', 'form' => 'landing'])

    </div>
@endsection