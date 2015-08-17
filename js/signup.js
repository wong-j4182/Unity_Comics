function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	
	if(elem=="email"){
		rx = /[' "]/g;
	}
	else if {
		rx = /[^a-z0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
function emptyElement(x){
	_(x).innerHTML = "";
}
function checkusername(){
	var user = _("username").value;
	
	if(user != ""){
		_("unamestatus").innerHTML = 'Checking username ...';
		var ajax = ajaxObj("POST","signup.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax) == true){
				_("unamestatus").innerHTML = ajax.responseText;
			}
		}
		ajax.send("usernamecheck="+u);
	}
}