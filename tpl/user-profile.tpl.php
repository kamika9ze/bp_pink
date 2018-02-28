<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
?>
<style>
.col-user-gender .form-type-radio {
	display: -webkit-inline-box;
	width: 49%;
}

.profile-body .form-item>label {
	height: 0;
}

.col-user-gender {
	/* 	margin: 17px 0; */
	
}

.profile-body input[type="text"], .profile-body select {
	padding-bottom: 0.7rem;
	/*     padding-left: 2rem; */
}

.profile-body input[type="submit"] {
	display: block;
	width: 100%;
	margin: 13px 0;
}

.profile-body .form-type-login, .profile-body .form-type-gender,
	.profile-body .form-type-birth, .profile-body .form-type-email,
	.profile-body .form-type-index, .profile-body .form-type-city,
	.profile-body .form-type-street, .profile-body .form-row-wrapper,
	.profile-body .form-type-lastname {
	padding: 0;
}
</style>


<div class="container_cabinet">
      <?php // print render(bp_shop_get_breagcrumbs_theme_arr(false)); ?>
      <h2 class="title-big thin text-center">Личные данные</h2>

	<div class="profile-body">

		<div class="profile-row">
			<form id="bp-user-profile-form">
				<div class="row">
					<div class='col-md-12'>
						<div class='row'>
							<div class=" col-md-6 col-user-gender">
								<div class="form-radios ">
									<div class="form-type-radio">
										<input type="radio" id="form-radio-female" name="type_gender"
											value="Female"
											<?php echo $user_data['Gender'] == 'Female'? 'checked' : ''; ?> />
										<label for="form-radio-female">Женщина</label>
									</div>
									<div class="form-type-radio">
										<input type="radio" id="form-radio-male" name="type_gender"
											value="Male"
											<?php echo $user_data['Gender'] == 'Male'? 'checked' : ''; ?> />
										<label for="form-radio-male">Мужчина</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class='col-md-6'>
						<div class='row'>
							<div class="col-12 col-lg-12 ">
								<div
									class="form-item form-type-text form-type-userdata  form-type-name">
									<label class="hidden" for="">Имя:</label> <input type="text"
										name=""
										value="<?php print isset($user_data['Firstname']) ? $user_data['Firstname'] : '' ?>"
										placeholder="Имя" />
								</div>
							</div>
							<div class="col-12 col-lg-12 col-md-6 ">
								<div class="form-item form-type-userdata  form-type-lastname">
									<label class="hidden" for="">Фамилия:</label> <input
										type="text" name=""
										value="<?php print isset($user_data['Surname']) ? $user_data['Surname'] : '' ?>"
										placeholder="Фамилия" />
								</div>
							</div>
							<div class="col-12 col-lg-12">
								<div
									class="form-item form-type-text form-type-userdata form-type-patronicname">
									<label class="hidden" for="">Отчество:</label> <input
										type="text" name=""
										value="<?php print isset($user_data['Middlename']) ? $user_data['Middlename'] : '' ?>"
										placeholder="Отчество" />
								</div>
							</div>
							<div class="col-12 col-lg-12">
							 <?php
        if ($user_data['BirthDate'] != '') {
            if ($user_data['BirthDate'] == '0001-01-01') {
                $user_data['BirthDate'] = '';
            } else {
                $parts = explode('-', $user_data['BirthDate']);
                if (count($parts) == 3) {
                    $user_data['BirthDate'] = "$parts[2].$parts[1].$parts[0]";
                }
            }
        }
        ?>
                             
								<div
									class="form-item form-type-text form-type-userdata form-item-datebirth">
									<label class="hidden" for="">Отчество:</label> <input
										type="text" name=""
										value="<?php print isset($user_data['BirthDate']) ? $user_data['BirthDate'] : '' ?>"
										id="datepicker" placeholder="дд.мм.гггг" />
								</div>
							</div>
						</div>
					</div>

					<div class='col-md-6'>

						<div class='row'>
							<div class='col-12 col-lg-12 col-md-6 '>
								<div
									class="form-item form-type-text form-type-userdata form-type-city">
									<label class="hidden" for="">Город:</label> <input type="text"
										name=""
										value="<?php print isset($user_data['City']) ? $user_data['City'] : '' ?>"
										id="city_data" placeholder="Город" />
								</div>
							</div>
							<div class='col-12 col-lg-12 col-md-6 '>
								<div
									class="form-item form-type-text form-type-userdata form-type-street">
									<label class="hidden" for="">Улица:</label> <input type="text"
										name=""
										value="<?php print isset($user_data['Street']) ? $user_data['Street'] : '' ?>"
										id="street_data" placeholder="Улица" />
								</div>
							</div>
						</div>
						<div class='col-12 col-lg-12 col-md-6'>
							<div class='row'>
								<div class="col-6 col-lg-6 col-md-6 form-type-house">
									<div class='row'>
										<div class="form-item form-type-text form-type-house">
											<label class="hidden" for="">Дом:</label> <input type="text"
												name=""
												value="<?php print isset($user_data['House']) ? $user_data['House'] : '' ?>"
												id="house_data" placeholder="Дом" />
										</div>
									</div>
								</div>
								<div class="col-6 col-lg-6 col-md-6  col-user-flat">
									<div class='row'>
										<div class="form-item form-type-text form-type-flat">
											<label class="hidden" for="">Квартира:</label> <input
												type="text" name=""
												value="<?php print isset($user_data['Flat']) ? $user_data['Flat'] : '' ?>"
												id="" placeholder="Квартира" />
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div id="bp-user-profile-form-actions"
						class="form-item form-type-text form-type-userdata btn_box_user_form">
						<div class="form-actions">
							<input id="edit-submit" name="op" value="Сохранить"
								class="form-submit" type="submit" />
						</div>
					</div>


				</div>

				<div class='msg-info-box'>
					<div id="bp-user-profile-form-msg"></div>
				</div>
				
				
				
				


<?php
/*
 * <div class="col-12 col-lg-6 col-md-6 col-user-login">
 * <div class="form-item form-type-text form-type-login">
 * <label class="hidden" for="">Логин:</label> <input type="text"
 * name=""
 * value="<?php print isset($user_data['Username']) ? $user_data['Username'] : '' ?>"
 * id="" placeholder="Логин" />
 * </div>
 * </div>
 *
 * <div class="col-12 col-lg-6 col-md-6 col-user-email">
 * <div class="form-item form-type-text form-type-email">
 * <label class="hidden" for="">Электронный адрес:</label> <input
 * type="text" name="" value="<?php print $user_data['Email']; ?>"
 * id="" placeholder="Электронный адрес" />
 * </div>
 * </div>
 *
 *
 *
 * <div class="col-12 col-lg-6 col-md-6 col-user-index">
 * <div class="form-item form-type-text form-type-index">
 * <label class="hidden" for="">Индекс:</label> <input type="text"
 * name=""
 * value="<?php print isset($user_data['Index']) ? $user_data['Index'] : '' ?>"
 * id="" placeholder="Индекс" />
 * </div>
 * </div>
 *
 *
 *
 *
 * <div class="col-12 col-lg-6 col-md-6 col-user-birth">
 * <?php
 * if ($user_data['BirthDate'] != '') {
 * $parts = explode('-', $user_data['BirthDate']);
 * $day = 0;
 * $month = 0;
 * $year = 0;
 * if (count($parts) == 3) {
 * $day = $parts[2] * 1;
 * $month = $parts[1] * 1;
 * $year = $parts[0];
 * }
 * }
 * ?>
 *
 * <div class="form-item form-type-birth">
 * <label for="">Дата рождения:</label>
 * <div class="form-item form-type-select form-type-birthday">
 * <select class="form-select" name="">
 * <option value="none" selected>День</option>
 * <?php for ($i = 1; $i <= 31; $i++): ?>
 * <?php $selected = ($day && $i == $day) ? 'selected="selected"' : ''; ?>
 * <option <?php print $selected; ?>
 * value="<?php print $i; ?>"><?php print $i; ?></option>
 * <?php endfor; ?>
 * </select>
 * </div>
 * <div class="form-item form-type-select form-type-birthmonth">
 * <select class="form-select" name="">
 * <option value="none" selected>Месяц</option>
 * <?php for ($i = 1; $i <= 12; $i++): ?>
 * <?php $selected = ($month && $i == $month) ? 'selected="selected"' : ''; ?>
 * <option <?php print $selected; ?>
 * value="<?php print $i; ?>"><?php print $i; ?></option>
 * <?php endfor; ?>
 * </select>
 * </div>
 * <div class="form-item form-type-select form-type-birthyear">
 * <select class="form-select" name="">
 * <option value="none" selected>Год</option>
 * <?php for ($i = 1960; $i <= date("Y"); $i++): ?>
 * <?php $selected = ($year && $i == $year) ? 'selected="selected"' : ''; ?>
 * <option <?php print $selected; ?>
 * value="<?php print $i; ?>"><?php print $i; ?></option>
 * <?php endfor; ?>
 * </select>
 * </div>
 * </div>
 *
 * </div>
 *
 * <div class="col-12 col-lg-6 col-md-6 col-user-city">
 * <div class="form-item form-type-text ">
 *
 *
 * <div class="row">
 * <div class="col-12 col-lg-12 ">
 * <div class="form-item form-type-text form-type-name">
 * <label class="hidden" for="">Имя:</label> <input type="text"
 * name=""
 * value="<?php print isset($user_data['Firstname']) ? $user_data['Firstname'] : '' ?>"
 * id="" placeholder="Имя" />
 * </div>
 * </div>
 * <div class="col-12 col-lg-12 col-md-6 col-user-lastname">
 * <div class="form-item form-type-text">
 * <label class="hidden" for="">Фамилия:</label> <input
 * type="text" name=""
 * value="<?php print isset($user_data['Surname']) ? $user_data['Surname'] : '' ?>"
 * id="" placeholder="Фамилия" />
 * </div>
 * </div>
 * <div class="col-12 col-lg-12">
 * <div class="form-item form-type-text form-type-patronicname">
 * <label class="hidden" for="">Отчество:</label> <input
 * type="text" name=""
 * value="<?php print isset($user_data['Middlename']) ? $user_data['Middlename'] : '' ?>"
 * id="" placeholder="Отчество" />
 * </div>
 * </div>
 * </div>
 * </div>
 * </div>
 *
 * <div class="col-12 col-lg-6 col-md-6 col-user-street">
 * <div class="form-item form-type-text form-type-street">
 * <label class="hidden" for="">Город:</label> <input type="text"
 * name=""
 * value="<?php print isset($user_data['City']) ? $user_data['City'] : '' ?>"
 * id="" placeholder="Город" /> <label class="hidden" for="">Улица:</label>
 * <input type="text" name=""
 * value="<?php print isset($user_data['Street']) ? $user_data['Street'] : '' ?>"
 * id="" placeholder="Улица" />
 * </div>
 *
 * <div class="row">
 * <div class="col-6 col-lg-6 col-md-6 form-type-house">
 * <div class="form-item form-type-text form-type-house">
 * <label class="hidden" for="">Дом:</label> <input type="text"
 * name=""
 * value="<?php print isset($user_data['House']) ? $user_data['House'] : '' ?>"
 * id="" placeholder="Дом" />
 * </div>
 * </div>
 * <div class="col-6 col-lg-6 col-md-6 col-user-flat">
 * <div class="form-item form-type-text form-type-flat">
 * <label class="hidden" for="">Квартира:</label> <input
 * type="text" name=""
 * value="<?php print isset($user_data['Flat']) ? $user_data['Flat'] : '' ?>"
 * id="" placeholder="Квартира" />
 * </div>
 * </div>
 * </div>
 *
 * </div>
 *
 */
?>


					<div class="col-12 col-lg-6 col-md-6 col-user-house"></div>
		
		</div>
		</form>
	</div>

	<!--<div class="profile-row">
          <div class="your-promo text-center"><span>Используй промо-код и получи скидку в 15%</span><a href="#" class="btn btn-big bg-pink">Ввести промо-код</a></div>
        </div>-->

</div>

</div>