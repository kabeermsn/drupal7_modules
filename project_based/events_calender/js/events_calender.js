var language
var monthName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var monthNameAr = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
(function ($) {
  language = Drupal.settings.language;
  var eventCalenderDetails =  Drupal.settings.calenderDetails;
  var eventDates = eventCalenderDetails.dates;
  var eventDetails = eventCalenderDetails.eventDetails;
  var currentDate = eventCalenderDetails.currentDate;
  setCalenderAsideBlock(eventDetails[currentDate['date']]['events'], currentDate['day'], currentDate['month'], currentDate['year']);
  jQuery('.responsive-calendar').responsiveCalendar({
    language:language,
    translateMonths:(language == 'ar')? monthNameAr:monthName,
    startFromSunday:true,
    events: eventDates,
    onDayClick: function(events) {
      $('.day').removeClass('current');
      $(this).parent().addClass('current');
      var key = $(this).attr('data-year')+'-'+addLeadingZero($(this).attr('data-month') )+'-'+addLeadingZero($(this).attr('data-day'));

      if(eventDetails[key] != undefined) setCalenderAsideBlock(eventDetails[key]['events'], eventDetails[key]['day'], eventDetails[key]['month'], eventDetails[key]['year']);
      else {
        var monthNumber = $(this).attr('data-month');
        setCalenderAsideBlock(undefined, $(this).attr('data-day'), monthNumber, addLeadingZero($(this).attr('data-year') ));
      }

    },
  });
})(jQuery);


function addLeadingZero(num) {
  if (num < 10) {
    return "0" + num;
  } else {
    return "" + num;
  }
}

function setCalenderAsideBlock(events, day, month, year) {
  var eventListingString = (language == 'ar')? '<span class="no-results">لاتوجد فعاليات مطابقة لهذا الخيار. يرجى تغيير الخيار للبحث مرة اخرى</span>':'<span class="no-results">There is no Events to show for the Selected Date</span>';
  var selectedDateString  = (language == 'ar')? 'التاريخ المحدد':'SELECTED DATE';
  var classFaLeft = (language == 'ar') ? 'fa-chevron-left':'fa-chevron-right';
  var eventsIdsForDay = [];

  if(events != undefined) {
    eventListingString = '<ul>';

    events.forEach(function(element) {
      var eventName = element.name;
      var eventUrl = element.url;
      var nid = element.id;
      if(jQuery.inArray(nid, eventsIdsForDay) == -1) {
        eventsIdsForDay.push(nid);
        eventListingString += '<li><a href="'+eventUrl+'"><i class="fa '+classFaLeft+'" aria-hidden="true"></i>'+eventName+'</a></li>';
      }

    });

    eventListingString += '</ul>';
  }
  var day = (language == 'ar')?toPersianNum(day):day;
  var monthNameString = (language == 'ar')? monthNameAr[month -1]:monthName[month - 1];
  var year = (language == 'ar')?toPersianNum(year):year;

  var eventDetailString = '<div class="col-sm-6 pull-left no-padding cal-event-details"><div class="cal-event-list-wrap"><div class="cal-events-top"><span>'+selectedDateString+'</span></div><div class="cal-events-date"><span>'+day+'</span><span>'+monthNameString+' '+year +'</span><hr/></div><div class="cal-events-list">'+eventListingString+'</div></div></div>';

  $('.cal-event-details').replaceWith(eventDetailString);

  if($('.cal-events-list ul').length){
    $(".cal-events-list ul").mCustomScrollbar();
  }
}


function toPersianNum( num, dontTrim ) {

  var i = 0,

  dontTrim = dontTrim || false,

  num = dontTrim ? num.toString() : num.toString().trim(),
  len = num.length,

  res = '',
  pos,

  persianNumbers = typeof persianNumber == 'undefined' ?
  ["٠","١","٢","٣","٤","٥","٦","٧","٨","٩"] :
  persianNumbers;

  for (; i < len; i++)
    if (( pos = persianNumbers[num.charAt(i)] ))
      res += pos;
    else
      res += num.charAt(i);

    return res;
}
