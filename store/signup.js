/*function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	
	if(elem=="email"){
		rx = /[' "]/gi;
	}
}*/

function year(){
var start= 1922;
var end = new Date().getFullYear();
var options = '';
for(var year = start; year <= end; year++){
	options += "<option>" + year + "</option>";
}
document.getElementById('year').innerHTML = options;
}