app.controller('menuController', ['$scope', 'dev4UService', '$http', 'API_URL', '$timeout',
    function($scope, dev4UService, $http, API_URL, $timeout) {

        //retrieve employees listing from API
        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "menus/list"
            }).then(function (response){
                $scope.menus = response.data;
            },function (error){
                console.log(error);
            });
        };
        $scope.updateList();

        //show modal form
        $scope.toggle = function(modalstate, id) {
            dev4UService.defaultToggle(
                modalstate,
                id,
                'menu',
                {'add':'Добавить меню','edit':'Редактировать меню'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            dev4UService.defaultSave(modalstate, $scope.menu, 'menu');
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию меню?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'menu');
            }
        }
    }]);