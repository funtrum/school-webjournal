"use strict"; // по желанию, конечно, но помогает избежать нелепых ошибок наследования
(function(window, undefined){
    var mX1,mY1; // Координаты касания
    var deltaX,deltaY;//Изменение координат
    var m_down_flag = false;//Статус кнопки мыши
 
    //$(".week").width(1920);

    // Зажата клавиша мыши
    window.onmousedown = function(e){
        //e.preventDefault()
        m_down_flag = true;
        mX1 = e.pageX;
        mY1 = e.pageY; 
        document.body.style.cursor = "move";
    }
        
    // Отпущена клавиша мыши
    window.onmouseup = function(){
        m_down_flag = false;
        document.body.style.cursor = "auto";
    }

    //Тащим страницу
    window.onmousemove=function(e){
        if(m_down_flag){//Если кнопка нажата
            deltaX = mX1 - e.pageX;
            deltaY = mY1 - e.pageY;
            window.scrollBy(deltaX,deltaY);
        }
    }
})(window);

window.onscroll=function(){
var s=(document.documentElement.scrollLeft||document.body.scrollLeft);
 
 };

jQuery(function(){
    for (var i = 1; i < 61; i++) {
      jQuery("#c"+i).flip({
        axis: "x",
        trigger: "click"
      });
    }
});

function scrollToElement(selector, time, verticalOffset) {
    time = typeof(time) != 'undefined' ? time : 1000;
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = jQuery(selector);
    offset = element.offset();
    offsetTop = offset.top + verticalOffset;
    jQuery('html, body').animate({
        scrollTop: offsetTop
    }, time);           
}

jQuery(document).ready( function($) {
 jQuery('.mhead').attr("onclick","return true");
 jQuery('.toggle-left-panel').attr("onclick","return true");
});

function mon() {
    scrollToElement('#monday.day', 1000, -85);
    jQuery('#monday.dhead').css('text-shadow', '0 0 0 rgba(51, 51, 51, 1)');
    jQuery('#monday.lname').css('text-shadow', '0 0 0 rgba(44, 62, 80, 1)');
    jQuery('#monday.lhw').css('text-shadow', '0 0 0 rgba(52, 73, 94, 1)');
    jQuery('#monday.lgrad').css('text-shadow', '0 0 0 rgba(192, 57, 43, 1)');
    jQuery('#monday.ltheme').css('text-shadow', '0 0 0 rgba(52, 152, 219, 1)');
    jQuery('#monday.day').css('background-color', 'rgba(255, 255, 255, 1)');
    
    jQuery('#tuesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#tuesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#wednesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#wednesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#thursday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#thursday').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#friday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#friday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#saturday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#saturday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
}

function tue() {
    scrollToElement('#tuesday.day', 1000, -85);
    jQuery('#monday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#monday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#tuesday.dhead').css('text-shadow', '0 0 0 rgba(51, 51, 51, 1)');
    jQuery('#tuesday.lname').css('text-shadow', '0 0 0 rgba(44, 62, 80, 1)');
    jQuery('#tuesday.lhw').css('text-shadow', '0 0 0 rgba(52, 73, 94, 1)');
    jQuery('#tuesday.lgrad').css('text-shadow', '0 0 0 rgba(192, 57, 43, 1)');
    jQuery('#tuesday.ltheme').css('text-shadow', '0 0 0 rgba(52, 152, 219, 1)');
    jQuery('#tuesday.day').css('background-color', 'rgba(255, 255, 255, 1)');
    
    jQuery('#wednesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#wednesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#thursday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#thursday').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#friday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#friday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#saturday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#saturday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
}

function wed() {
    scrollToElement('#wednesday.day', 1000, -85);
    jQuery('#monday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#monday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#tuesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#tuesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#wednesday.dhead').css('text-shadow', '0 0 0 rgba(51, 51, 51, 1)');
    jQuery('#wednesday.lname').css('text-shadow', '0 0 0 rgba(44, 62, 80, 1)');
    jQuery('#wednesday.lhw').css('text-shadow', '0 0 0 rgba(52, 73, 94, 1)');
    jQuery('#wednesday.lgrad').css('text-shadow', '0 0 0 rgba(192, 57, 43, 1)');
    jQuery('#wednesday.ltheme').css('text-shadow', '0 0 0 rgba(52, 152, 219, 1)');
    jQuery('#wednesday.day').css('background-color', 'rgba(255, 255, 255, 1)');
    
    jQuery('#thursday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#thursday').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#friday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#friday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#saturday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#saturday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
}

function thu() {
    scrollToElement('#thursday', 1000, -85);
    jQuery('#monday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#monday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#tuesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#tuesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#wednesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#wednesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#thursday.dhead').css('text-shadow', '0 0 0 rgba(51, 51, 51, 1)');
    jQuery('#thursday.lname').css('text-shadow', '0 0 0 rgba(44, 62, 80, 1)');
    jQuery('#thursday.lhw').css('text-shadow', '0 0 0 rgba(52, 73, 94, 1)');
    jQuery('#thursday.lgrad').css('text-shadow', '0 0 0 rgba(192, 57, 43, 1)');
    jQuery('#thursday.ltheme').css('text-shadow', '0 0 0 rgba(52, 152, 219, 1)');
    jQuery('#thursday').css('background-color', 'rgba(255, 255, 255, 1)');
    
    jQuery('#friday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#friday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#saturday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#saturday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
}

function fri() {
    scrollToElement('#friday.day', 1000, -85);
    jQuery('#monday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#monday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#tuesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#tuesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#wednesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#wednesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#thursday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#thursday').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#friday.dhead').css('text-shadow', '0 0 0 rgba(51, 51, 51, 1)');
    jQuery('#friday.lname').css('text-shadow', '0 0 0 rgba(44, 62, 80, 1)');
    jQuery('#friday.lhw').css('text-shadow', '0 0 0 rgba(52, 73, 94, 1)');
    jQuery('#friday.lgrad').css('text-shadow', '0 0 0 rgba(192, 57, 43, 1)');
    jQuery('#friday.ltheme').css('text-shadow', '0 0 0 rgba(52, 152, 219, 1)');
    jQuery('#friday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#friday.day').css('background-color', 'rgba(255, 255, 255, 1)');
    
    jQuery('#saturday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#saturday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#saturday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
}

function sat() {
    scrollToElement('#saturday.day', 1000, -85);
    jQuery('#monday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#monday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#monday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#tuesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#tuesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#tuesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#wednesday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#wednesday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#wednesday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#thursday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#thursday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#thursday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#friday.dhead').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lname').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lhw').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.lgrad').css('text-shadow', '0 0 10px rgba(0, 0, 0, 0.5)');
    jQuery('#friday.ltheme').css('text-shadow', '0 0 10px rgba(52, 152, 219, 0.5)');
    jQuery('#friday.day').css('background-color', 'rgba(255, 255, 255, 0.5)');
    
    jQuery('#saturday.dhead').css('text-shadow', '0 0 0 rgba(51, 51, 51, 1)');
    jQuery('#saturday.lname').css('text-shadow', '0 0 0 rgba(44, 62, 80, 1)');
    jQuery('#saturday.lhw').css('text-shadow', '0 0 0 rgba(52, 73, 94, 1)');
    jQuery('#saturday.lgrad').css('text-shadow', '0 0 0 rgba(192, 57, 43, 1)');
    jQuery('#saturday.ltheme').css('text-shadow', '0 0 0 rgba(52, 152, 219, 1)');
    jQuery('#saturday.day').css('background-color', 'rgba(255, 255, 255, 1)');
}

jQuery('#quit-btn').click(function() {
    jQuery.ajax({
       url: '../quit.php',
       dataType: 'json',
       success: function(data){
            location.assign('/');
       },
        error: function(response) {
            location.assign('/');
        }
    });
});

var wid = parseInt(document.getElementById('wid').innerHTML);

jQuery("#control-p").click(function(){
    jQuery("body").css("-webkit-filter", "blur(10px)");
    jQuery("body").css("filter", "blur(10px)");
    if (wid==1) {wid=1} else{wid = wid-1;}
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'1', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+1;
                if (data.monday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".monday").text(data.monday.subjects[0][i]);
                    jQuery("#theme"+i+".monday").text(data.monday.themes[0][i]);
                    jQuery("#hw"+i+".monday").text(data.monday.homework[0][i]);
                    jQuery("#cab"+i+".monday").text(data.monday.cabinets[0][i]);
                    jQuery("#mark"+i+".monday").text(data.monday.mark[0][i]);
                }
            };
            jQuery("#week-dates").text(data.weekdates);
            jQuery("day-head.monday").text("Monday - "+data.monday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'2', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+10;
                if (data.tuesday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".tuesday").text(data.tuesday.subjects[0][i]);
                    jQuery("#theme"+i+".tuesday").text(data.tuesday.themes[0][i]);
                    jQuery("#hw"+i+".tuesday").text(data.tuesday.homework[0][i]);
                    jQuery("#cab"+i+".tuesday").text(data.tuesday.cabinets[0][i]);
                    jQuery("#mark"+i+".tuesday").text(data.tuesday.mark[0][i]);
                }
            };
            jQuery("day-head.tuesday").text("Tuesday - "+data.tuesday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'3', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+20;
                if (data.wednesday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".wednesday").text(data.wednesday.subjects[0][i]);
                    jQuery("#theme"+i+".wednesday").text(data.wednesday.themes[0][i]);
                    jQuery("#hw"+i+".wednesday").text(data.wednesday.homework[0][i]);
                    jQuery("#cab"+i+".wednesday").text(data.wednesday.cabinets[0][i]);
                    jQuery("#mark"+i+".wednesday").text(data.wednesday.mark[0][i]);
                }
            };
            jQuery("day-head.wednesday").text("Wednesday - "+data.wednesday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'4', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+30;
                if (data.thursday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".thursday").text(data.thursday.subjects[0][i]);
                    jQuery("#theme"+i+".thursday").text(data.thursday.themes[0][i]);
                    jQuery("#hw"+i+".thursday").text(data.thursday.homework[0][i]);
                    jQuery("#cab"+i+".thursday").text(data.thursday.cabinets[0][i]);
                    jQuery("#mark"+i+".thursday").text(data.thursday.mark[0][i]);
                }
            };
            jQuery("day-head.thursday").text("Thursday - "+data.thursday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'5', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+40;
                if (data.friday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".friday").text(data.friday.subjects[0][i]);
                    jQuery("#theme"+i+".friday").text(data.friday.themes[0][i]);
                    jQuery("#hw"+i+".friday").text(data.friday.homework[0][i]);
                    jQuery("#cab"+i+".friday").text(data.friday.cabinets[0][i]);
                    jQuery("#mark"+i+".friday").text(data.friday.mark[0][i]);
                }
            };
            jQuery("day-head.friday").text("Friday - "+data.friday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'6', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+50;
                if (data.saturday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#c"+n).css("display", "block");
                    jQuery("#nc"+n+".nocard").css("display", "none");
                    jQuery("#name"+i+".saturday").text(data.saturday.subjects[0][i]);
                    jQuery("#theme"+i+".saturday").text(data.saturday.themes[0][i]);
                    jQuery("#hw"+i+".saturday").text(data.saturday.homework[0][i]);
                    jQuery("#cab"+i+".saturday").text(data.saturday.cabinets[0][i]);
                    jQuery("#mark"+i+".saturday").text(data.saturday.mark[0][i]);
                }
            };
            jQuery("day-head.saturday").text("saturday - "+data.saturday.date);
        }
    });
    setTimeout('jQuery("body").css("-webkit-filter", "blur(0px)");jQuery("body").css("filter", "blur(0px)");', 1000);
});  

jQuery("#control-n").click(function(){
    jQuery("body").css("-webkit-filter", "blur(10px)");
    jQuery("body").css("filter", "blur(10px)");
    setTimeout('jQuery("body").css("-webkit-filter", "blur(0px)");jQuery("body").css("filter", "blur(0px)");', 1000);
    if (wid==2) {wid=2} else{
        wid = wid+1;
        $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'1', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+1;
                if (data.monday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".monday").text(data.monday.subjects[0][i]);
                    jQuery("#theme"+i+".monday").text(data.monday.themes[0][i]);
                    jQuery("#hw"+i+".monday").text(data.monday.homework[0][i]);
                    jQuery("#cab"+i+".monday").text(data.monday.cabinets[0][i]);
                    jQuery("#mark"+i+".monday").text(data.monday.mark[0][i]);
                }
            };
            jQuery("#week-dates").text(data.weekdates);
            jQuery("day-head.monday").text("Monday - "+data.monday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'2', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+10;
                if (data.tuesday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".tuesday").text(data.tuesday.subjects[0][i]);
                    jQuery("#theme"+i+".tuesday").text(data.tuesday.themes[0][i]);
                    jQuery("#hw"+i+".tuesday").text(data.tuesday.homework[0][i]);
                    jQuery("#cab"+i+".tuesday").text(data.tuesday.cabinets[0][i]);
                    jQuery("#mark"+i+".tuesday").text(data.tuesday.mark[0][i]);
                }
            };
            jQuery("day-head.tuesday").text("Tuesday - "+data.tuesday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'3', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+20;
                if (data.wednesday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".wednesday").text(data.wednesday.subjects[0][i]);
                    jQuery("#theme"+i+".wednesday").text(data.wednesday.themes[0][i]);
                    jQuery("#hw"+i+".wednesday").text(data.wednesday.homework[0][i]);
                    jQuery("#cab"+i+".wednesday").text(data.wednesday.cabinets[0][i]);
                    jQuery("#mark"+i+".wednesday").text(data.wednesday.mark[0][i]);
                }
            };
            jQuery("day-head.wednesday").text("Wednesday - "+data.wednesday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'4', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+30;
                if (data.thursday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".thursday").text(data.thursday.subjects[0][i]);
                    jQuery("#theme"+i+".thursday").text(data.thursday.themes[0][i]);
                    jQuery("#hw"+i+".thursday").text(data.thursday.homework[0][i]);
                    jQuery("#cab"+i+".thursday").text(data.thursday.cabinets[0][i]);
                    jQuery("#mark"+i+".thursday").text(data.thursday.mark[0][i]);
                }
            };
            jQuery("day-head.thursday").text("Thursday - "+data.thursday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'5', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+40;
                if (data.friday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#name"+i+".friday").text(data.friday.subjects[0][i]);
                    jQuery("#theme"+i+".friday").text(data.friday.themes[0][i]);
                    jQuery("#hw"+i+".friday").text(data.friday.homework[0][i]);
                    jQuery("#cab"+i+".friday").text(data.friday.cabinets[0][i]);
                    jQuery("#mark"+i+".friday").text(data.friday.mark[0][i]);
                }
            };
            jQuery("day-head.friday").text("Friday - "+data.friday.date);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'schedule.php',
        dataType: 'json',
        data: {'day':'6', 'week':wid},
        success: function(data) {
            for (var i = 1; i < 11; i++) {
                var n = i+50;
                if (data.saturday.subjects[0][i] == "No lesson") {
                    jQuery("#nc"+n+".nocard").fadeIn();
                    jQuery("#c"+n).fadeOut();
                } else{
                    jQuery("#nc"+n+".nocard").fadeOut();
                    jQuery("#c"+n).fadeIn();
                    jQuery("#c"+n).css("display", "block");
                    jQuery("#nc"+n+".nocard").css("display", "none");
                    jQuery("#name"+i+".saturday").text(data.saturday.subjects[0][i]);
                    jQuery("#theme"+i+".saturday").text(data.saturday.themes[0][i]);
                    jQuery("#hw"+i+".saturday").text(data.saturday.homework[0][i]);
                    jQuery("#cab"+i+".saturday").text(data.saturday.cabinets[0][i]);
                    jQuery("#mark"+i+".saturday").text(data.saturday.mark[0][i]);
                }
            };
            jQuery("day-head.saturday").text("saturday - "+data.saturday.date);
        }
    });
    }

});