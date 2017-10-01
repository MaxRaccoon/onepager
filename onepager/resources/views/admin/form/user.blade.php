<form name="userForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="name" class="col-sm-3 control-label">Имя</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Имя" value="<% name %>"
                   ng-model="user.name" ng-required="true">
            <span class="help-inline"
                  ng-show="userForm.name.$invalid && userForm.name.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<% email %>"
                   ng-model="user.email" ng-required="true">
            <span class="help-inline"
                  ng-show="userForm.email.$invalid && userForm.email.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group password-field">
        <label for="password" class="col-sm-3 control-label">Пароль</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password" value=""
                   ng-model="user.password" ng-required="false" ng-model="password.new">
            <span class="help-inline"
                  ng-show="userForm.password.$invalid && userForm.password.$touched">Поле заполнено не верно</span>
        </div>
    </div>

    <div class="form-group password-field">
        <label for="inputEmail3" class="col-sm-3 control-label">Повтор пароля</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password2" name="password_confirmation" value=""
                   ng-model="user.password_confirmation" ng-required="false" match-password="password" ng-model="password.confirm">
            <span class="help-inline"
                  ng-show="userForm.password_confirmation.$invalid && userForm.password_confirmation.$touched">
                Поле заполнено не верно</span>
        </div>
    </div>

</form>