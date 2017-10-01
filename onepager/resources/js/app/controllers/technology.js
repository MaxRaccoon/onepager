app.controller('technologyController', ['$scope', 'dev4UService', '$http', 'API_URL',
    function($scope, dev4UService, $http, API_URL) {

        //retrieve employees listing from API
        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "technologies/list"
            }).then(function (response){
                $scope.technologies = response.data;
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
                'technology',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            dev4UService.defaultSave(modalstate, $scope.technology, 'technology');
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'technology');
            }
        }
    }
]);