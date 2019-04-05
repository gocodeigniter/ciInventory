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
