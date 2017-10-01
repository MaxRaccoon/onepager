<form name="productForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="image_thumb || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="image" value="<% image %>" ng-model="product.image"
               ng-required="true" ng-value="product.image" />
        <input type="hidden" name="title" value="<% image_thumb %>" ng-model="product.image_thumb"
               ng-required="true" ng-value="product.image_thumb" />
    </div>

    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Заголовок</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок"
                   value="<% title %>" ng-model="product.title" ng-required="true">
            <span class="help-inline"
                  ng-show="productForm.title.$invalid && productForm.title.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="description" name="description"
                      ng-model="product.description" ng-required="true"
            ></textarea>
            <span class="help-inline"
                  ng-show="productForm.description.$invalid && productForm.description.$touched">Обязательное поле</span>
        </div>
    </div>

</form>