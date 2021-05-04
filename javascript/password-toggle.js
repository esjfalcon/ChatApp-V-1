const paswrd = document.querySelector(".form .field input[type='password']"),
eye =  document.querySelector(".form .field i");



eye.onclick=()=>{
	if(paswrd.type == "password"){
		paswrd.type = "text";
		eye.classList.add("active");
	}else{
		paswrd.type = "password";
		eye.classList.remove("active");
	}
}
