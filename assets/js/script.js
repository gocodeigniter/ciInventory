$(document).ready(function() {

  // Checkbox
  $('#checkAll').click(function() {
    if( $(this).prop('checked') ) {
      $('.singleCheck').prop('checked', true);
    } else {
      $('.singleCheck').prop('checked', false);
    }
  });

  $('.singleCheck').click(function() {
    if( $(this).prop('checked') == false ) {
      $('#checkAll').prop('checked', false);
    }
  });

});
