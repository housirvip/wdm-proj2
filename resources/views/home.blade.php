@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row home-content">
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-equipo-list" data-toggle="list"
                   href="#list-equipo" role="tab" aria-controls="home">Equipos</a>
                <a class="list-group-item list-group-item-action" id="list-event-list" data-toggle="list"
                   href="#list-event" role="tab" aria-controls="profile">Events</a>
                <a class="list-group-item list-group-item-action" id="list-project-list" data-toggle="list"
                   href="#list-project" role="tab" aria-controls="messages">Projects</a>
                <a class="list-group-item list-group-item-action" id="list-video-list" data-toggle="list"
                   href="#list-video" role="tab" aria-controls="settings">Videos</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-equipo" role="tabpanel"
                     aria-labelledby="list-equipo-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-equipo"></table>
                </div>
                <div class="tab-pane fade" id="list-event" role="tabpanel" aria-labelledby="list-event-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-event"></table>
                </div>
                <div class="tab-pane fade" id="list-project" role="tabpanel" aria-labelledby="list-project-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-project"></table>
                </div>
                <div class="tab-pane fade" id="list-video" role="tabpanel" aria-labelledby="list-video-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-video"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="doDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-edit-body">
                    <form id="form-edit">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="doSubmit()">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('row-click')
    @parent

    <script type="text/javascript">
        let currentItem = null;
        let currentType = 'equipo';

        $('#list-tab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
            currentType = e.target.id.split('-')[1];
        })

        $('button.add-new').on('click', function (e) {
            e.preventDefault();
            createForm();
            $('#modal-edit').modal('show');
        })

        function getFormData($form) {
            let unIndexedArray = $form.serializeArray();
            let indexedArray = {};

            $.map(unIndexedArray, function (n, i) {
                indexedArray[n['name']] = n['value'];
            });

            return indexedArray;
        }

        function doSubmit() {
            const data = getFormData($('#form-edit'));
            console.log(data);
            $.ajax({
                url: '/api/' + currentType,
                type: data.id ? "PUT" : "POST",
                dataType: "json",
                data: data,
                // async: false,
                success: function (data) {
                    $('#table-' + currentType).bootstrapTable('refresh');
                    $('#modal-edit').modal('hide');
                }
            });
        }

        function doDelete() {
            $.ajax({
                url: '/api/' + currentType + '?id=' + currentItem.id,
                type: "DELETE",
                dataType: "json",
                // async: false,
                success: function (data) {
                    $('#table-' + currentType).bootstrapTable('remove', {
                        field: 'id',
                        values: [currentItem.id]
                    })
                    $('#modal-delete').modal('hide');
                }
            });
        }

        function createForm() {
            let html = '';
            $('#table-' + currentType).bootstrapTable('getVisibleColumns').map(function (column) {
                if (column.field === 'id' || column.field === 'operate') {
                    return;
                }
                html += '<div class="form-group">\n' +
                    '<label for="for-' + column.field + '">' + column.field + '</label>\n' +
                    '<input class="form-control" name="' + column.field + '" id="for-' + column.field + '">\n' +
                    '</div>'
            });
            $('#form-edit').html(html);
        }

        function editForm(row) {
            let html = '';
            $.each(row, function (key, value) {
                if (key === 'updated_at' || key === 'created_at') {
                    return;
                }
                if (key === 'id') {
                    html += '<div class="form-group" style="display: none">\n' +
                        '<label for="for-' + key + '">' + key + '</label>\n' +
                        '<input class="form-control" name="' + key + '" id="for-' + key + '" value="' + value + '">\n' +
                        '</div>'
                    return;
                }
                html += '<div class="form-group">\n' +
                    '<label for="for-' + key + '">' + key + '</label>\n' +
                    '<input class="form-control" name="' + key + '" id="for-' + key + '" value="' + value + '">\n' +
                    '</div>'
            });
            $('#form-edit').html(html);
        }

        window.operateEvents = {
            'click .edit': function (e, value, row, index) {
                currentItem = row;
                editForm(row);
                $('#modal-edit').modal('show');
            },
            'click .delete': function (e, value, row, index) {
                currentItem = row;
                $('#modal-delete').modal('show');
            },
        }

        function operate(value, row, index) {
            return [
                '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>\n' +
                '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>'
            ].join('')
        }

        $('#table-equipo').bootstrapTable({
            url: '/api/equipo',
            pagination: true,
            search: true,
            uniqueId: 'id',
            columns: [{
                field: 'id',
                title: 'ID'
            }, {
                field: 'name',
                title: 'Name'
            }, {
                field: 'email',
                title: 'Email'
            }, {
                field: 'phone',
                title: 'Phone'
            }, {
                field: 'experience',
                title: 'Experience'
            }, {
                field: 'avatar',
                title: 'Avatar'
            }, {
                field: 'operate',
                title: 'Item Operate',
                align: 'center',
                clickToSelect: false,
                events: window.operateEvents,
                formatter: operate
            }]
        })
        $('#table-event').bootstrapTable({
            url: '/api/event',
            pagination: true,
            search: true,
            uniqueId: 'id',
            columns: [{
                field: 'id',
                title: 'ID'
            }, {
                field: 'title',
                title: 'Title'
            }, {
                field: 'content',
                title: 'Content'
            }, {
                field: 'image_url',
                title: 'ImgUrl'
            }, {
                field: 'operate',
                title: 'Item Operate',
                align: 'center',
                clickToSelect: false,
                events: window.operateEvents,
                formatter: operate
            }]
        })
        $('#table-project').bootstrapTable({
            url: '/api/project',
            pagination: true,
            search: true,
            uniqueId: 'id',
            columns: [{
                field: 'id',
                title: 'ID'
            }, {
                field: 'title',
                title: 'Title'
            }, {
                field: 'subtitle',
                title: 'SubTitle'
            }, {
                field: 'content',
                title: 'Content'
            }, {
                field: 'image_url1',
                title: 'ImgUrl1'
            }, {
                field: 'image_url2',
                title: 'ImgUrl2'
            }, {
                field: 'operate',
                title: 'Item Operate',
                align: 'center',
                clickToSelect: false,
                events: window.operateEvents,
                formatter: operate
            }]
        })
        $('#table-video').bootstrapTable({
            url: '/api/video',
            pagination: true,
            search: true,
            uniqueId: 'id',
            columns: [{
                field: 'id',
                title: 'ID'
            }, {
                field: 'author',
                title: 'Author'
            }, {
                field: 'description',
                title: 'Description'
            }, {
                field: 'url',
                title: 'Url'
            }, {
                field: 'operate',
                title: 'Item Operate',
                align: 'center',
                clickToSelect: false,
                events: window.operateEvents,
                formatter: operate
            }]
        })
    </script>
@endsection

