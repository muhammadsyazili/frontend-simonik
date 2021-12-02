@extends('..layouts/after-login')

@section('title', 'Home')

{{-- ========================================================== --}}
@push('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
<!-- Ionicons -->
<link rel="stylesheet" href="https://pre.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> {{-- required --}}
<!-- Theme Style -->
<link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}

<!-- Date Picker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- Custom Style for Sidebar -->
<style>
  aside {
    color: #ffffff !important;
    background-color: rgb(14,42,71) !important;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
  }

  aside .brand-link {
    background-color: rgb(14,42,71) !important;
  }
</style>

<!-- Custom Style for Navbar -->
<style>
  nav.main-header {
    color: #ffffff !important;
    background-color: rgb(14,42,71) !important;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
  }
</style>

<!-- Custom Style for Content -->
<style>
  .modal-header, .modal-footer {
    color: #ffffff !important;
    background-color: rgb(14,42,71) !important;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
  }
</style>
@endpush

{{-- ========================================================== --}}

@push('script')
<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.js') }}"></script> {{-- required --}}
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> {{-- required --}}
<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> {{-- required --}}
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
<!-- AdminLTE For Demo Purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script> {{-- required --}}

<!-- Date Picker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $('#datepicker').datepicker( {
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            closeText:'Select',
            currentText: 'This year',
            onClose: function(dateText, inst) {
                let year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val($.datepicker.formatDate("yy", new Date(year, 0, 1)));
            },
            beforeShow: function(input, inst){
            if ($(this).val()!=''){
                let tmpyear = $(this).val();
                $(this).datepicker('option','defaultDate',new Date(tmpyear, 0, 1));
            }
            }
        }).focus(function () {
            $(".ui-datepicker-month").hide();
            $(".ui-datepicker-calendar").hide();
            $(".ui-datepicker-current").hide();
            $(".ui-datepicker-prev").hide();
            $(".ui-datepicker-next").hide();
            $("#ui-datepicker-div").position({
                my: "left top",
                at: "left bottom",
                of: $(this)
            });
        }).attr("readonly", false);
    });
</script>

<script>
  $(document).ready(function () {

    // Denotes total number of rows
    let rowIdx = 0;

    // jQuery button click event to add a row
    $('#addBtn').on('click', function () {

      // Adding a row inside the tbody.
      $('#tbody').append(`
        <tr id="R${++rowIdx}">
          <td class="row-index text-center"><p>Row ${rowIdx}</p></td>
          <td class="row-index text-center"><p>Row ${rowIdx}</p></td>
          <td class="row-index text-center"><p>Row ${rowIdx}</p></td>
          <td class="row-index text-center"><p>Row ${rowIdx}</p></td>
          <td class="row-index text-center"><p>Row ${rowIdx}</p></td>
          <td class="text-center"><button class="btn btn-danger remove" type="button" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fas fa-trash-alt"></i></button></td>
        </tr>`);
    });

    // jQuery button click event to remove a row.
    $('#tbody').on('click', '.remove', function () {

      // Getting all the rows next to the row
      // containing the clicked button
      let child = $(this).closest('tr').nextAll();

      // Iterating across all the rows
      // obtained to change the index
      child.each(function () {

        // Getting <tr> id.
        let id = $(this).attr('id');

        // Getting the <p> inside the .row-index class.
        let idx = $(this).children('.row-index').children('p');

        // Gets the row number from <tr> id.
        let dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`Row ${dig - 1}`);

        // Modifying row id.
        $(this).attr('id', `R${dig - 1}`);
      });

      // Removing the current row.
      $(this).closest('tr').remove();

      // Decreasing total number of rows by 1.
      rowIdx--;
    });
  });
</script>

<script>
    $(document).ready(() => {
        $(".addInput").click(function() {
            build_inputs($(this));
        });
    });
    let id = 1;
    function build_inputs(e) {
        let str = `
        <div id="dynamic-input-${id}" class="adp-slides">
            <div class="input-group">
                <span class="input-group-append">
                    <span class="input-group-text">${id}</span>
                </span>
                <span class="input-group-append">
                    <span class="input-group-text">From</span>
                </span>
                <input type="text" class="form-control dynamic-input-datepicker" name="applyFrom[]" id="adpElemFrom${id}">
                <span class="input-group-append">
                    <span class="input-group-text">To</span>
                </span>
                <input type="text" class="form-control dynamic-input-datepicker" name="applyTo[]" id="adpElemTo${id}">
                <span class="input-group-append">
                    <button class="btn btn-danger removeSlide" data-target="dynamic-input-${id}" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </span>
            </div>
            <div class="form-group">
        </div>`;

        $(".inputWrapper").append(str);

        id++;

        $(".removeSlide").click(function() {
            $("#" + $(this).attr("data-target")).remove();
        });
    };
</script>

<script>
    $(document).on('focus', '.dynamic-input-datepicker', function(){
        $(this).datepicker({
            changeMonth: true,
            changeYear: true
        });
        $('.dynamic-input-datepicker').css('z-index', 9999);
    });
</script>
@endpush

{{-- ========================================================== --}}

@section('content')
  <div class="content-wrapper mt-3">

    {{-- section: related data --}}
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            {{-- ============================================================ --}}
            <div class="card-header">
            <h3 class="card-title">Paper Work(s) Related</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Unit</th>
                        <th>PW - KPI(s)</th>
                        <th>PW - Target KPI(s)</th>
                        <th>PW - Realisasi KPI(s)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>UP3 - Palembang</td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>UP3 - Ogan Ilir</td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>UP3 - Lahat</td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>UP3 - Bengkulu</td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>UP3 - Jambi</td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>UP3 - Muara Bungo</td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('key-performance-indicator-paper-work-create') }}" class="btn btn-success btn-flat mb-3">Show</a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            {{-- ============================================================ --}}

        </div>
    </div>
    
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            {{-- ============================================================ --}}
            <div class="card-header">
              <h3 class="card-title">KPI - Key Performance Indicators</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="datepicker"/>

                    <span class="input-group-append">
                      <button type="button" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="buttom" title="Search"><i class="fas fa-search"></i></button>
                    </span>
                </div>

              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add-v2">
                <i class="fas fa-plus"></i> Add
              </button>
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <div class="table-responsive-sm">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">Indikator</th>
                      <th class="text-center">Formula</th>
                      <th class="text-center">Satuan</th>
                      <th class="text-center">Bobot</th>
                      <th class="text-center">Target</th>
                      <th class="text-center">Berlaku</th>
                      <th class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-primary">
                        <td>Penjualan dan Pendapatan Tenaga Listrik</td>
                        <td class="small">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="small text-center">
                            -
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-warning">
                        <td>a. Penjualan Tenaga Listrik</td>
                        <td class="small">kWh Penjualan Tenaga Listrik</td>
                        <td class="text-center">GWH</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="small text-center">
                            -
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <td>- Intensifikasi</td>
                        <td class="small">kWh penjualan tenaga listrik dari Intensifikasi</td>
                        <td class="text-center">GWH</td>
                        <td class="text-center"><span class="badge bg-success">8</span></td>
                        <td class="text-center">-</td>
                        <td class="small text-center">
                            2021/01/01 - 2021/12/31
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <td>- Ekstensifikasi</td>
                        <td class="small">kWh penjualan tenaga listrik dari Ekstensifikasi</td>
                        <td class="text-center">GWH</td>
                        <td class="text-center"><span class="badge bg-success">2</span></td>
                        <td class="text-center">-</td>
                        <td class="small text-center">
                            2021/01/01 - 2021/12/31
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-warning">
                        <td>b. Rupiah Pendapatan Penjualan Tenaga Listrik</td>
                        <td class="small">Rupiah Pendapatan Penjualan Tenaga Listrik</td>
                        <td class="text-center">Milyar</td>
                        <td class="text-center"><span class="badge bg-warning">10</span></td>
                        <td class="text-center">-</td>
                        <td class="small text-center">
                            2021/03/01 - 2021/03/31
                            <br>
                            |
                            <br>
                            2021/06/01 - 2021/06/30
                            <br>
                            |
                            <br>
                            2021/09/01 - 2021/09/30
                            <br>
                            |
                            <br>
                            2021/12/01 - 2021/12/31
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-primary">
                        <td>Pengendalian Piutang- Rata-Rata Tunggakan</td>
                        <td class="small">Rata-Rata Bulanan Rupiah Saldo Rekening Berjalan dan Rekening Tunggakan (PAL dan TS TUL 404 di luar Kogol 1)</td>
                        <td class="text-center">Rp (juta)</td>
                        <td class="text-center"><span class="badge bg-primary">10</span></td>
                        <td class="text-center">67668,90</td>
                        <td class="small text-center">
                            2021/01/01 - 2021/12/31
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-primary">
                        <td>Susut Jaringan (Tanpa E-min)</td>
                        <td class="small">{(Total kWh Produksi Netto - PSGI - kWh kirim ke Unit Lain - PSSD - kWh Jual tanpa E-min)/Total kWh Produksi Netto} x 100%</td>
                        <td class="text-center">%</td>
                        <td class="text-center"><span class="badge bg-primary">10</span></td>
                        <td class="text-center"></td>
                        <td class="small text-center">
                            2021/01/01 - 2021/12/31
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
            {{-- ============================================================ --}}

        </div>
    </div>
  </div>


  <div class="modal fade" id="add">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add - Key Performance Indicators</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive-sm">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="text-center">Indikator</th>
                  <th class="text-center">Formula</th>
                  <th class="text-center">Satuan</th>
                  <th class="text-center">Bobot</th>
                  <th class="text-center">Target</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody id="tbody">
                <tr class="table-primary">
                  <td>Penjualan dan Pendapatan Tenaga Listrik</td>
                  <td class="small">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center"></td>
                </tr>
                <tr class="table-warning">
                  <td>a. Penjualan Tenaga Listrik</td>
                  <td class="small">kWh Penjualan Tenaga Listrik</td>
                  <td class="text-center">GWH</td>
                  <td class="text-center"><span class="badge bg-warning">10</span></td>
                  <td class="text-center">-</td>
                  <td class="text-center"></td>
                </tr>
                <tr class="table-success">
                  <td>- Intensifikasi</td>
                  <td class="small">kWh penjualan tenaga listrik dari Intensifikasi</td>
                  <td class="text-center">GWH</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center"></td>
                </tr>
                <tr class="table-success">
                  <td>- Ekstensifikasi</td>
                  <td class="small">kWh penjualan tenaga listrik dari Ekstensifikasi</td>
                  <td class="text-center">GWH</td>
                  <td class="text-center">-</td>
                  <td class="text-center">-</td>
                  <td class="text-center"></td>
                </tr>
                <tr class="table-warning">
                  <td>b. Rupiah Pendapatan Penjualan Tenaga Listrik</td>
                  <td class="small">Rupiah Pendapatan Penjualan Tenaga Listrik</td>
                  <td class="text-center">Milyar</td>
                  <td class="text-center"><span class="badge bg-warning">10</span></td>
                  <td class="text-center">-</td>
                  <td class="text-center"></td>
                </tr>
                <tr class="table-primary">
                  <td>Pengendalian Piutang- Rata-Rata Tunggakan</td>
                  <td class="small">Rata-Rata Bulanan Rupiah Saldo Rekening Berjalan dan Rekening Tunggakan (PAL dan TS TUL 404 di luar Kogol 1)</td>
                  <td class="text-center">Rp (juta)</td>
                  <td class="text-center"><span class="badge bg-primary">10</span></td>
                  <td class="text-center">67668,90</td>
                  <td class="text-center"></td>
                </tr>
                <tr class="table-primary">
                  <td>Susut Jaringan (Tanpa E-min)</td>
                  <td class="small">{(Total kWh Produksi Netto - PSGI - kWh kirim ke Unit Lain - PSSD - kWh Jual tanpa E-min)/Total kWh Produksi Netto} x 100%</td>
                  <td class="text-center">%</td>
                  <td class="text-center"><span class="badge bg-primary">10</span></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <button class="btn btn-md btn-primary" id="addBtn" type="button">Add</button>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="add-v2">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add - Key Performance Indicators</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="indikator">Indikator</label>
                <input type="text" class="form-control" id="indikator">
            </div>
            <div class="form-group">
                <label>Formula</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="number" class="form-control" id="bobot">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="target">Target</label>
                        <input type="text" class="form-control" id="target">
                    </div>
                </div>
            </div>
            <div class="adp-box">
                <label>Berlaku</label>
                <div class="inputWrapper">

                </div>
                <button class="btn btn-success addInput" data-toggle="tooltip" data-placement="buttom" title="Add"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="edit">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit - Key Performance Indicators</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="indikator">Indikator</label>
                <input type="text" class="form-control" id="indikator" value="Penjualan dan Pendapatan Tenaga Listrik">
            </div>
            <div class="form-group">
                <label>Formula</label>
                <textarea class="form-control" rows="3" value="-"></textarea>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan" value="-">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="number" class="form-control" id="bobot">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="target">Target</label>
                        <input type="text" class="form-control" id="target" value="-">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
