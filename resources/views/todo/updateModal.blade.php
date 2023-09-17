<form action="" method="POST" id="FormCreate">
    @csrf
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Обновление заметки</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="up_id" id="up_id">
                    <div class="row g-3">
                        <input type="text" class="form-control" placeholder="Название" name="up_title" id="up_title">
                        <input type="text" class="form-control" placeholder="Описание" name="up_content" id="up_content">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary btn-update">Обновить</button>
                </div>
            </div>
        </div>
    </div>
</form>
