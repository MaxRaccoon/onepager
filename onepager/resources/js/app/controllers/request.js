app.controller('requestController', ['$scope', 'dev4UService', '$http', 'API_URL',
    function($scope, dev4UService, $http, API_URL) {

        //retrieve employees listing from API
        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "requests/list"
            }).then(function (response){
                $scope.requests = response.data;
            },function (error){
                console.log(error);
            });
        };
        $scope.updateList();

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'request');
            }
        }
    }
]);