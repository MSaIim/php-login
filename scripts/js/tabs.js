$("#login-link").click(function() {
  $("#login-button").show();
  $("#login-button").prop("disabled", false);
  $("#register-button").hide();
  $("#register-button").prop("disabled", true);
});

$("#register-link").click(function() {
  $("#login-button").hide();
  $("#login-button").prop("disabled", true);
  $("#register-button").show();
  $("#register-button").prop("disabled", false);
});
