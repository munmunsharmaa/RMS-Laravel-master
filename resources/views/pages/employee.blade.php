<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Employee | {{ config('app.name') }}</title>

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
          @include('page_modules.employee')
        </main>

        <script>
          $(document).ready(function(){

            $(document).on("click", ".view_btn", function(){
              var user_id = $(this).val()

              $("#viewModal").modal('show')

              $.ajax({
                type: "GET",
                url: "/view-employee/" + user_id,
                success: function(res){
                  $("#view_id").val(res.user.id)
                  $("#view_name").val(res.user.name)
                  $("#view_email").val(res.user.email)
                  $("#view_user_type").val(res.user.user_type)
                  $("#view_role").val(res.user.role)
                  $("#view_company").val(res.user.company)
                  $("#view_job_title").val(res.user.job_title)
                  $("#view_phone").val(res.user.phone)
                  $("#view_home_phone").val(res.user.home_phone)
                  $("#view_address").val(res.user.address)
                  $("#view_city").val(res.user.city)
                  $("#view_state_province").val(res.user.state_province)
                  $("#view_zip_postal_code").val(res.user.zip_postal_code)
                  $("#view_country_region").val(res.user.country_region)
                  $("#view_photo").attr("src", 'user_photos/' + res.user.photo)
                }
              })
            })
  
            $(document).on("click", ".edit_btn", function(){
              var user_id = $(this).val()
  
              $("#editModal").modal('show')
  
              $.ajax({
                type: "GET",
                url: "/edit-employee/" + user_id,
                success: function(res){
                  $("#name").val(res.user.name)
                  $("#email").val(res.user.email)
                  $("#user_type").val(res.user.user_type)
                  $("#role").val(res.user.role)
                  $("#company").val(res.user.company)
                  $("#job_title").val(res.user.job_title)
                  $("#phone").val(res.user.phone)
                  $("#home_phone").val(res.user.home_phone)
                  $("#address").val(res.user.address)
                  $("#city").val(res.user.city)
                  $("#state_province").val(res.user.state_province)
                  $("#zip_postal_code").val(res.user.zip_postal_code)
                  $("#country_region").val(res.user.country_region)
                  $("#id").val(res.user.id)
                }
              })
            })

            $(document).on("click", ".delete_btn", function(){
              var user_id = $(this).val()

              $("#deleteModal").modal('show')

              $.ajax({
                type: "GET",
                url: "/remove-employee/" + user_id,
                success: function(res){
                  $("#remove_id").val(res.user.id)
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