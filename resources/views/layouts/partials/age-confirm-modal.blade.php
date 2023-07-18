<div class="modal overflow-hidden" style="background-color: rgba(0, 0, 0, 0.8)" tabindex="-1" role="dialog" id="ageConfirm">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Предупреждение</h5>
            </div>
            <div class="modal-body">
                <p>Сайт предназначен только для лиц, старше 18 лет</p>
                <br>
                <p>Для входа на сайт подтвердите ваш возраст</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirmButton">Мне есть 18</button>
                <a href="https://www.google.com/" class="btn btn-secondary" data-dismiss="modal">Нет, зайду когда исполнится</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/ageConfirm.js')}}" defer></script>
