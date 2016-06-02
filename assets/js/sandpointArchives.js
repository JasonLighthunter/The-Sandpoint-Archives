var counter = 1;

$('.add-sub-category').on("click", function() {
  $('.submit-btn').before(
  '<div class="row">' +
    '<div class="col-sm-6 col-lg-4">' +
      '<div class="form-group has-error has-danger">' +
        '<label for="sub-' + counter + '">new sub category</label>' +
        '<div class="input-group">' +
          '<input type="text" name="sub-' + counter + '"  id="sub-' + counter + '" class="form-control" placeholder="' + counter + '" required>' +
          '<span class="input-group-addon">' +
            '<i class="fa fa-asterisk fa-fw" aria-hidden="true"></i>' +
          '</span>' +
        '</div>' +
        '<div class="help-block with-errors">' +
        '<ul class="list-unstyled">' +
          '<li>value missing</li>' +
        '</ul>' +
      '</div>' +
    '</div>' +
  '</div>'
  );
  counter++;
});