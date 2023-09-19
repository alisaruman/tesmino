function ConvertNumberToPersion() {
	persian = {
		0: "۰",
		1: "۱",
		2: "۲",
		3: "۳",
		4: "۴",
		5: "۵",
		6: "۶",
		7: "۷",
		8: "۸",
		9: "۹",
	};
	function traverse(el) {
		if (el.nodeType == 3) {
			var list = el.data.match(/[0-9]/g);
			if (list != null && list.length != 0) {
				for (var i = 0; i < list.length; i++)
					el.data = el.data.replace(list[i], persian[list[i]]);
			}
		}
		for (var i = 0; i < el.childNodes.length; i++) {
			traverse(el.childNodes[i]);
		}
	}
	traverse(document.body);
}
//Pagination Archive
var paged = 1;
$(function(){
	ConvertNumberToPersion();
	$("a.loadmore").click(function(e){
		e.preventDefault();
		if($(".loading").hasClass("hidden")){
			$(".loading").removeClass("hidden");
			paged+=1;
			$.post(ajax_url,{action:"load_more",c:$(this).data("cat"),g:paged},function(res){
				if(res == ""){
					$("a.loadmore").addClass("hidden");
				} else {
					$(".posts").append(res);
				}

				$(".loading").addClass("hidden");
			})
		}
	});
	
	//FAQ
	$("#faq li").click(function() {
		if($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).find(".content").slideUp();
			$(this).find(".chevron").css("transform", "rotate(0deg)");
		}
		else {
			$("#faq li").removeClass("active");
			$("#faq li .content").slideUp();
			$("#faq li .chevron").css("transform", "rotate(0deg)");
			$(this).addClass("active");
			$(this).find(".content").slideDown();
			$(this).find(".chevron").css("transform", "rotate(180deg)");
		}
	});
	// faq 
	$("#comment-form #thick").click(function() {
		if($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).attr("src", "images/icons/thick-disabled.svg");
		}
		else {
			$(this).addClass("active");
			$(this).attr("src", "images/icons/thick.svg");
		}
	});
	$("a.cm_replay").click(function(e){
		e.preventDefault();
		$("#cm_parent").val($(this).data("parent"));
		$(".cm_replay_text").text(" در حال پاسخ به دیدگاه "+$(this).parent().parent().find(".author").text()+" هستید برای لغو کلیک کنید ")
	})
	$(".cm_replay_text").click(function(){
		$(this).text("");
		$("#cm_parent").val("0");

	});
	//Blogs tab Switcher
	$("#blog-tabs #buttons button").click(function () {
		var t = $(this).attr("id");
		if ($(this).hasClass("active")) {
			//this is the start of our condition
			//$(this).removeClass('active');
		} else {
			$("#blog-tabs #buttons button").removeClass("active");
			$(this).addClass("active");
			$("#blog-tabs .content").hide();
			$("#blog-tabs .content").removeClass("active");
			$("#" + t + "C").css("display", "flex");
			$("#" + t + "C").addClass("active");
		}
	});
	// blog tabs switcher
	$("#seo-desc button").click(function () {
		if ($(this).hasClass("active")) {
			$("#seo-content").removeClass("max-h-1000");
			$("#seo-content").addClass("max-h-32");
			$(this).removeClass("active");
			$(this).removeClass("relative");
			$(this).addClass("absolute bg-gradient-to-t");
			$(this).find("i.icon-chevron-bottom-2").removeClass("mr-3 rotate-180");
			$(this).find("i.icon-chevron-bottom-2").addClass("mr-3 rotate-0");
			$(this).find("span").text("مشاهده بیشتر");
		} else {
			$("#seo-content").addClass("max-h-1000");
			$("#seo-content").removeClass("max-h-32");
			$(this).addClass("active");
			$(this).removeClass("absolute bg-gradient-to-t");
			$(this).addClass("relative");
			$(this).find("i.icon-chevron-bottom-2").removeClass("mr-3 rotate-0");
			$(this).find("i.icon-chevron-bottom-2").addClass("mr-3 rotate-180");
			$(this).find("span").text("جمع کردن");
		}
	});
	//Toc Opener
	if (window.innerWidth > 767) {
		let deviceWidth = $(window).width();
		let blogWidth = $("#blog-tabs .container").width();
		let difference = (deviceWidth - blogWidth) / 2;
		$("#blog-tabs #blog-tabs-cont").css("padding-right", difference);
	}

	
	$("#toc #toc-opener").click(function() {
		if($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).parent().addClass("h-72 overflow-hidden");
			$(this).text("مشاهده بیشتر");
		} else {
			$(this).addClass("active");
			$(this).parent().removeClass("h-72 overflow-hidden");
			$(this).text("جمع کردن");
		}
	});
	// Swiper
	if (window.innerWidth >= 768) {
		var swiper = new Swiper(".mySwiper", {
			slidesPerView: 2.3,
			spaceBetween: 24,
			freeMode: true,
			navigation: {
				nextEl: ".blog-tabs-prev",
				prevEl: ".blog-tabs-next",
			},
		});
	} else {
		var swiper = new Swiper("#blog-tabs .mySwiper", {
			slidesPerView: 1,
			spaceBetween: 24,
			navigation: {
				nextEl: ".blog-tabs-prev",
				prevEl: ".blog-tabs-next",
			},
		});

	}
	//Cat Selector
	$("#catSelector").click(function () {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
		} else {
			$(this).addClass("active");
		}
	});
	$("#catList li").click(function(e){
		$("#catSelector span.cat").text($(this).text());
		$("#cat_search").val($(this).data("id"));
	});

	//Content Pointer
	$(".content_pointer").click(function(){
		var ind = $(this).index()-1;
		var el = $("#main h2").eq(ind);
		if(el.length > 0){
			$([document.documentElement, document.body]).scrollTop(el.offset().top);
		}
	});
	//Mobile menu
	$("#hamburger").click(function () {
		if ($(this).hasClass("active")) {
			$("#mobile-menu").css("max-height", "0px");
			$("#mobile-menu").css("padding-top", "0rem");
			$(this).removeClass("active");
		} else {
			$("#mobile-menu").css("max-height", "300px");
			$("#mobile-menu").css("padding-top", "2.75rem");
			$(this).addClass("active");
		}
	});
})