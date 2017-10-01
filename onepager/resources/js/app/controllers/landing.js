app.controller('productController', ['$scope', 'dev4UService', '$http', 'API_URL', 'Upload',
    function($scope, dev4UService, $http, API_URL, Upload) {

        var imageData;

        $scope.updateList = function () {
            $http({
                method: 'GET',
                url: API_URL + "products/list"
            }).then(function (response){
                $scope.products = response.data;
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
                'product',
                {'add':'Добавить','edit':'Редактировать'}
            );
        };

        //save new record / update existing record
        $scope.save = function(modalstate, id) {
            $scope.product.image = imageData.image;
            $scope.product.image_thumb = imageData.thumb;
            dev4UService.defaultSave(modalstate, $scope.product, 'product');
        };

        $scope.upload = function (file) {
            if (!file) {
                return;
            }
            Upload.upload({
                url: API_URL + "upload",
                data: { file: file }
            }).then(function (resp) {
                console.log(resp.data);
                imageData = resp.data;
                $scope.image = resp.data.image;
                $scope.image_thumb = resp.data.thumb;
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            });
        };

        //delete record
        $scope.confirmDelete = function(id) {
            var isConfirmDelete = confirm('Удалить позицию меню?');
            if (isConfirmDelete) {
                dev4UService.defaultDelete(id, 'product');
            }
        }
    }
]);