function isEven(n) {
  // https://stackoverflow.com/questions/6211613/testing-whether-a-value-is-odd-or-even
  return n == parseFloat(n)? !(n%2) : void 0;
}

$(function(){

  var breakpoint = {};
  breakpoint.refreshValue = function () {
    this.value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');
  };
  
  $(window).on('beforeunload', function() {
      $(window).scrollTop(0);
  });

  $(window).load(function(){

  });

  // all window scroll events go here
  $(window).scroll(function(){

  });

  // all window resize events go here:
  $(window).resize(function () {

  }).resize();

});
