function lazyload()
{ 
	var div = document.querySelectorAll(".excuseDiv");  
	var scrollTop = window.pageYOffset;                 //koliko je skrolovan dokument u px
	for(i in div)
	{                                        //ako je zbir razdaljine div el i vrha dokumenta i 30 izrazeno u px manja od zbira visine prozora i skrol
                                             //pozicije dokumenta od vrha ucitavaju se slike
		 if(div[i].offsetTop+70 < (window.innerHeight + scrollTop)) 
		 {
			var divlazy=div[i];
			var img=divlazy.firstChild;
			img.src=img.dataset.src;
			
		 }
    }
		
}
	
 document.addEventListener("scroll", lazyload);
 window.addEventListener("resize", lazyload);
