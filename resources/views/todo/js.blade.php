<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
</script>
<script>
    //create
    $(document).ready(function (){
        let adminUrl = '';
        $(document).on('click','.btn-create', function (e) {
            e.preventDefault();
            let title = $('#title').val();
            let content = $('#content').val();
            let user_id = $('#user_id').val();
            if(title == '' || content == ''){
                alert('введите данные');
                return false;
            }

            $.ajax({
               url:adminUrl + '/store',
                method:'POST',
                data:{
                    'title': title,
                    'content': content,
                    'user_id': user_id,
                },
                datatype: 'HTML',
                success:function () {
                    $("#create").modal('hide');
                    $(".table").load(location.href+' .table');
                }
            });
        })
        //show todo for update
        $(document).on('click','.update-form', function (){
            let id = $(this).data('id');
            let title = $(this).data('title');
            let content = $(this).data('content');

            $('#up_id').val(id);
            $('#up_title').val(title);
            $('#up_content').val(content);
        })
        //show
        $(document).on('click','.show-form', function (){
            let title = $(this).data('title');
            let content = $(this).data('content');

            $('#show-title').text('Title: ' + title);
            $('#show-content').text('Content: ' + content);
        })
        //update
        $(document).on('click','.btn-update', function (e) {
            e.preventDefault();
            let id = $('#up_id').val();
            let title = $('#up_title').val();
            let content = $('#up_content').val();

            if(title == '' || content == ''){
                alert('введите данные');
                return false;
            }

            $.ajax({
                url:adminUrl + '/update/' + id,
                method:'POST',
                data:{
                    'title': title,
                    'content': content
                },
                datatype: 'HTML',
                success:function () {
                    $("#update").modal('hide');
                    $(".table").load(location.href+' .table');
                },
                error:function () {
                    console.log('error');
                }
            });
        })
        //destroy
        $(document).on('click','.destroy-form', function (e){
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
               url:adminUrl + '/destroy/' + id,
               method:'POST',
               datatype:'HTML',
                success:function () {
                    $(".table").load(location.href+' .table');
                },
                error:function () {
                    console.log('error');
                }
            });
        })
    });
</script>
