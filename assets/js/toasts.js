function addCart() {
  $(document).ready(function () {
    $("#addedToCartToast").toast("show");
  });
}

function error() {
  $(document).ready(function () {
    $("#errorToast").toast("show");
  });
}

function selectCity() {
  $(document).ready(function () {
    $("#selectCityToast").toast("show");
  });
}

function cartUpdateError() {
  $(document).ready(function () {
    $("#cartError").toast("show");
  });
}

function cartSuccess() {
  $(document).ready(function () {
    $("#cartSuccessToast").toast("show");
  });
}
