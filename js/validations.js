var alert;

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function changeIcon(element){
  wrapper = element.parent();
  if(element.find('p').length > 0) {
    wrapper.removeClass('has-success');
    wrapper.addClass('has-error');
    if(wrapper.find('.glyphicon-remove').length == 0){
      wrapper.find('.glyphicon-ok').remove();
      $('<span class="glyphicon glyphicon-remove form-control-feedback"></span>').insertAfter(element);
    }
  }
  else {
    wrapper.removeClass('has-error');
    wrapper.addClass('has-success');
    if(wrapper.find('.glyphicon-ok').length == 0){
      wrapper.find('.glyphicon-remove').remove();
      $('<span class="glyphicon glyphicon-ok form-control-feedback"></span>').insertAfter(element);
    }
  }
}

 checkEmpty = () => {
  
  if(this.value == ''){
    alert.html('<p>Cannot be empty.</p>');
  }
  else{
    alert.html('');
  }
}

// Listeners
$('input, textarea').on('input', function(){
  alert = $(this).parent().find('.alert');
  if(this.value == ''){
    alert.html('<p>Cannot be empty.</p>');
  }
  else{
    alert.html('');
  }
});

$('input.contact').on('input', function(){
  alert = $(this).parent().find('.alert');
  if(this.value.length != 10) {
    alert.append('<p>Must be of 10 digits.</p>');
  }
  else {
    alert.append('');
  }
});

$('input.number').on('input', function(){
  alert = $(this).parent().find('.alert');
  if(/^\d+$/.test(this.value)) {
    alert.append('');
  }
  else {
    alert.append('<p>Only numbers are allowed.</p>');
  }
});

$('input.email').on('input', function(){
  alert = $(this).parent().find('.alert');
  if(validateEmail(this.value)) {
    alert.append('');
  }
  else {
    alert.append('<p>Please enter a valid email.</p>');
  }
});


$('input, textarea').on('input', function(){
  alert = $(this).parent().find('.alert');
  if($('.alert p').length > 0) {
    $('button[type="submit"]').prop('disabled', true);;
  }
  else {
    $('button[type="submit"]').prop('disabled', false);;
  }
  changeIcon(alert);
});
