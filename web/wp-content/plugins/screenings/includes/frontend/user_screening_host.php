<?php
/**
	* File: host
	* Type: 
  * @author Victor L. Facius
	* @version 1.0
	* @package View
	**/

wp_enqueue_script('lc-screenings');

?>
<div id="host_screenings" class="lc-host-form-narrow lc-host-form-2col">
  
  <form action="<?php echo str_replace("%7E", "~", $_SERVER["REQUEST_URI"]) ?>" method="post" name="screening_form" class="validate" id="screening_form">
    <input type="hidden" name="action" value="screenings_host_add" />
    <table>
      <tr>
        <td colspan="3">
					<strong>
          (r) required fields<br/>
          (v) fields that will be visible to the public on petitesplanetes.cc
          </strong>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="divider-dotted-full">&nbsp;</div>
        </td>
      </tr>
      <tr>
        <td>
          <label for="screening_place">Place (r)(v)</label><br/>
          <input class="required initialValue" tabindex="1" type="text" id="screening_place" name="screening_place" alt="Mike\'s place / Caf&eacute; Luna / etc" />
        </td>
        <td class="lc-host-form-empty-col">&nbsp;</td>
        
        <td>
          <label for="screening_max">Maximum Attendants (r)(v)</label><br/>
          <input id="screening_max" class="required number initialValue" tabindex="2" type="text" name="screening_max" id="screening_max" alt="Maximum Attendants" /><br/>
          <input type="checkbox" tabindex="3" name="screening_status" value="1" /><span class="sub">Already fully booked</span>
        </td>
      </tr>
      
      <tr>
        <td>
          <label for="screening_address">Address (r)(v)</label><br/>
          <input class="required initialValue" tabindex="4" type="text" name="screening_address" id="screening_address" alt="Street name &amp; number" /><br/>
          <input type="checkbox" tabindex="5" name="screening_address_show" value="1" /><span class="sub">don't make this info visible!</span>
        </td>
        <td class="lc-host-form-empty-col">&nbsp;</td>
        <td>
          <label for="screening_city">City (r)(v)</label><br/>
          <input class="required initialValue" tabindex="6" name="screening_city" id="screening_city" type="text" alt="City" />
        </td>
      </tr>
      
      <tr>
				<td>
				  <label for="screening_postalcode">Postal Code (r)(v)</label><br/>
				  <input class="required initialValue" tabindex="7" type="text" name="screening_postalcode" id="screening_postalcode" alt="Postal Code" />
				</td>
				<td class="lc-host-form-empty-col">&nbsp;</td>
				<td>
				  <label for="screening_country">Country (r)(v)</label><br/>
          <select class="required" tabindex="8" name="screening_country" id="screening_country">
            <option selected="selected" value="">select your country</option>
            <option value="AF">AFGHANISTAN</option>
            <option value="AX">ALAND ISLANDS</option>
            <option value="AL">ALBANIA</option>
            <option value="DZ">ALGERIA</option>
            <option value="AS">AMERICAN SAMOA</option>
            <option value="AD">ANDORRA</option>
            <option value="AO">ANGOLA</option>
            <option value="AI">ANGUILLA</option>
            <option value="AQ">ANTARCTICA</option>
            <option value="AG">ANTIGUA AND BARBUDA</option>
            <option value="AR">ARGENTINA</option>
            <option value="AM">ARMENIA</option>
            <option value="AW">ARUBA</option>
            <option value="AU">AUSTRALIA</option>
            <option value="AT">AUSTRIA</option>
            <option value="AZ">AZERBAIJAN</option>
            <option value="BS">BAHAMAS</option>
            <option value="BH">BAHRAIN</option>
            <option value="BD">BANGLADESH</option>
            <option value="BB">BARBADOS</option>
            <option value="BY">BELARUS</option>
            <option value="BE">BELGIUM</option>
            <option value="BZ">BELIZE</option>
            <option value="BJ">BENIN</option>
            <option value="BM">BERMUDA</option>
            <option value="BT">BHUTAN</option>
            <option value="BO">BOLIVIA</option>
            <option value="BA">BOSNIA AND HERZEGOVINA</option>
            <option value="BW">BOTSWANA</option>
            <option value="BV">BOUVET ISLAND</option>
            <option value="BR">BRAZIL</option>
            <option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
            <option value="BN">BRUNEI DARUSSALAM</option>
            <option value="BG">BULGARIA</option>
            <option value="BF">BURKINA FASO</option>
            <option value="BI">BURUNDI</option>
            <option value="KH">CAMBODIA</option>
            <option value="CM">CAMEROON</option>
            <option value="CA">CANADA</option>
            <option value="CV">CAPE VERDE</option>
            <option value="KY">CAYMAN ISLANDS</option>
            <option value="CF">CENTRAL AFRICAN REPUBLIC</option>
            <option value="TD">CHAD</option>
            <option value="CL">CHILE</option>
            <option value="CN">CHINA</option>
            <option value="CX">CHRISTMAS ISLAND</option>
            <option value="CC">COCOS (KEELING) ISLANDS</option>
            <option value="CO">COLOMBIA</option>
            <option value="KM">COMOROS</option>
            <option value="CG">CONGO</option>
            <option value="CD">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
            <option value="CK">COOK ISLANDS</option>
            <option value="CR">COSTA RICA</option>
            <option value="CI">COTE D\'IVOIRE</option>
            <option value="HR">CROATIA</option>
            <option value="CU">CUBA</option>
            <option value="CY">CYPRUS</option>
            <option value="CZ">CZECH REPUBLIC</option>
            <option value="DK">DENMARK</option>
            <option value="DJ">DJIBOUTI</option>
            <option value="DM">DOMINICA</option>
            <option value="DO">DOMINICAN REPUBLIC</option>
            <option value="EC">ECUADOR</option>
            <option value="EG">EGYPT</option>
            <option value="SV">EL SALVADOR</option>
            <option value="GQ">EQUATORIAL GUINEA</option>
            <option value="ER">ERITREA</option>
            <option value="EE">ESTONIA</option>
            <option value="ET">ETHIOPIA</option>
            <option value="FK">FALKLAND ISLANDS (MALVINAS)</option>
            <option value="FO">FAROE ISLANDS</option>
            <option value="FJ">FIJI</option>
            <option value="FI">FINLAND</option>
            <option value="FR">FRANCE</option>
            <option value="GF">FRENCH GUIANA</option>
            <option value="PF">FRENCH POLYNESIA</option>
            <option value="TF">FRENCH SOUTHERN TERRITORIES</option>
            <option value="GA">GABON</option>
            <option value="GM">GAMBIA</option>
            <option value="GE">GEORGIA</option>
            <option value="DE">GERMANY</option>
            <option value="GH">GHANA</option>
            <option value="GI">GIBRALTAR</option>
            <option value="GR">GREECE</option>
            <option value="GL">GREENLAND</option>
            <option value="GD">GRENADA</option>
            <option value="GP">GUADELOUPE</option>
            <option value="GU">GUAM</option>
            <option value="GT">GUATEMALA</option>
            <option value="GN">GUINEA</option>
            <option value="GW">GUINEA-BISSAU</option>
            <option value="GY">GUYANA</option>
            <option value="HT">HAITI</option>
            <option value="HM">HEARD ISLAND AND MCDONALD ISLANDS</option>
            <option value="VA">HOLY SEE (VATICAN CITY STATE)</option>
            <option value="HN">HONDURAS</option>
            <option value="HK">HONG KONG</option>
            <option value="HU">HUNGARY</option>
            <option value="IS">ICELAND</option>
            <option value="IN">INDIA</option>
            <option value="ID">INDONESIA</option>
            <option value="IR">IRAN, ISLAMIC REPUBLIC OF</option>
            <option value="IQ">IRAQ</option>
            <option value="IE">IRELAND</option>
            <option value="IL">ISRAEL</option>
            <option value="IT">ITALY</option>
            <option value="JM">JAMAICA</option>
            <option value="JP">JAPAN</option>
            <option value="JO">JORDAN</option>
            <option value="KZ">KAZAKHSTAN</option>
            <option value="KE">KENYA</option>
            <option value="KI">KIRIBATI</option>
            <option value="KP">KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF</option>
            <option value="KR">KOREA, REPUBLIC OF</option>
            <option value="KW">KUWAIT</option>
            <option value="KG">KYRGYZSTAN</option>
            <option value="LA">LAO PEOPLE\'S DEMOCRATIC REPUBLIC</option>
            <option value="LV">LATVIA</option>
            <option value="LB">LEBANON</option>
            <option value="LS">LESOTHO</option>
            <option value="LR">LIBERIA</option>
            <option value="LY">LIBYAN ARAB JAMAHIRIYA</option>
            <option value="LI">LIECHTENSTEIN</option>
            <option value="LT">LITHUANIA</option>
            <option value="LU">LUXEMBOURG</option>
            <option value="MO">MACAO</option>
            <option value="MK">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
            <option value="MG">MADAGASCAR</option>
            <option value="MW">MALAWI</option>
            <option value="MY">MALAYSIA</option>
            <option value="MV">MALDIVES</option>
            <option value="ML">MALI</option>
            <option value="MT">MALTA</option>
            <option value="MH">MARSHALL ISLANDS</option>
            <option value="MQ">MARTINIQUE</option>
            <option value="MR">MAURITANIA</option>
            <option value="MU">MAURITIUS</option>
            <option value="YT">MAYOTTE</option>
            <option value="MX">MEXICO</option>
            <option value="FM">MICRONESIA, FEDERATED STATES OF</option>
            <option value="MD">MOLDOVA, REPUBLIC OF</option>
            <option value="MC">MONACO</option>
            <option value="MN">MONGOLIA</option>
            <option value="MS">MONTSERRAT</option>
            <option value="MA">MOROCCO</option>
            <option value="MZ">MOZAMBIQUE</option>
            <option value="MM">MYANMAR</option>
            <option value="NA">NAMIBIA</option>
            <option value="NR">NAURU</option>
            <option value="NP">NEPAL</option>
            <option value="NL">NETHERLANDS</option>
            <option value="AN">NETHERLANDS ANTILLES</option>
            <option value="NC">NEW CALEDONIA</option>
            <option value="NZ">NEW ZEALAND</option>
            <option value="NI">NICARAGUA</option>
            <option value="NE">NIGER</option>
            <option value="NG">NIGERIA</option>
            <option value="NU">NIUE</option>
            <option value="NF">NORFOLK ISLAND</option>
            <option value="MP">NORTHERN MARIANA ISLANDS</option>
            <option value="NO">NORWAY</option>
            <option value="OM">OMAN</option>
            <option value="PK">PAKISTAN</option>
            <option value="PW">PALAU</option>
            <option value="PS">PALESTINIAN TERRITORY, OCCUPIED</option>
            <option value="PA">PANAMA</option>
            <option value="PG">PAPUA NEW GUINEA</option>
            <option value="PY">PARAGUAY</option>
            <option value="PE">PERU</option>
            <option value="PH">PHILIPPINES</option>
            <option value="PN">PITCAIRN</option>
            <option value="PL">POLAND</option>
            <option value="PT">PORTUGAL</option>
            <option value="PR">PUERTO RICO</option>
            <option value="QA">QATAR</option>
            <option value="RE">REUNION</option>
            <option value="RO">ROMANIA</option>
            <option value="RU">RUSSIAN FEDERATION</option>
            <option value="RW">RWANDA</option>
            <option value="SH">SAINT HELENA</option>
            <option value="KN">SAINT KITTS AND NEVIS</option>
            <option value="LC">SAINT LUCIA</option>
            <option value="PM">SAINT PIERRE AND MIQUELON</option>
            <option value="VC">SAINT VINCENT AND THE GRENADINES</option>
            <option value="WS">SAMOA</option>
            <option value="SM">SAN MARINO</option>
            <option value="ST">SAO TOME AND PRINCIPE</option>
            <option value="SA">SAUDI ARABIA</option>
            <option value="SN">SENEGAL</option>
            <option value="CS">SERBIA AND MONTENEGRO</option>
            <option value="SC">SEYCHELLES</option>
            <option value="SL">SIERRA LEONE</option>
            <option value="SG">SINGAPORE</option>
            <option value="SK">SLOVAKIA</option>
            <option value="SI">SLOVENIA</option>
            <option value="SB">SOLOMON ISLANDS</option>
            <option value="SO">SOMALIA</option>
            <option value="ZA">SOUTH AFRICA</option>
            <option value="GS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
            <option value="ES">SPAIN</option>
            <option value="LK">SRI LANKA</option>
            <option value="SD">SUDAN</option>
            <option value="SR">SURINAME</option>
            <option value="SJ">SVALBARD AND JAN MAYEN</option>
            <option value="SZ">SWAZILAND</option>
            <option value="SE">SWEDEN</option>
            <option value="CH">SWITZERLAND</option>
            <option value="SY">SYRIAN ARAB REPUBLIC</option>
            <option value="TW">TAIWAN, PROVINCE OF CHINA</option>
            <option value="TJ">TAJIKISTAN</option>
            <option value="TZ">TANZANIA, UNITED REPUBLIC OF</option>
            <option value="TH">THAILAND</option>
            <option value="TL">TIMOR-LESTE</option>
            <option value="TG">TOGO</option>
            <option value="TK">TOKELAU</option>
            <option value="TO">TONGA</option>
            <option value="TT">TRINIDAD AND TOBAGO</option>
            <option value="TN">TUNISIA</option>
            <option value="TR">TURKEY</option>
            <option value="TM">TURKMENISTAN</option>
            <option value="TC">TURKS AND CAICOS ISLANDS</option>
            <option value="TV">TUVALU</option>
            <option value="UG">UGANDA</option>
            <option value="UA">UKRAINE</option>
            <option value="AE">UNITED ARAB EMIRATES</option>
            <option value="GB">UNITED KINGDOM</option>
            <option value="US">UNITED STATES</option>
            <option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
            <option value="UY">URUGUAY</option>
            <option value="UZ">UZBEKISTAN</option>
            <option value="VU">VANUATU</option>
            <option value="VE">VENEZUELA</option>
            <option value="VN">VIET NAM</option>
            <option value="VG">VIRGIN ISLANDS, BRITISH</option>
            <option value="VI">VIRGIN ISLANDS, U.S.</option>
            <option value="WF">WALLIS AND FUTUNA</option>
            <option value="EH">WESTERN SAHARA</option>
            <option value="YE">YEMEN</option>
            <option value="ZM">ZAMBIA</option>
            <option value="ZW">ZIMBABWE</option>
          </select>
        </td>
      </tr>
      
      <tr>
        <td>
          <label for="screening_date">Date mm/dd/yyyy (r)(v)</label><br/>
          <input class="required datepicker initialValue" tabindex="9" type="text" name="screening_date" id="screening_date" alt="mm/dd/yyyy" /> 
        </td>
        <td class="lc-host-form-empty-col">&nbsp;</td>

				<td>
          <label for="screening_date">Time hh:mm (r)(v)</label><br/>
          <input class="required timepicker initialValue" tabindex="10" type="text" name="screening_time" id="screening_time" alt="hh:mm" />
        </td>
      </tr>
      
      <tr>
        <td colspan="3">
        	<label for="screening_additional">Additional Info</label><br/>
          <textarea name="screening_additional" tabindex="20" class="initialValue" id="screening_additional" rows="6" alt="Let your guests know who you are and how you will screen the film? And if they should bring something? etc. ">Let your guests know who you are and how you will screen the film? And if they should bring something? etc. </textarea>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="divider-dotted-full">&nbsp;</div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <strong>The info below is needed so you are able to log in and manage your event and so we are able to contact you if needed </strong>
        </td>
      </tr>
      
      <tr>
        <td>
          <label for="screening_name">Your Name (r)</label><br/>
          <input class="required initialValue" tabindex="22" name="screening_name" id="screening_name" type="text" alt="Name" />
        </td>
        <td class="lc-host-form-empty-col">&nbsp;</td>
        <td>
          <label for="screening_email">Your Email (r)</label><br/>
          <input class="required initialValue" tabindex="23" name="screening_email" id="screening_email" type="text" alt="your@e-mail.com" />
        </td>
      </tr>
      
      <tr>
        <td>
          <label for="screening_password">Your Password</label><br/>
          <input class="required initialValue" tabindex="24" name="screening_password" id="screening_password" type="password" alt="password" />
        </td>
        <td class="lc-host-form-empty-col">&nbsp;</td>
        <td>
          <label for="screening_phone">Your Phone (r)</label><br/>
          <input class="required phone initialValue" tabindex="25" name="screening_phone" id="screening_phone" type="text" alt="(countrycode) + number" />
        </td>
      </tr>

    </table>
    <a class="btn-rect btn-rect-lg" onclick="javascript:lc_screenings.submit_host_form()"><div class="btn-rect-text">submit</div></a>
  </form>
</div>