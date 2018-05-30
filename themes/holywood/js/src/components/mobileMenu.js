/* Component for mobile menu toggling */
/* Example of usage: smoothScroll('SELECTOR OF BUTTON WITH HREF #ANCHOR');  */

var $ = require('jquery');

module.exports = function(mobMenuBtn, menuBlock) {
    return $(mobMenuBtn).click(function(event){
        event.preventDefault(); // Prevent default behaviour
        $(mobMenuBtn).toggleClass('open');
        $(menuBlock).toggleClass('visible');
    });
};