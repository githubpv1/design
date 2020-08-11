
objectFitImages(); //IE polyfill


	/* carousel */
	var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 0,
      slidesPerView: 3,
			loop: true,
			centeredSlides: true,
      watchSlidesProgress: true
    });
	
	var mySwiper = new Swiper ('.s2', {
    slidesPerView: 'auto',
		spaceBetween: 30,
		loop: true,
		grabCursor: true,
    navigation: {
      nextEl: '.next_carousel',
      prevEl: '.prev_carousel',
    },
		pagination: {
			el: '.swiper-pagination1',
			type: 'fraction',
			renderFraction: function (currentClass, totalClass) {

				return  '0' +'<span class="' + currentClass + '"></span>' +
             '&nbsp;&nbsp;&nbsp; &mdash; &nbsp;&nbsp;&nbsp;  ' + '0' +
             '<span class="' + totalClass + '"></span>';
			}
		},
		breakpoints: {
			1200: {
				slidesPerView: 'auto',
				spaceBetween: 30
			},
			992: {
				slidesPerView: 1,
				spaceBetween: 0
			}
		},
		thumbs: {
			swiper: galleryThumbs
		},
  });
 

 
/*автовысота для textarea*/ 
 var tx = document.getElementsByTagName('textarea');
for (var i = 0; i < tx.length; i++) {
  tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
  tx[i].addEventListener("input", OnInput, false);
}
function OnInput() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
}
 
	
/*фокус с клавиатуры на метку для Firefox*/
 var input = document.getElementById('input_file');      

input.addEventListener('focus', function(){ 
	input.classList.add( 'has-focus' ); 
});
input.addEventListener('blur', function(){ 
	input.classList.remove( 'has-focus' ); 
});


/*выбрано файлов input_file кол-во*/
document.getElementById('input_file').onchange = function(e) {
	var file_name = document.getElementById ('file-name'),
	    files = this.files;
	
	if(files.length == 1) {
			file_name.innerHTML = 'Имя файла: ' + files[0].name;
		} else {
			file_name.innerHTML = 'Выбрано ' + files.length + ' Файла(ов)';
		}
}		
/**/


stickybits ('.nav_site_page' , {verticalPosition : ' bottom ' });

stickybits('.wrap_nav_site_page');
	
			
	
	
	
	
	
	
	
	
	
	
	
	
	
	