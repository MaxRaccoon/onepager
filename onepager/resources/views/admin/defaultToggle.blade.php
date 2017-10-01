<!-- Modal (Pop up when detail button clicked) -->
<div class="modal fade" id="{{ $entity }}Modal" tabindex="-1" role="dialog" aria-labelledby="{{ $entity }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="{{ $entity }}FormLabel"><% form_title %></h4>
            </div>
            <div class="modal-body">

                @include('admin.form.' . $entity)

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                        ng-disabled="userForm.$invalid">Сохранить</button>
            </div>
        </div>
    </div>
</div>