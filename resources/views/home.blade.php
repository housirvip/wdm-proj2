@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row home-content">
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                   href="#list-home" role="tab" aria-controls="home">Equipo</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                   href="#list-profile" role="tab" aria-controls="profile">Events</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                   href="#list-messages" role="tab" aria-controls="messages">Projects</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                   href="#list-settings" role="tab" aria-controls="settings">Videos</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-equipo"></table>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-event"></table>
                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-project"></table>
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    <table id="table-video"></table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('row-click')
    @parent

    <script type="text/javascript">

        // $(document).ready(function(){
        //     $('[data-toggle="tooltip"]').tooltip();
        //     const actions = $("table td:last-child").html();
        //     // Append table with add row form on add new button click
        //     $(".add-new").click(function(){
        //         $(this).attr("disabled", "disabled");
        //         const index = $("table tbody tr:last-child").index();
        //         const row = '<tr>' +
        //             '<td><input type="text" class="form-control" name="name" id="name"></td>' +
        //             '<td><input type="text" class="form-control" name="department" id="department"></td>' +
        //             '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
        //             '<td>' + actions + '</td>' +
        //             '</tr>';
        //         $("table").append(row);
        //         $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        //         $('[data-toggle="tooltip"]').tooltip();
        //     });
        //     // Add row on add button click
        //     $(document).on("click", ".add", function(){
        //         let empty = false;
        //         const input = $(this).parents("tr").find('input[type="text"]');
        //         input.each(function(){
        //             if(!$(this).val()){
        //                 $(this).addClass("error");
        //                 empty = true;
        //             } else{
        //                 $(this).removeClass("error");
        //             }
        //         });
        //         $(this).parents("tr").find(".error").first().focus();
        //         if(!empty){
        //             input.each(function(){
        //                 $(this).parent("td").html($(this).val());
        //             });
        //             $(this).parents("tr").find(".add, .edit").toggle();
        //             $(".add-new").removeAttr("disabled");
        //         }
        //     });
        //     // Edit row on edit button click
        //     $(document).on("click", ".edit", function(){
        //         $(this).parents("tr").find("td:not(:last-child)").each(function(){
        //             $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
        //         });
        //         $(this).parents("tr").find(".add, .edit").toggle();
        //         $(".add-new").attr("disabled", "disabled");
        //     });
        //     // Delete row on delete button click
        //     $(document).on("click", ".delete", function(){
        //         $(this).parents("tr").remove();
        //         $(".add-new").removeAttr("disabled");
        //     });
        // });
        //
        window.operateEvents = {
            'click .edit': function (e, value, row, index) {
                alert('You click like action, row: ' + JSON.stringify(row))
            },
            'click .delete': function (e, value, row, index) {
                $('#table-equipo').bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                })
            }
        }

        function operateFormatter(value, row, index) {
            return [
                '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>\n' +
                '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>'
            ].join('')
        }

        $('#table-equipo').bootstrapTable({
            url: '/api/equipo',
            pagination: true,
            search: true,
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
                formatter: operateFormatter
            }]
        })
        $('#table-event').bootstrapTable({
            url: '/api/event',
            pagination: true,
            search: true,
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
            }],
            onClickRow: function (row, $element, field) {
                console.log('hello');
                console.log(row);
                console.log($element);
                console.log(field);
            }
        })
        $('#table-project').bootstrapTable({
            url: '/api/project',
            pagination: true,
            search: true,
            columns: [{
                field: 'id',
                title: 'ID'
            }, {
                field: 'title',
                title: 'Title'
            },{
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
            }],
            onClickRow: function (row, $element, field) {
                console.log('hello');
                console.log(row);
                console.log($element);
                console.log(field);
            }
        })
        $('#table-video').bootstrapTable({
            url: '/api/video',
            pagination: true,
            search: true,
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
            }],
            onClickRow: function (row, $element, field) {
                console.log('hello');
                console.log(row);
                console.log($element);
                console.log(field);
            }
        })
    </script>
@endsection

