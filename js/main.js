function showAlert(msg){
  var elem = $(".alert-box");
  elem.addClass("show");
  elem.html(msg);
  setTimeout(function(){
    elem.removeClass("show");
  },5000);
}
