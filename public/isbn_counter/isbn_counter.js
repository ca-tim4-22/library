$(document).ready(function() {
	var maxCharacters = 13;
	document.getElementById('count').onkeyup = function() {
	  document.getElementById('characters-counter').innerHTML = (maxCharacters - this.value.length);
        if (this.value.length == 13) {
            $( ".hide_this" ).addClass( "hide_counter" );
            $( ".show_this" ).removeClass( "hidden" );
        } else if (this.value.length > 13) {
            $( "#characters-counter" ).addClass( "red" );
            $( ".show_this" ).addClass( "hidden" );
            $( ".hide_this" ).removeClass( "hide_counter" );
        } else {
            $( ".show_this" ).addClass( "hidden" );
            $( ".hide_this" ).removeClass( "hide_counter" );
        }
	};
});