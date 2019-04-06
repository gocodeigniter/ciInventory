$(document).ready(function() {

  // User Navbar dropdown
  $('#userNavbar').click(function() {
    if ($('.navbar-link-dropdown.show')[0]){
      $('.navbar-link-dropdown').removeClass('show');
    } else {
      $('.navbar-link-dropdown').addClass('show');
    }
  });

  // Checkbox
  $('#checkAll').click(function() {
    if( $(this).prop('checked') ) {
      $('.singleCheck').prop('checked', true);
      $('.jumlahBarang').removeAttr('disabled');
    } else {
      $('.singleCheck').prop('checked', false);
      $('.jumlahBarang').attr('disabled', true);
      $('.jumlahBarang').val('');
    }
  });

  $('.singleCheck').click(function() {
    var singleCheckIndex = $(this).index('.singleCheck');

    if( $(this).prop('checked') == false ) {
      $('#checkAll').prop('checked', false);
    }

    if( $(this).prop('checked') == true ) {
      $('.jumlahBarang').eq( singleCheckIndex ).removeAttr('disabled');
    }

    if( $(this).prop('checked') == false ) {
      $('.jumlahBarang').eq( singleCheckIndex ).attr('disabled', true);
      $('.jumlahBarang').eq( singleCheckIndex ).val('');
    }
  });

  for( var i = 0; i < $('.singleCheck').length; i++ ) {
    if( $('.singleCheck').eq( i ).prop('checked') == true ) {
      $('.jumlahBarang').eq( i ).removeAttr('disabled');
    }
  }

});
