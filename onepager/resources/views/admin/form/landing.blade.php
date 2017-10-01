<form name="landingForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="keyName" class="col-sm-3 control-label">Ключ</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="key_name" name="keyName"
                   placeholder="Ключ для значения (для вызова в шаблоне)"
                   value="<% key_name %>" ng-model="landing.key_name" ng-required="true">
            <span class="help-inline"
                  ng-show="landingForm.keyName.$invalid && landingForm.keyName.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group error">
        <label for="description" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="description" name="description"
                   placeholder="Описание ключа"
                   value="<% description %>" ng-model="landing.description" ng-required="true">
            <span class="help-inline"
                  ng-show="landingForm.description.$invalid && landingForm.description.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="keyValue" class="col-sm-3 control-label">Значние</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="keyValue" name="key_value"
                      ng-model="landing.key_value" ng-required="true"
                ></textarea>
            <span class="help-inline"
                  ng-show="landingForm.keyValue.$invalid && landingForm.keyValue.$touched">Обязательное поле</span>
        </div>
    </div>

</form>