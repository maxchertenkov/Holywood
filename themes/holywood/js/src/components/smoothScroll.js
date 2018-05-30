/* Component allows smooth scrolling to anchor on page */
/* Example of usage: smoothScroll('SELECTOR OF BUTTON WITH HREF #ANCHOR');  */

var $ = require('jquery');

module.exports = function(selector) {
    return $(selector).click(function(event){
        event.preventDefault(); // Prevent default behaviour
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500); // Animate scroll to anchor
    });
};