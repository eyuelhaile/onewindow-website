//This function will be called when user click changing language
function translate(lng, tagAttr){
    var translate = new Translate();
    translate.init(tagAttr, lng);
    translate.process();
    if(lng == 'en'){
      $("#enTranslator").css('color', '#8B5E3C');
      $("#amTranslator").css('color', '#000');
    } 
    if(lng == 'am'){
      $("#amTranslator").css('color', '#8B5E3C');
      $("#enTranslator").css('color', '#000');
    }
}
$(document).ready(function(){
  //This is id of HTML element (English) with attribute lng-tag
  $("#enTranslator").click(function(){
    translate('en', 'lng-tag');
  });
  //This is id of HTML element (Khmer) with attribute lng-tag
  $("#amTranslator").click(function(){
    translate('am', 'lng-tag');
  });
});