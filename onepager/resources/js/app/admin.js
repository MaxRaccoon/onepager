var app = angular.module('dev4UManagement', ['ngPassword', 'ngFileUpload'],
                // по дефолту ангуляр конфликтует с blade, из-за общих тегов {{ }}
                // меняем теги на <% и %>
                function($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                })
                .constant('API_URL', '/admin/');

app.factory('dev4UService', function($http, API_URL) {
    return {
        defaultToggle: function(modalstate, id, entity, titles) {
            var controllerName = entity + 'Controller';
            angular.element('[ng-controller=' + controllerName + ']').scope().modalstate = modalstate;
            if (typeof titles == typeof undefined) {
                titles = [];
            }
            switch (modalstate) {
                case 'add':
                    if (typeof titles['add'] != typeof undefined) {
                        angular.element('[ng-controller=' + controllerName + ']').scope().form_title = titles['add'];
                    } else {
                        angular.element('[ng-controller=' + controllerName + ']').scope().form_title = "Добавить";
                    }
                    break;
                case 'edit':
                    if (typeof titles['edit'] != typeof undefined) {
                        angular.element('[ng-controller=' + controllerName + ']').scope().form_title = titles['edit'];
                    } else {
                        angular.element('[ng-controller=' + controllerName + ']').scope().form_title = "Редактирование";
                    }
                    angular.element('[ng-controller=' + controllerName + ']').scope().id = id;
                    $http({
                        method: 'GET',
                        url: API_URL + entity + '/' + id
                    }).then(function (response){
                        console.log(response.data);
                        angular.element('[ng-controller=' + controllerName + ']').scope()[entity] = response.data;
                    },function (error){
                        console.log(error);
                    });
                    break;
                default:
                    break;
            }
            $('#' + entity + 'Modal').modal('show');
        },

        defaultSave: function (modalstate, data, entity) {
            console.log(data);
            var controllerName = entity + 'Controller';
            var url = API_URL + entity;
            if (modalstate === 'edit'){
                url += "/" + data.id;
            }
            $http({
                method: 'POST',
                url: url,
                data: $.param(data),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': $('form[name="' + entity + 'Form"] input[name="_token"]').val()
                }
            }).then(function(response) {
                angular.element('[ng-controller=' + controllerName + ']').scope().updateList();
                $('#' + entity + 'Modal').modal('hide');
            },function (error){
                console.log(error);
            });
        },

        defaultDelete: function (id, entity) {
            var controllerName = entity + 'Controller';
            var url = API_URL + entity + "/" + id;
            console.log(url);
            $http({
                method: 'DELETE',
                url: url
            }).then(function(response) {
                angular.element('[ng-controller=' + controllerName + ']').scope().updateList();
            },function (error){
                console.log(error);
            });
        }
    };
});