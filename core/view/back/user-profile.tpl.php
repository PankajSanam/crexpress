<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-user"></i>Edit user profile</h3></div>
			<div class="box-content nopadding">
				<ul class="tabs tabs-inline tabs-top">
					<li class='active'><a href="#profile" data-toggle='tab'><i class="icon-user"></i> Profile</a></li>
					<li><a href="#notifications" data-toggle='tab'><i class="icon-bullhorn"></i> Notifications</a></li>
					<li><a href="#security" data-toggle='tab'><i class="icon-lock"></i> Security</a></li>
				</ul>
				<div class="tab-content padding tab-content-inline tab-content-bottom">
					<div class="tab-pane active" id="profile">
						<form method="POST" class="form-horizontal">
							<div class="row-fluid">
								<div class="span2">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;"><img src="img/demo/user-1.jpg" /></div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
										<div>
											<span class="btn btn-file">
												<span class="fileupload-new">Select image</span>
												<span class="fileupload-exists">Change</span>
												<input type="file" name='avatar' />
											</span>
											<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
								</div>
								<div class="span10">
									<div class="control-group">
										<label for="first_name" class="control-label right">First Name:</label>
										<div class="controls">
											<input type="text" name="first_name" class='input-large' value="">
										</div>
									</div>
									<div class="control-group">
										<label for="last_name" class="control-label right">Last Name:</label>
										<div class="controls">
											<input type="text" name="last_name" class='input-large' value="">
										</div>
									</div>
									<div class="control-group">
										<label for="country" class="control-label right">Country:</label>
										<div class="controls">
											<select name="s2" id="simg" class='select2-me input-xlarge'>
												<option value="AF">Afghanistan</option>
												<option value="AL">Albania</option>
												<option value="DZ">Algeria</option>
												<option value="AS">American Samoa</option>
												<option value="AD">Andorra</option>
												<option value="AO">Angola</option>
												<option value="AI">Anguilla</option>
												<option value="AQ">Antarctica</option>
												<option value="AR">Argentina</option>
												<option value="AM">Armenia</option>
												<option value="AW">Aruba</option>
												<option value="AU">Australia</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BS">Bahamas</option>
												<option value="BH">Bahrain</option>
												<option value="BD">Bangladesh</option>
												<option value="BB">Barbados</option>
												<option value="BY">Belarus</option>
												<option value="BE">Belgium</option>
												<option value="BZ">Belize</option>
												<option value="BJ">Benin</option>
												<option value="BM">Bermuda</option>
												<option value="BT">Bhutan</option>
												<option value="BO">Bolivia</option>
												<option value="BA">Bosnia and Herzegowina</option>
												<option value="BW">Botswana</option>
												<option value="BV">Bouvet Island</option>
												<option value="BR">Brazil</option>
												<option value="IO">British Indian Ocean Territory</option>
												<option value="BN">Brunei Darussalam</option>
												<option value="BG">Bulgaria</option>
												<option value="BF">Burkina Faso</option>
												<option value="BI">Burundi</option>
												<option value="KH">Cambodia</option>
												<option value="CM">Cameroon</option>
												<option value="CA">Canada</option>
												<option value="CV">Cape Verde</option>
												<option value="KY">Cayman Islands</option>
												<option value="CF">Central African Republic</option>
												<option value="TD">Chad</option>
												<option value="CL">Chile</option>
												<option value="CN">China</option>
												<option value="CX">Christmas Island</option>
												<option value="CC">Cocos (Keeling) Islands</option>
												<option value="CO">Colombia</option>
												<option value="KM">Comoros</option>
												<option value="CG">Congo</option>
												<option value="CD">Congo, the Democratic Republic of the</option>
												<option value="CK">Cook Islands</option>
												<option value="CR">Costa Rica</option>
												<option value="CI">Cote d'Ivoire</option>
												<option value="HR">Croatia (Hrvatska)</option>
												<option value="CU">Cuba</option>
												<option value="CY">Cyprus</option>
												<option value="CZ">Czech Republic</option>
												<option value="DK">Denmark</option>
												<option value="DJ">Djibouti</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="EC">Ecuador</option>
												<option value="EG">Egypt</option>
												<option value="SV">El Salvador</option>
												<option value="GQ">Equatorial Guinea</option>
												<option value="ER">Eritrea</option>
												<option value="EE">Estonia</option>
												<option value="ET">Ethiopia</option>
												<option value="FK">Falkland Islands (Malvinas)</option>
												<option value="FO">Faroe Islands</option>
												<option value="FJ">Fiji</option>
												<option value="FI">Finland</option>
												<option value="FR">France</option>
												<option value="GF">French Guiana</option>
												<option value="PF">French Polynesia</option>
												<option value="TF">French Southern Territories</option>
												<option value="GA">Gabon</option>
												<option value="GM">Gambia</option>
												<option value="GE">Georgia</option>
												<option value="DE" selected="selected">Germany</option>
												<option value="GH">Ghana</option>
												<option value="GI">Gibraltar</option>
												<option value="GR">Greece</option>
												<option value="GL">Greenland</option>
												<option value="GD">Grenada</option>
												<option value="GP">Guadeloupe</option>
												<option value="GU">Guam</option>
												<option value="GT">Guatemala</option>
												<option value="GN">Guinea</option>
												<option value="GW">Guinea-Bissau</option>
												<option value="GY">Guyana</option>
												<option value="HT">Haiti</option>
												<option value="HM">Heard and Mc Donald Islands</option>
												<option value="VA">Holy See (Vatican City State)</option>
												<option value="HN">Honduras</option>
												<option value="HK">Hong Kong</option>
												<option value="HU">Hungary</option>
												<option value="IS">Iceland</option>
												<option value="IN">India</option>
												<option value="ID">Indonesia</option>
												<option value="IR">Iran (Islamic Republic of)</option>
												<option value="IQ">Iraq</option>
												<option value="IE">Ireland</option>
												<option value="IL">Israel</option>
												<option value="IT">Italy</option>
												<option value="JM">Jamaica</option>
												<option value="JP">Japan</option>
												<option value="JO">Jordan</option>
												<option value="KZ">Kazakhstan</option>
												<option value="KE">Kenya</option>
												<option value="KI">Kiribati</option>
												<option value="KP">Korea, Democratic People's Republic of</option>
												<option value="KR">Korea, Republic of</option>
												<option value="KW">Kuwait</option>
												<option value="KG">Kyrgyzstan</option>
												<option value="LA">Lao People's Democratic Republic</option>
												<option value="LV">Latvia</option>
												<option value="LB">Lebanon</option>
												<option value="LS">Lesotho</option>
												<option value="LR">Liberia</option>
												<option value="LY">Libyan Arab Jamahiriya</option>
												<option value="LI">Liechtenstein</option>
												<option value="LT">Lithuania</option>
												<option value="LU">Luxembourg</option>
												<option value="MO">Macau</option>
												<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
												<option value="MG">Madagascar</option>
												<option value="MW">Malawi</option>
												<option value="MY">Malaysia</option>
												<option value="MV">Maldives</option>
												<option value="ML">Mali</option>
												<option value="MT">Malta</option>
												<option value="MH">Marshall Islands</option>
												<option value="MQ">Martinique</option>
												<option value="MR">Mauritania</option>
												<option value="MU">Mauritius</option>
												<option value="YT">Mayotte</option>
												<option value="MX">Mexico</option>
												<option value="FM">Micronesia, Federated States of</option>
												<option value="MD">Moldova, Republic of</option>
												<option value="MC">Monaco</option>
												<option value="MN">Mongolia</option>
												<option value="MS">Montserrat</option>
												<option value="MA">Morocco</option>
												<option value="MZ">Mozambique</option>
												<option value="MM">Myanmar</option>
												<option value="NA">Namibia</option>
												<option value="NR">Nauru</option>
												<option value="NP">Nepal</option>
												<option value="NL">Netherlands</option>
												<option value="AN">Netherlands Antilles</option>
												<option value="NC">New Caledonia</option>
												<option value="NZ">New Zealand</option>
												<option value="NI">Nicaragua</option>
												<option value="NE">Niger</option>
												<option value="NG">Nigeria</option>
												<option value="NU">Niue</option>
												<option value="NF">Norfolk Island</option>
												<option value="MP">Northern Mariana Islands</option>
												<option value="NO">Norway</option>
												<option value="OM">Oman</option>
												<option value="PK">Pakistan</option>
												<option value="PW">Palau</option>
												<option value="PA">Panama</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PY">Paraguay</option>
												<option value="PE">Peru</option>
												<option value="PH">Philippines</option>
												<option value="PN">Pitcairn</option>
												<option value="PL">Poland</option>
												<option value="PT">Portugal</option>
												<option value="PR">Puerto Rico</option>
												<option value="QA">Qatar</option>
												<option value="RE">Reunion</option>
												<option value="RO">Romania</option>
												<option value="RU">Russian Federation</option>
												<option value="RW">Rwanda</option>
												<option value="KN">Saint Kitts and Nevis</option> 
												<option value="LC">Saint LUCIA</option>
												<option value="VC">Saint Vincent and the Grenadines</option>
												<option value="WS">Samoa</option>
												<option value="SM">San Marino</option>
												<option value="ST">Sao Tome and Principe</option> 
												<option value="SA">Saudi Arabia</option>
												<option value="SN">Senegal</option>
												<option value="SC">Seychelles</option>
												<option value="SL">Sierra Leone</option>
												<option value="SG">Singapore</option>
												<option value="SK">Slovakia (Slovak Republic)</option>
												<option value="SI">Slovenia</option>
												<option value="SB">Solomon Islands</option>
												<option value="SO">Somalia</option>
												<option value="ZA">South Africa</option>
												<option value="GS">South Georgia and the South Sandwich Islands</option>
												<option value="ES">Spain</option>
												<option value="LK">Sri Lanka</option>
												<option value="SH">St. Helena</option>
												<option value="PM">St. Pierre and Miquelon</option>
												<option value="SD">Sudan</option>
												<option value="SR">Suriname</option>
												<option value="SJ">Svalbard and Jan Mayen Islands</option>
												<option value="SZ">Swaziland</option>
												<option value="SE">Sweden</option>
												<option value="CH">Switzerland</option>
												<option value="SY">Syrian Arab Republic</option>
												<option value="TW">Taiwan, Province of China</option>
												<option value="TJ">Tajikistan</option>
												<option value="TZ">Tanzania, United Republic of</option>
												<option value="TH">Thailand</option>
												<option value="TG">Togo</option>
												<option value="TK">Tokelau</option>
												<option value="TO">Tonga</option>
												<option value="TT">Trinidad and Tobago</option>
												<option value="TN">Tunisia</option>
												<option value="TR">Turkey</option>
												<option value="TM">Turkmenistan</option>
												<option value="TC">Turks and Caicos Islands</option>
												<option value="TV">Tuvalu</option>
												<option value="UG">Uganda</option>
												<option value="UA">Ukraine</option>
												<option value="AE">United Arab Emirates</option>
												<option value="GB">United Kingdom</option>
												<option value="US">United States</option>
												<option value="UM">United States Minor Outlying Islands</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="VU">Vanuatu</option>
												<option value="VE">Venezuela</option>
												<option value="VN">Viet Nam</option>
												<option value="VG">Virgin Islands (British)</option>
												<option value="VI">Virgin Islands (U.S.)</option>
												<option value="WF">Wallis and Futuna Islands</option>
												<option value="EH">Western Sahara</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="email" class="control-label right">Email:</label>
										<div class="controls">
											<input type="text" name="email" class='input-xlarge' value="">
											<div class="form-button">
												<a href="#" class="btn btn-grey-4 change-input">Change</a>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="pw" class="control-label right">Password:</label>
										<div class="controls">
											<input type="password" name="password" class='input-xlarge' required>
											<div class="form-button">
												<input class="btn btn-grey-4 change-input" type="submit" name="change_password" value="Change" />
											</div>
											<?php
											if(isset($_POST['change_password'])){
												Db::update('admin',array( 'password' => $_POST['password']	),array( 'id=' => 1 ));
												$url ='user-profile.html';
												Helper::redirect($url);
											}
											?>
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" class='btn btn-primary' value="Save" name="save">
										<input type="reset" class='btn' value="Discard changes">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="notifications">
						<form action="#" class="form-horizontal">
							<div class="control-group">
								<label for="asdf" class="control-label">Email notifications</label>
								<div class="controls">
									<label class="checkbox"><input type="checkbox" name="asdf"> Send me security emails</label>
									<label class="checkbox"><input type="checkbox" name="asdf"> Send system emails</label>
								</div>
							</div>
							<div class="control-group">
								<label for="asdf" class="control-label">Email for notifications</label>
								<div class="controls">
									<select name="email" id="email">
										<option value="1">asdf@blasdas.com</option>
										<option value="2">johnDoe@asdasf.de</option>
										<option value="3">janeDoe@janejanejane.net</option>
									</select>
								</div>
							</div>
							<div class="form-actions">
								<input type="submit" class='btn btn-primary' value="Save">
								<input type="reset" class='btn' value="Discard changes">
							</div>
						</form>
					</div>
					<div class="tab-pane" id="security">
						<form action="#" class="form-horizontal">
							<div class="control-group">
								<label for="asdf" class="control-label">Disable account for</label>
								<div class="controls">
									<select name="email" id="email">
										<option value="1">1 week</option>
										<option value="2">2 weeks</option>
										<option value="3">3 weeks</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label for="asdf" class="control-label">Lock account?</label>
								<div class="controls">
									<a href="more-locked.html" class="btn btn-danger">Lock account now</a>
								</div>
							</div>
							<div class="form-actions">
								<input type="submit" class='btn btn-primary' value="Save">
								<input type="reset" class='btn' value="Discard changes">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>