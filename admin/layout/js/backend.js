

$(function(){
  'use strict';
  //hide placeholder when focus on textfiled form
    $('[placeholder]').focus(function (){
      $(this).attr('data-text', $(this).attr('placeholder'));
      $(this).attr('placeholder', '');
    }).blur(function (){
      $(this).attr('placeholder', $(this).attr('data-text'));
    });
});