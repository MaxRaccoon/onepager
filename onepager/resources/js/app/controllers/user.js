app.controller('userController', ['$scope', 'dev4UService', '$http', 'API_URL', '$timeout',
    function($scope, dev4UService, $http, API_URL, $timeout) {

    //retrieve employees listing from API
    $scope.updateList = function () {
        $http({
            method: 'GET',
            url: API_URL + "users/list"
        }).then(function (response){
            $scope.users = response.data;
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
            'user',
            {'add':'Добавить пользователя','edit':'Редактировать пользователя'}
        );
    };

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        dev4UService.defaultSave(modalstate, $scope.user, 'user');
    };

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Удалить пользователя?');
        if (isConfirmDelete) {
            dev4UService.defaultDelete(id, 'user');
        }
    }
}]);