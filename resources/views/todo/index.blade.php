<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
<section class="main mt-5">
    <div class="container">
        <div class="d-flex justify-content-end me-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Создать
            </button>
        </div>
        <div class="row col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col" colspan="3">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($todos as $todo)
                    <tr id="{{$todo->id}}">
                        <td scope="row">{{$todo->id}}</td>
                        <td>{{$todo->title}}</td>
                        <td class="ps-0 pe-0">
                            <button type="button" class="btn btn-warning show-form" data-bs-toggle="modal"
                                    data-bs-target="#show"
                                    data-title="{{$todo->title}}"
                                    data-content="{{$todo->content}}"
                            >
                                Посмотреть
                            </button>
                        </td>
                        <td class="ps-0 pe-0">
                            <button type="button" class="btn btn-success update-form" data-bs-toggle="modal"
                                    data-bs-target="#update"
                                    data-id="{{$todo->id}}"
                                    data-title="{{$todo->title}}"
                                    data-content="{{$todo->content}}"
                            >
                                Изменить
                            </button>
                        </td>
                        <td class="ps-0 pe-0">
                            <button type="button" class="btn btn-danger destroy-form" data-id="{{$todo->id}}">
                                Удалить
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@include('todo.createModal')
@include('todo.updateModal')
@include('todo.showModal')
@include('todo.js')
{{--<script>--}}
{{--    adminUrl = '';--}}
{{--    $.ajaxSetup({--}}
{{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}--}}
{{--    })--}}

{{--    id = $('input[name="id"]').val();--}}
{{--    html = '';--}}

{{--    function getRow() {--}}
{{--        html += '<tr id="'+ id +'">'--}}
{{--        html += '<th scope="row">' + id + '</th>'--}}
{{--        html += '<th scope="row">' + title + '</th>'--}}
{{--        html += '<td class="ps-0 pe-0"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#view" onclick="view('+ title +','+ content +')">Посмотреть</button></td>'--}}
{{--        html += '<td class="ps-0 pe-0"><button type="button" class="btn btn-success">Изменить</button></td>'--}}
{{--        html += '<td class="ps-0 pe-0"><button type="button" class="btn btn-danger" onclick="destroy('+ id +')">Удалить</button></td>'--}}
{{--        html += '</tr>'--}}
{{--        $('table tbody').append(html)--}}
{{--        html = ''--}}
{{--    }--}}

{{--    function store(){--}}

{{--        title = $('input[name="title"]').val();--}}
{{--        content = $('input[name="content"]').val();--}}
{{--        user_id = $('input[name="user_id"]').val();--}}
{{--        id++;--}}

{{--        $.ajax({--}}
{{--            method:'POST',--}}
{{--            url:adminUrl + '/store',--}}
{{--            data: {--}}
{{--                'id': id,--}}
{{--                'title': title,--}}
{{--                'content': content,--}}
{{--                'user_id': user_id,--}}
{{--            },--}}
{{--            dataType:'HTML',--}}
{{--            success: function () {--}}
{{--                $("#create").modal('hide')--}}
{{--                getRow()--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}

{{--    function UpdateRow(idUpdate) {--}}
{{--        html += '<tr id="'+ idUpdate +'">'--}}
{{--        html += '<th scope="row">' + idUpdate + '</th>'--}}
{{--        html += '<th scope="row">' + title + '</th>'--}}
{{--        html += '<td class="ps-0 pe-0"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#view" onclick="view('+ title +','+ content +')">Посмотреть</button></td>'--}}
{{--        html += '<td class="ps-0 pe-0"><button type="button" class="btn btn-success">Изменить</button></td>'--}}
{{--        html += '<td class="ps-0 pe-0"><button type="button" class="btn btn-danger" onclick="destroy('+ id +')">Удалить</button></td>'--}}
{{--        html += '</tr>'--}}
{{--        $('table tbody').update(html)--}}
{{--        html = ''--}}
{{--    }--}}

{{--    function update(idUpdate){--}}

{{--        title = $('input[name="titleUp"]').val();--}}
{{--        content = $('input[name="contentUp"]').val();--}}

{{--        $.ajax({--}}
{{--            method:'POST',--}}
{{--            url:adminUrl + '/update/' + idUpdate,--}}
{{--            data: {--}}
{{--                'title': title,--}}
{{--                'content': content--}}
{{--            },--}}
{{--            dataType:'HTML',--}}
{{--            success: function () {--}}
{{--                $("#create").modal('hide')--}}
{{--                getRow(idUpdate)--}}
{{--            }--}}
{{--        });--}}

{{--    }--}}

{{--    function destroy(idDestroy){--}}
{{--        $.ajax({--}}
{{--            method:'POST',--}}
{{--            url:adminUrl + '/destroy/' + idDestroy,--}}
{{--            dataType:'HTML',--}}
{{--            success: function () {--}}
{{--                $("#"+ idDestroy +"").hide()--}}
{{--                console.log(idDestroy)--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
</body>
</html>
