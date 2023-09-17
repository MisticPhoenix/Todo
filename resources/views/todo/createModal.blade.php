<form action="" method="POST" id="FormCreate">
    @csrf
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создание заметки</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user_id" value="{{auth()->user()->id}}">
                    <div class="row g-3">
                        <input type="text" class="form-control" placeholder="Название" id="title">
                        <input type="text" class="form-control" placeholder="Описание" id="content">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary btn-create">Создать</button>
                </div>
            </div>
        </div>
    </div>
</form>
