<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx1dbbcab060690f7e", "4cdd83ee2c3de3c2246242bd347b8b64");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="http://res.wx.qq.com/open/libs/weui/0.4.3/weui.min.css"/>
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <title>李悦萌的天气预报</title>
</head>
<body ontouchstart>
<a href="javascript:" onclick="openLocation()" class="weui_btn weui_btn_primary">调用地图</a>
<a href="javascript:" onclick="scanQRCode()" class="weui_btn weui_btn_primary">微信扫一扫</a>




<!--两个图标库-->

<link rel="stylesheet" href="/static/css/font-awesome.css">

<link rel="stylesheet" href="/static/css/weather-icons.min.css">



<link rel="stylesheet" href="/static/css/style.css" />



<div class="wrapper">

    <p id="forget">别忘了换衣服。 <strong><a href="">城市!</a></strong></p>

    <div class="align">

        <div class="app">

            <div id="main">

                <!-- Settings Menu -->

                <div id="introscreen"><img src="svg/578457.svg"></div>



                <!---- Settings Button -->

                <span id="btn-right">

					<span></span>

					<span></span>

					<span></span>

					<span></span>

				</span>

                <!----End Settings Button -->



                <!-- Info Message-->

                <div id="info-msg">

                    <div class="msg-box">

                        <h1></h1>

                        <p></p>

                    </div>

                </div>

                <!--End Info Message-->



                <div id="settings" class="">



                    <p id="settings-info"><i class="fa fa-cog" aria-hidden="true"></i> 设置</p>



                    <div class="search-container">

                        <label>

                            <input type="text" id="search" placeholder="Search City..." required/>

                            <i class="fa fa-search" aria-hidden="true"></i>

                            <button type="button" id="update-button" placeholder="Update">更新</button>

                        </label>

                    </div>

                    <ul>

                        <li>

                            <div class="text">

                                <p>温度单位</p>

                            </div>

                            <label class="switch">

                                <input type="checkbox" id="unit">

                                <div class="slider">

                                    <p class="left"><i class="c" aria-hidden="true">°C</i></p>

                                    <p class="right"><i class="f" aria-hidden="true">°F</i></p>

                                </div>

                            </label>

                            <div class="sub-info">选择两个 °C or °F.</div>

                        </li>



                        <li>

                            <div class="text">

                                <p>气候条件</p>

                            </div>

                            <label class="switch">

                                <input type="checkbox" id="atm">

                                <div class="slider">

                                    <p class="left"><i class="fa fa-check" aria-hidden="true"></i></p>

                                    <p class="right"><i class="fa fa-times" aria-hidden="true"></i></p>

                                </div>

                            </label>

                            <div class="sub-info">大气的湿度、压力和能见度。 </div>

                        </li>



                        <li>

                            <div class="text">

                                <p>日出/日落</p>

                            </div>

                            <label class="switch">

                                <input type="checkbox" id="sun">

                                <div class="slider">

                                    <p class="left"><i class="fa fa-check" aria-hidden="true"></i></p>

                                    <p class="right"><i class="fa fa-times" aria-hidden="true"></i></p>

                                </div>

                            </label>

                            <div class="sub-info">日落/日出时间和总光照时间。</div>

                        </li>



                        <li>

                            <div class="text">

                                <p>风条件</p>

                            </div>

                            <label class="switch">

                                <input type="checkbox" id="wind">

                                <div class="slider">

                                    <p class="left"><i class="fa fa-check" aria-hidden="true"></i></p>

                                    <p class="right"><i class="fa fa-times" aria-hidden="true"></i></p>

                                </div>

                            </label>

                            <div class="sub-info">寒冷、风向和风速。</div>

                        </li>



                        <li>

                            <div class="text">

                                <p>选择一个主题</p>

                                <div class="row">

                                    <span class="green"></span>

                                    <span class="turqoise"></span>

                                    <span class="blue"></span>

                                    <span class="purple"></span>

                                </div>

                            </div>

                            <div class="sub-info">选择所需主题。按“保存”按钮更新主题！</div>

                        </li>



                    </ul>



                    <button type="button" id="save-button" placeholder="Update">保存</button>





                </div>

                <!-- End Settings Menu  -->



                <div id="central">

                    <div id="top-menu-info">

                        <p id="location">

                            <i class="fa fa-map-marker" aria-hidden="true"></i>

                            <span>布加勒斯特</span>

                        </p>

                    </div>



                    <div id="temp-div">

                        <div id="icon-temp">

                            <p>晴</p>

                            <i class="wi wi-day-cloudy" aria-hidden="true"></i>

                        </div>

                        <p id="current-temp-big">

                            <span id="ctb">17</span>

                            <span id="ctbicon">°C</span>

                        </p>

                    </div>



                    <div id="weather-menu">

						<span href="#" id="weather-menu-btn">

							<i class="fa fa-chevron-up" aria-hidden="true"></i>

						</span>



                        <ul>

                            <li id="atmli">

                                <p class="li_title">气候条件</p>

                                <div id="humidity" class="col-1">

                                    <i class="wi wi-humidity" aria-hidden="true"></i>

                                    <span>湿度 <br> <span id="hd">NaN</span></span>

                                </div>

                                <div id="pressure" class="col-2">

                                    <i class="wi wi-barometer" aria-hidden="true"></i>

                                    <span>气压 <br> <span id="pd">NaN</span></span>

                                </div>

                                <div id="visibility" class="col-3">

                                    <i class="wi wi-day-fog" aria-hidden="true"></i>

                                    <span>能见度 <br>  <span id="vd">NaN</span></span>

                                </div>

                            </li>

                            <li id="sunli">

                                <p class="li_title">日出/日落</p>

                                <div id="sunrise" class="col-1">

                                    <i class="wi wi-sunrise" aria-hidden="true"></i>

                                    <span>日出 <br> <span id="srd">NaN</span></span>

                                </div>

                                <div id="totallight" class="col-2">

                                    <i class="wi wi-time-4" aria-hidden="true"></i>

                                    <span>日光照射<br> <span id="td">NaN</span></span>

                                </div>

                                <div id="sunset" class="col-3">

                                    <i class="wi wi-sunset" aria-hidden="true"></i>

                                    <span>日落 <br> <span id="ssd">NaN</span></span>

                                </div>

                            </li>

                            <li id="windli">

                                <p class="li_title">风条件</p>

                                <div id="chill" class="col-1">

                                    <i class="wi wi-thermometer-exterior" aria-hidden="true"></i>

                                    <span>寒冷 <br> <span id="cd">NaN</span></span>

                                </div>

                                <div id="direction" class="col-2">

                                    <i class="wi wi-wind from-270-deg" aria-hidden="true"></i>

                                    <span>方向 <br> <span id="dd">NaN</span></span>

                                </div>

                                <div id="speed" class="col-3">

                                    <i class="wi wi-strong-wind" aria-hidden="true"></i>

                                    <span>风速 <br> <span id="sd">NaN</span></span>

                                </div>

                            </li>

                            <li id="forecastli">

                                <p class="li_title">9天的预测 </p>

                                <span class="day_left">

									<i class="fa fa-chevron-left" aria-hidden="true"></i>

								</span>

                                <span class="day_right">

									<i class="fa fa-chevron-right" aria-hidden="true"></i>

								</span>

                                <div class="li_row">



                                    <div class="col-1 day10item">

                                        <i class="wi wi-day-sunny" aria-hidden="true"></i>

                                        <span>星期一 <br> 20°C</span>

                                    </div>

                                    <div class="col-2 day10item" >

                                        <i class="wi wi-day-cloudy" aria-hidden="true"></i>

                                        <span>星期二 <br> 22°C</span>

                                    </div>

                                    <div class="col-3 day10item">

                                        <i class="wi wi-day-rain" aria-hidden="true"></i>

                                        <span>星期三 <br> 15°C</span>

                                    </div>



                                    <div class="col-1 day10item">

                                        <i class="wi wi-day-sunny" aria-hidden="true"></i>

                                        <span>星期四 <br> 20°C</span>

                                    </div>

                                    <div class="col-2 day10item" >

                                        <i class="wi wi-day-cloudy" aria-hidden="true"></i>

                                        <span>星期五 <br> 22°C</span>

                                    </div>

                                    <div class="col-3 day10item">

                                        <i class="wi wi-day-rain" aria-hidden="true"></i>

                                        <span>星期六 <br> 15°C</span>

                                    </div>



                                    <div class="col-1 day10item">

                                        <i class="wi wi-day-sunny" aria-hidden="true"></i>

                                        <span>星期一 <br> 20°C</span>

                                    </div>

                                    <div class="col-2 day10item" >

                                        <i class="wi wi-day-cloudy" aria-hidden="true"></i>

                                        <span>星期二 <br> 22°C</span>

                                    </div>

                                    <div class="col-3 day10item">

                                        <i class="wi wi-day-rain" aria-hidden="true"></i>

                                        <span>星期三 <br> 15°C</span>

                                    </div>

                                </div>



                                <div id="dotmenu">

                                    <span class="currentday"></span>

                                    <span></span>

                                    <span></span>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>



            </div>

        </div>





    </div>

</div>



<script>

    $(document).ready(function(){

        //Caching DOM elements

        var $rightMenu = $('#settings'),

            $rightButton = $('#btn-right'),

            $weatherMenu = $('#weather-menu'),

            $Main = $('#main'),

            $Central = $('#central'),

            $Info = $('#info-msg'),

            $InfoMsgBx = $('#info-msg .msg-box'),

            $tempDiv = $('#temp-div');



        var arrayThemes = ['green','turqoise','blue','purple'],

            randomTheme = Math.floor(Math.random() * 4),

            array_ID = ['#unit','#atm','#sun','#wind'],

            settingsList = $('#settings ul li, .search-container'),

            SettingsArray = [],

            info = {

                "Char":[

                    "Invalid Characters!","Please use only letters! (aA-zZ)"

                ],

                "Loc":[

                    "Invalid Location","Please update your location!"

                ],

                "Loading":[

                    "Searching for location...","Location found!"

                ],

                "Loading2":[

                    "Saving, Please wait...","Save Complete!"

                ]

            };

        //End Caching DOM elements

        var currentSlide = 0,

            currentSlideX = [0,358,718],

            $dotmenu = $('#dotmenu span');

        var GetData = true,

            temp_location,

            LocalSettings,

            LoadedData;



        function WeatherIcon(d){

            var icon = "wi ";

            switch(parseInt(d)) {

                case 0: 								icon += 'wi-tornado'; break;

                case 1: case 3: case 4: icon += 'wi-thunderstorm'; break;

                case 2: 								icon += 'wi-hurricane'; break;

                case 5: 								icon += 'wi-rain-mix'; break;

                case 6: case 7: 				icon += 'wi-sleet'; break;

                case 8: case 9: 				icon += 'wi-raindrops'; break;

                case 10: 								icon += 'wi-sprinkle'; break;

                case 11: case 12: 			icon += 'wi-showers'; break;

                case 13: case 14: 			icon += 'wi-snowflake-cold'; break;

                case 15: case 16: 			icon += 'wi-snow-wind'; break;

                case 17: 								icon += 'wi-hail'; break;

                case 18: 								icon += 'wi-sleet'; break;

                case 19: 								icon += 'wi-dust'; break;

                case 20: 								icon += 'wi-fog'; break;

                case 21: 								icon += 'wi-day-haze'; break;

                case 22: 								icon += 'wi-smog'; break;

                case 23: 								icon += 'wi-strong-wind'; break;

                case 24: 								icon += 'wi-windy'; break;

                case 25: 								icon += 'wi-thermometer-exterior'; break;

                case 26:case 27:case 28:case 29:case 30:icon += 'wi-cloudy'; break;

                case 31: case 33:			  icon += 'wi-night-clear'; break;

                case 32: case 34:				icon += 'wi-day-sunny'; break;

                case 35: 								icon += 'wi-hail'; break;

                case 36: 								icon += 'wi-hot'; break;

                case 37:case 38:case 39:icon += 'wi-thunderstorm'; break;

                case 40: 								icon += 'wi-showers'; break;

                case 41:case 42:case 43:icon += 'wi-snow'; break;

                case 44:  							icon += 'wi-cloudy'; break;



                default:								icon += 'wi-na';

            }

            return icon;

        }

        function ApplyData(d){

            // Location

            var $locspan = $('#location span'),

                $ctbicon = $('#ctbicon'),

                $ctb = $('#ctb'),

                $icontempi = $('#icon-temp i'),

                $icontempp = $('#icon-temp p');



            $locspan.text(d.location.city);

            // Central Info

            let currentTemp = d.item.condition.temp;

            let icon = WeatherIcon(d.item.condition.code);



            if(SettingsArray[0] == 1){

                $ctbicon.text("°C");

            }

            else{

                $ctbicon.text("°F");

                currentTemp = (convertToF(currentTemp)).replace("°F","");

            }

            $ctb.text(currentTemp);

            $icontempi.removeClass().addClass(icon);

            $icontempp.text(d.item.condition.text);



            //Atmospheric Conditions

            var $atm = $('#atm'),

                $atmli = $('#atmli'),

                $hd=$('#hd'),

                $pd=$('#pd'),

                $vd=$('#vd');



            if( $atm.prop('checked') == true ){

                $atmli.removeClass().addClass('aswshown');



                let pressure = d.atmosphere.pressure;

                let visib = d.atmosphere.visibility;



                if(SettingsArray[0] == 1){

                    pressure = parseFloat((pressure * 0.02953)/1.3332239).toFixed(2) + " mmHg";

                    visib = parseFloat(visib).toFixed(2) + " " + d.units.distance;

                }

                else{

                    pressure = parseFloat(pressure * 0.02953).toFixed(2) + " in";

                    visib = parseFloat(visib / 1.60934 ).toFixed(2) + " mi";

                }

                $hd.text(d.atmosphere.humidity + "%");

                $pd.text(pressure);

                $vd.text(visib);

            }

            else{

                $atmli.removeClass().addClass('aswhidden');

            }

            //Sunrise/Sunset

            var $sun =  $('#sun'),

                $sunli = $('#sunli'),

                $srd = $('#srd'),

                $ssd = $('#ssd'),

                $td = $('#td');



            if( $sun.prop('checked') == true ){

                $sunli.removeClass().addClass('aswshown');

                let sunrise = d.astronomy.sunrise.replace(" am","").split(":");

                let sunset = d.astronomy.sunset.replace(" pm","").split(":");



                if(sunset[1].length < 2){

                    sunset[1] = "0" + sunset[1];

                }



                if(SettingsArray[0] == 1){

                    $srd.text( sunrise[0] + ":" + sunrise[1] );

                    $ssd.text( (parseInt(sunset[0]) + 12) + ":" + sunset[1]) ;

                }

                else{

                    $srd.text( sunrise[0] + ":" + sunrise[1] + " am");

                    $ssd.text( sunset[0]+ ":" + sunset[1] + " pm");

                }

                let totalHours = (parseInt(sunset[0]) + 12) - parseInt(sunrise[0]);

                let minDif,

                    sr = parseInt(sunrise[1]),

                    ss = parseInt(sunset[1]);

                if( sr < ss ){

                    minDif = ss - sr;

                }else{

                    minDif = (60 - sr) + ss;

                }

                $td.text(totalHours + ":" + minDif);

            }

            else{

                $sunli.removeClass().addClass('aswhidden');

            }

            // Wind Conditions

            var $wind = $('#wind'),

                $windli = $('#windli'),

                $cd = $('#cd'),

                $sd	=	$('#sd'),

                $cd	=	$('#cd'),

                $dd	=	$('#dd'),

                $directioni	=	$('#direction i')



            if($wind.prop('checked') == true ){

                $windli.removeClass().addClass('aswshown');

                let speedWind = d.wind.speed,

                    tempChillText = "",

                    tempChill = d.wind.chill;



                if(SettingsArray[0] == 1){

                    speedWind = d.wind.speed + " km/h";

                    tempChill += "°C";

                }

                else{

                    speedWind = parseFloat(speedWind / 1.60934).toFixed(2) + " mph";

                    tempChill = convertToF(tempChill);

                }

                let iconWind = "wi "

                if(d.wind.direction >= 0 && d.wind.direction <= 90){

                    iconWind += "wi-direction-right";

                }else if(d.wind.direction > 90 && d.wind.direction <= 180){

                    iconWind += "wi-direction-up";

                }else if(d.wind.direction > 180 && d.wind.direction <= 270){

                    iconWind += "wi-direction-left";

                }else if(d.wind.direction > 270 && d.wind.direction <= 360){

                    iconWind += "wi-direction-down";

                }



                $sd.text(speedWind);

                $cd.text(tempChill);

                $directioni.removeClass().addClass(iconWind);

                $dd.text(d.wind.direction + "°");

            }else{

                $windli.removeClass().addClass('aswhidden');

            }



            // 9 Days forecast

            var $10days = $('.day10item');

            for(var item = 0; item < $10days.length; item++){

                let CurrentDay = d.item.forecast[item+1].day;

                let CurrentTemp = d.item.forecast[item+1].high;

                let CurrentTempLow = d.item.forecast[item+1].low;

                let CurrentIcon = WeatherIcon(d.item.forecast[item+1].code);



                if(SettingsArray[0] == 1) {

                    CurrentTemp += "°C";

                    CurrentTempLow += "°C";

                }else{

                    CurrentTemp = convertToF(CurrentTemp);

                    CurrentTempLow = convertToF(CurrentTempLow);

                }



                $($10days[item]).find('i').removeClass().addClass(CurrentIcon);

                $($10days[item]).find('span').html(CurrentDay + "</br>" + CurrentTemp + " | " + CurrentTempLow);

            }

        }

        function getWeather(loc){

            let querie = 'https://query.yahooapis.com/v1/public/yql?q=select units,astronomy,atmosphere,wind,location,item from weather.forecast where woeid in (select woeid from geo.places(1) where text="'+ loc +'") and u="c"&format=json'



            $.getJSON(querie, function(data) {

                LoadedData = data.query.results.channel;

                //console.log(LoadedData);



                if(LoadedData != null){

                    //Apply data to elements

                    ApplyData(LoadedData);

                }

            });

        }

        function toLocalStorage(){

            // Save to local storage

            LocalSettings = SettingsArray.toString();

            localStorage.setItem('SavedData', LocalSettings);

        }

        function LoadLocalStorage(){

            LocalSettings = localStorage.getItem('SavedData');



            if (LocalSettings == null){

                var Settings = '1,1,1,1,' + arrayThemes[randomTheme] + ',Bucharest';

                SettingsArray = Settings.split(',');



                getWeather('London');

                toLocalStorage();

            }

            else{

                SettingsArray = LocalSettings.split(',');

                getWeather(SettingsArray[SettingsArray.length-1]);

            }

        }

        function LoadCheckboxSettings(){

            // General Settings

            for(var i = 0; i < array_ID.length; i++){

                if(SettingsArray[i] == '1'){

                    $(array_ID[i]).prop('checked',true);

                }

            }

            // Apply theme

            $Main.addClass(SettingsArray[SettingsArray.length-2] + " poor-Mozilla");

            $('span.' + SettingsArray[SettingsArray.length-2]).addClass('current');

        }

        function UpdateErrorMsg(value,type){

            $Info.addClass('show');

            $InfoMsgBx.addClass('open');



            $InfoMsgBx.find('h1').text(info[value][0]);

            $InfoMsgBx.find('p').text(info[value][1]).removeClass('loading');



            if(type === 0){

                $InfoMsgBx.append("<div id='ok-btn'>Ok</div>");

            }

            else{

                //append loading

                $InfoMsgBx.find('.loader').remove();

                $InfoMsgBx.find('p').css("opacity", "0");

                $InfoMsgBx.append("<div class='loader'></div>");



                setTimeout(function () {

                    $InfoMsgBx.find('p').addClass('loading').animate({opacity: 1});

                    $InfoMsgBx.find('.loader').remove();

                }, 1750);



            }

        }

        function isValid(string) {

            var char = '~`!#$%^&*+=[]\';,/{}|\":<>?@1234567890';

            for (var i = 0; i < string.length; i++) {

                if (char.indexOf(string.charAt(i)) != -1) {

                    GetData = false;

                    return false;

                }

            }

        }

        function checkBlank(string) {

            var count = 0;

            for (var i = 0; i < string.length; i++) {

                if(string[i] == " ") {count += 1;}

            }

            if( string.length == count || string.length <= 3 ){

                GetData = false;

                return true;

            }

        }

        function LoadIntro(){

            $('#btn-right').css("display", "none");

            $('#weather-menu-btn').css("display", "none");



            $('#introscreen').addClass('sunloading');

            setTimeout(function(){

                $('#introscreen').addClass('animfin');



                $('#btn-right').removeAttr('style');

                $('#weather-menu-btn').removeAttr('style');

            }, 750);

            setTimeout(function(){

                $('#introscreen').remove();

            }, 1350);

            setTimeout(function(){

                $('#forget').addClass('hide');

            }, 7500);

        }

        function convertToF(temp){

            temp = (temp * 9/5 + 32).toFixed(0) + "°F";

            return temp;

        }

        // Update Checkbox

        $('input[type=checkbox]').on('change',function(e){

            let index = $( 'input[type=checkbox]' ).index(this);

            if( $(this).prop('checked') ){

                SettingsArray[index] = '1';

            }else{

                SettingsArray[index] = '0';

            }

        })



        // Open Settings Menu

        $('#main').on('click','#btn-right, #weather-menu-btn',function(e){

            e.preventDefault();

            var $CurrentButton = $(this);



            if( $CurrentButton.is("#btn-right") ){

                $rightButton.toggleClass('open');

                $rightMenu.toggleClass('show');



                $('body').removeAttr('class');

            }

            else if( $CurrentButton.is("#weather-menu-btn") )

            {

                $weatherMenu.toggleClass('show');



                if( $tempDiv.hasClass('') ){

                    $tempDiv.addClass('weather-menu-show');

                }

                else{

                    $tempDiv.removeClass('weather-menu-show');

                }

            }



            if( $rightMenu.hasClass('show') ){

                $rightButton.prop('disabled', true);

                $Main.removeClass('poor-Mozilla');



                $('body').addClass(SettingsArray[4]);

                $(settingsList).each(function(j){

                    setTimeout(function () {

                        $(settingsList[j]).addClass('slideAnimation');

                    }, 35 * j);

                });



                setTimeout(function(){

                    $rightButton.prop('disabled', false);

                    $Main.addClass('poor-Mozilla');

                }, 595);

            }

            else if( $rightMenu.hasClass('') ){

                $rightButton.prop('disabled', true);

                $Main.removeClass('poor-Mozilla');



                ApplyData(LoadedData);



                $('body').removeAttr('class');

                setTimeout(function(){

                    $rightButton.prop('disabled', false);

                    $(settingsList).each(function(j){

                        $(this).removeClass('slideAnimation');

                    });

                    $Main.addClass('poor-Mozilla');

                }, 595);

            }

        })



        // Change Theme

        $('.row').on('click','span',function(e){

            var new_theme = $(this).attr('class').split(' ');

            if( new_theme[1] != 'current' ){

                $('.row span.' + SettingsArray[4]).removeClass('current');

                $(this).addClass('current');



                SettingsArray[4] = new_theme[0];

            }

            $Main.removeAttr('class').addClass(SettingsArray[4] + ' poor-Mozilla');

            $('body').removeAttr('class').addClass(SettingsArray[4]);

        })



        // Update Button

        $('#settings').on('click','#update-button',function(e){

            temp_location = $('#search').val();



            if( temp_location == "" ){

                temp_location = SettingsArray[5];

                GetData = true;

            }

            else{

                var checkforinvalid = isValid(temp_location);

                var checkforblank = checkBlank(temp_location);



                if( $rightMenu.hasClass('show') && (checkforinvalid == false || checkforblank == true ) ){

                    UpdateErrorMsg("Char",0);

                }

                else{

                    UpdateErrorMsg("Loading",1);



                    SettingsArray[5] = temp_location;

                    getWeather(SettingsArray[SettingsArray.length-1]);



                    setTimeout(function(){

                        $Info.removeClass('show');

                        $InfoMsgBx.removeClass('open');



                        GetData = true;

                    }, 2500);

                }

            }

        })



        // Error Button

        $('#info-msg').on('click','#ok-btn',function(e){

            if( $Info.hasClass('show') ){

                $Info.removeClass('show');

                $InfoMsgBx.removeClass('open');

                $InfoMsgBx.find('#ok-btn').remove();

            }

        })



        // Save button

        $('#settings').on('click','#save-button',function(e){

            // Check if location is valid or not and add the info msg.

            if( $rightMenu.hasClass('show') && ( GetData == false ) ){

                $Info.addClass('show');

                $InfoMsgBx.addClass('open');



                UpdateErrorMsg("Loc",0);

            }else{

                UpdateErrorMsg("Loading2",1);



                setTimeout(function(){

                    $Info.removeClass('show');

                    $InfoMsgBx.removeClass('open');



                    toLocalStorage();

                }, 2500);

            }

        })



        $('#weather-menu').on('click','.day_left, .day_right, #dotmenu span',function(){

            var $button = $(this);



            if( $button.hasClass('day_right') && currentSlide != 2 ){

                currentSlide += 1;

            }

            else if( $button.hasClass('day_left') && currentSlide != 0){

                currentSlide -= 1;

            }

            else if( $button.hasClass('') ){

                var indexbtn = $button.index();

                currentSlide = indexbtn;

            }

            $('.li_row').css('transform', 'translateX(-' + currentSlideX[currentSlide] + 'px)');

            $('.currentday').removeClass('currentday');

            $dotmenu.eq(currentSlide).addClass('currentday');



        })

        //End buttons





        // Call the functions

        LoadIntro();

        LoadLocalStorage();

        LoadCheckboxSettings();



        console.log("Hello there ??");

    }); // End $(document).ready







</script>



<div style="text-align:center;margin:1px 0; font:normal 14px/24px 'MicroSoft YaHei';">



</div>


</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    /*
     * 注意：
     * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
     * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
     * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
     *
     * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
     * 邮箱地址：weixin-open@qq.com
     * 邮件主题：【微信JS-SDK反馈】具体问题
     * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
     */

    let latitude = 0.0;
    let longitude = 0.0;
    wx.config({
        debug: true,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'getLocation',
            'openLocation',
            'scanQRCode',
        ]
    });
    wx.ready(function () {
        // 在这里调用 API
        wx.getLocation({
            type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
            success: function (res) {
                latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                alert("latitude:" + latitude + "longitude:" + longitude);
            }
        });
    });

    function openLocation() {
        wx.ready(function () {
            wx.openLocation({
                latitude: latitude, // 纬度，浮点数，范围为90 ~ -90
                longitude: longitude, // 经度，浮点数，范围为180 ~ -180。
                name: '', // 位置名
                address: '', // 地址详情说明
                scale: 15, // 地图缩放级别,整形值,范围从1~28。默认为最大
                infoUrl: '' // 在查看位置界面底部显示的超链接,可点击跳转
            });
        });
    }


    function scanQRCode() {
        wx.ready(function () {
            wx.scanQRCode({
                needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
                scanType: ["qrCode", "barCode"], // 可以指定扫二维码还是一维码，默认二者都有
                success: function (res) {
                    var result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
                }
            });
        });
    }

</script>
</html>
