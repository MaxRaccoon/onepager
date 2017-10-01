<form name="sliderForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="image_thumb || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="image" value="<% image %>" ng-model="slider.image"
               ng-required="true" ng-value="slider.image" />
        <input type="hidden" name="title" value="<% image_thumb %>" ng-model="slider.image_thumb"
               ng-required="true" ng-value="slider.image_thumb" />
    </div>

    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Подпись</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="title" name="title" placeholder="Подпись"
                   value="<% title %>" ng-model="slider.title" ng-required="true">
            <span class="help-inline"
                  ng-show="sliderForm.title.$invalid && sliderForm.title.$touched">Обязательное поле</span>
        </div>
    </div>

</form>