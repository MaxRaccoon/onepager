<form name="menuForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="title" class="col-sm-3 control-label">Заголовок</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="title" name="title" placeholder="Заголовок"
                   value="<% title %>" ng-model="menu.title" ng-required="true">
            <span class="help-inline"
                  ng-show="menuForm.title.$invalid && menuForm.title.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="url" class="col-sm-3 control-label">Ссылка</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="url" name="url" placeholder="Ссылка"
                   value="<% url %>" ng-model="menu.url" ng-required="true">
            <span class="help-inline"
                  ng-show="menuForm.url.$invalid && menuForm.url.$touched">Обязательное поле</span>
        </div>
    </div>

</form>