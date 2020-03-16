(function ($,Drupal) {
  Drupal.behaviors.myModuleBehavior = {
    attach: function (context, settings) {
      $(context).find('a.ver_mas').once('myCustomBehavior').click(function () {
        $("li.mas_a_mostrar").css("display", "block");
        $(this).css("display", "none");
        $("a.ver_menos").css("display", "block");
      });
      $(context).find('a.ver_menos').once('myCustomBehavior2').click(function () {
        $('li.mas_a_mostrar').css('display', 'none');
        $(this).css("display", "none");
        $(".ver_mas").css("display", "block");
      });
    }
  };
})(jQuery,Drupal);
