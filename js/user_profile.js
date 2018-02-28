(function ($) {
  Drupal.behaviors.bpUserProfile = {
    attach: function (context, settings) {
      

	  $('#bp-user-profile-form #edit-submit').click(function(e) {
		var data = {
		  Username : $('.form-type-login input').val(),
		  Email : $('.form-type-email input').val(),
		  Gender : get_gender(),
		  Firstname : $('.form-type-name input').val(),
		  Middlename : $('.form-type-patronicname input').val(),
		  Surname : $('.form-type-lastname input').val(),
		  BirthDate : get_birthday_date(), 
		  City : $('.form-type-city input').val(),
		  Address : get_address(),
        }
		
		$.post('/crm/user_edit', data, function(response) {
		  response = $.parseJSON(response);
		  if (response.Success) {
            bp_show_message('Данные успешно сохранены', '#bp-user-profile-form #bp-user-profile-form-msg');
          } else {
			bp_show_message(response.Message, '#bp-user-profile-form #bp-user-profile-form-msg');
          }
        });
		e.preventDefault();
	  });
	  
	  function get_address() {
		var index = $('.form-type-index input').val();  
		var index = '';
		var street = $('.form-type-street input').val();  
		var house = $('.form-type-house input').val();  
		var flat = $('.form-type-flat input').val(); 
		var address = index + "+" + street + "+" + house + "+" + flat;
		
		return address
	  }
	  
	  //Birthday date value from form
	  function get_birthday_date() {
		  var str = "a,b,c"
			  
		var date_of_birth = "";
		var old_date = $('.form-item-datebirth input').val();
		
		var pieces = old_date.split('.');
		date_of_birth = pieces[2]+'-'+pieces[1]+'-'+pieces[0];
/*		if (  
		      $('.form-type-birthday select option:selected').length && 
		      $('.form-type-birthmonth select option:selected').length &&
		      $('.form-type-birthyear select option:selected').length &&
			  $('.form-type-birthday select option:selected').val() != 'none' &&
			  $('.form-type-birthmonth select option:selected').val() != 'none' &&
			  $('.form-type-birthyear select option:selected').val() != 'none'
			) {
			var date = new Date($('.form-type-birthyear select option:selected').val(), $('.form-type-birthmonth select option:selected').val(), $('.form-type-birthday select option:selected').val());
			
			var day = date.getDay();
			if (day < 10) {
			  day = '0' + day;	
			}
			
			var month = date.getMonth(); 
			if (month < 10) {
			  month = '0' + month;	
			}
			date_of_birth =  date.getFullYear() + "-" + month + "-" + day;
		}*/	
		console.log(date_of_birth);
		return date_of_birth;
	  }
	  
	  //gender value from form
	  function get_gender() {
	    var gender = '';
		if ($('.col-user-gender input:checked').length > 0) {
	
		  gender = 	$('.col-user-gender input:checked').val();
		} 
		return gender;
	  }
	  
	  function bp_show_message(message, id) {
	    $('.description-message').remove();
	    $('<div class = "description-message">' + message + '</div>').insertBefore( $(id));
	  }
	  
    }
  };
  
})(jQuery);