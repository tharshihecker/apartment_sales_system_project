function about(name){
if (name=="btn1"){
document.getElementById("para1").innerHTML = "We are a dedicated team committed to helping you find your dream apartment. With years of experience in the real estate industry, we strive to provide exceptionalservice and support throughout your apartment search journey."; 
}
else if(name=="btn2") {
    document.getElementById("para2").innerHTML ="Our mission is to simplify the apartment buying process and make it as stress-free as possible for our clients. We aim to offer a wide range of high-quality apartments and provide expert guidance to help you make informed decisions.";
}
else if(name=="shankar"){
	document.getElementById("img1").src ="images/shankar.jpg";
	
}
else if(name=="smith"){
	document.getElementById("img2").src ="images/smith.jpeg";
}

else{
      alert("Invalid!!!");
  }
}

function show(name){
if (name=="a1"){
document.getElementById("image1").src ="images/Instagram.webp";
  image1.style.display = "block";
}
else if (name=="a2"){
document.getElementById("image1").src ="images/facebook.jpg";
 image1.style.display = "block";
}
}
function hide(name){
if (name=="a1"){
document.getElementById("image1").src ="images/Instagram.webp";
  image1.style.display = "none";
}
else if (name=="a2"){
document.getElementById("image1").src ="images/facebook.jpg";
 image1.style.display = "none";
}
}