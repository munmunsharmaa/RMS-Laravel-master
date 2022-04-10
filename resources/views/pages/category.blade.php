<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Category | {{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" >

        {{-- Data Table Styles --}}
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

        <style>
          .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0px !important;
            margin: 0px !important;
          }

          div.dataTables_wrapper div.dataTables_length select{
            width: 50%;
          }
        </style>
        {{-- End Data Table Styles --}}
    </head>
    <body style="background: whitesmoke;">
        @include('layouts.header')

        <main style="display: grid; grid-template-columns: 300px auto; margin: 30px; gap: 30px;">
          @include('layouts.navigation')
          @include('page_modules.category')
        </main>

        <script>
          $(document).ready(function(){

            $(document).on("click", ".view_btn", function(){
              var category_id = $(this).val()

              $("#viewModal").modal('show')

              $.ajax({
                type: "GET",
                url: "/view-category/" + category_id,
                success: function(res){
                  $("#view_id").val(res.category.id)
                  $("#view_status").val(res.category.status)
                  $("#view_category_name").val(res.category.category_name)
                  $("#view_photo").attr("src", 'category_images/' + res.category.category_image)
                }
              })
            })
  
            $(document).on("click", ".edit_btn", function(){
              var category_id = $(this).val()
  
              $("#editModal").modal('show')
  
              $.ajax({
                type: "GET",
                url: "/edit-category/" + category_id,
                success: function(res){
                  $("#category_name").val(res.category.category_name)
                  $("#status").val(res.category.status)
                  $("#id").val(res.category.id)
                }
              })
            })

            $(document).on("click", ".delete_btn", function(){
              var category_id = $(this).val()

              $("#deleteModal").modal('show')

              $.ajax({
                type: "GET",
                url: "/remove-category/" + category_id,
                success: function(res){
                  $("#remove_id").val(res.category.id)
                }
              })
            })

            /* Data Table Script */
            $('#myDataTable').DataTable();
          })
      </script>

      {{-- Data Table Script --}}
      <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    </body>
</html>