<form name="technologyForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="title" class="col-sm-3 control-label">Назавние</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="title" name="title"
                   placeholder="Короткое название"
                   value="<% title %>" ng-model="technology.title" ng-required="true">
            <span class="help-inline"
                  ng-show="technologyForm.title.$invalid && technologyForm.title.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="description" name="description"
                      ng-model="technology.description" ng-required="true"
            ></textarea>
            <span class="help-inline"
                  ng-show="technologyForm.description.$invalid && technologyForm.description.$touched">Обязательное поле</span>
        </div>
    </div>

</form>