<footer>

</footer>

<script>
// document.addEventListener('DOMContentLoaded', function(){
	// slide toggle START
	let slideUp = (target, duration=500) => {
		target.style.transitionProperty = 'height, margin, padding';
		target.style.transitionDuration = duration + 'ms';
		target.style.boxSizing = 'border-box';
		target.style.height = target.offsetHeight + 'px';
		target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		window.setTimeout( () => {
			target.classList.add('active')
			target.style.display = 'none';
			target.style.removeProperty('height');
			target.style.removeProperty('padding-top');
			target.style.removeProperty('padding-bottom');
			target.style.removeProperty('margin-top');
			target.style.removeProperty('margin-bottom');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
			//alert("!");
		}, duration);
	}
	let slideDown = (target, duration=500) => {
		target.classList.remove('active')
		target.style.removeProperty('display');
		let display = window.getComputedStyle(target).display;

		if (display === 'none')
			display = 'block';

		target.style.display = display;
		let height = target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.offsetHeight;
		target.style.boxSizing = 'border-box';
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + 'ms';
		target.style.height = height + 'px';
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		window.setTimeout( () => {
			target.style.removeProperty('height');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
		}, duration);
	}
	let slideToggle = (target, duration=500) => {
		// if (window.getComputedStyle(target).display === 'none') {
		if (target.classList.contains('active')) {
			return slideDown(target, duration);
		} else {
			return slideUp(target, duration);
		}
	}
	// slide toggle END

	// standart slider START
	/**
	  * 
	  * @param {int} slides_to_scroll - (default 2)
	  * @param {int} autoplay - auto swipe in ms, 0/false - disable (default false)
	  * @param {HTMLelement} arrow_left
	  * @param {HTMLelement} arrow_right
	  * @param {HTMLelement} slides
	  * @param {HTMLelement} slider
	  * @param {bool} draggable
	  * @param {HTMLelement} drag_zone
	  * @param {float} drag_length_to_swipe - from 0.0 to 1.0 (default 0.1)
	  * @param {float} drag_to_slide_ratio - from 0.0 to 1.0 (default calculate)
	  * @param {float} slide_duration - for slide lock if drag
	  * @returns {void}
	  */
	function svlider (params) {

		var curr_slide = 0
		var is_sliding = false
		var is_sliding_timeout = 0
		var is_drag = false
		var start_drag_x = 0
		var curr_slide_on_start_drag = 0
		var swipe_timeout = 0

		if (!params.slides_to_scroll) {
			params.slides_to_scroll = 1
		}

		if (params.arrow_left) {
			params.arrow_left.addEventListener('click', ()=>{

				is_sliding = true

				set_next_slide(curr_slide - 1)

				clearTimeout(is_sliding_timeout)
				is_sliding_timeout = setTimeout(()=>{
					is_sliding = false
				}, params.slide_duration || 300)
			})
		}

		if (params.arrow_left) {
			params.arrow_right.addEventListener('click', ()=>{

				is_sliding = true

				set_next_slide(curr_slide + 1)

				clearTimeout(is_sliding_timeout)
				is_sliding_timeout = setTimeout(()=>{
					is_sliding = false
				}, params.slide_duration || 300)
			})
		}

		if (params.dots) {
			for (var i = params.dots.length - 1; i >= 0; i--) {
				(function(dot){
					dot.addEventListener('click', ()=>{
						var dots = Array.prototype.slice.call( params.dots )
						set_next_slide(dots.indexOf(dot))
					})
				})(params.dots[i])
			}
		}

		autoswipe()

		function autoswipe () {
			if (params.autoplay) {
				clearTimeout(swipe_timeout)
				swipe_timeout = setTimeout(()=>{
					set_next_slide(curr_slide + 1)
				}, params.autoplay)
			}
		}

		function render () {
			params.slider.style.setProperty('--curr-slide', curr_slide)
			if (params.dots && Math.ceil(curr_slide) == curr_slide) {
				for (var i = params.dots.length - 1; i >= 0; i--) {
					params.dots[i].classList.remove('active')
				}
				params.dots[curr_slide].classList.add('active')
			}

			if (Math.ceil(curr_slide) == curr_slide) {

				for (var i = params.slides.length - 1; i >= 0; i--) {
					params.slides[i].classList.remove('active')
				}
				for (var i = curr_slide * params.slides_to_scroll; i < curr_slide * params.slides_to_scroll + params.slides_to_scroll; i++) {
					params.slides[i].classList.add('active')
				}
				// params.slides[curr_slide].classList.add('active')

				if (params.arrow_right) {
					if (curr_slide == params.slides.length - 1) {
						params.arrow_right.classList.remove('active')
					} else {
						params.arrow_right.classList.add('active')
					}
				}
			}

			if (params.arrow_left) {
				if (curr_slide == 0) {
					params.arrow_left.classList.remove('active')
				} else {
					params.arrow_left.classList.add('active')
				}
			}
		}

		function set_next_slide (slide) {

			if (slide >= params.slides.length / params.slides_to_scroll) {
				curr_slide = 0
			} else if (slide < 0) {
				curr_slide = Math.ceil(params.slides.length / params.slides_to_scroll) - 1
			} else {
				curr_slide = slide
			}

			render()
			autoswipe()
		}

		function get_delta (clientX) {
			var rect = params.drag_zone.getBoundingClientRect()
			var x = (clientX - rect.x) / rect.width
			return start_drag_x - x
		}

		function dragging (e) {
			if (is_drag) {
				curr_slide_on_start_drag = Math.floor(curr_slide_on_start_drag)
				curr_slide = curr_slide_on_start_drag + get_delta(e.clientX || e.touches[0].pageX) * (params.drag_to_slide_ratio || params.slider.offsetWidth / params.slides[curr_slide_on_start_drag].offsetWidth)
				render()
			}
		}

		function end_drag (e) {

			if (is_drag) {

				is_drag = false
				params.slider.style.transition = ''
				// var delta = get_delta(e.clientX)
				var delta = curr_slide - curr_slide_on_start_drag

				if (delta > (params.drag_length_to_swipe || 0.1))
					set_next_slide(curr_slide_on_start_drag + 1)
				else if (delta < -1 * (params.drag_length_to_swipe || 0.1))
					set_next_slide(curr_slide_on_start_drag - 1)
				else set_next_slide(curr_slide_on_start_drag)
			}
		}

		function start_drag (e) {
			
			if (!is_sliding) {
				
				clearTimeout(swipe_timeout)

				is_drag = true
				var rect = params.drag_zone.getBoundingClientRect()
				start_drag_x = ((e.clientX || e.touches[0].clientX) - rect.x) / rect.width
				curr_slide_on_start_drag = curr_slide
				params.slider.style.transition = 'unset'
			}
		}

		if (params.draggable) {
			params.drag_zone.addEventListener('mousedown', start_drag, {passive: true})
			params.drag_zone.addEventListener('mouseup', end_drag, {passive: true})
			params.drag_zone.addEventListener('mouseleave', end_drag, {passive: true})
			params.drag_zone.addEventListener('mousemove', dragging)
			params.drag_zone.addEventListener("touchstart", start_drag, {passive: true})
			params.drag_zone.addEventListener("touchend", end_drag, {passive: true})
			params.drag_zone.addEventListener("touchcancel", end_drag, {passive: true})
			params.drag_zone.addEventListener("touchmove", dragging, {passive: true})
		}
	}
	// standart slider END

	// lazy load START
	/**
	  * 
	  * Usage: <img src="/images/lazy.svg" data-lazy="/images/original.png" class="lazy-img" alt="">
	  */
	function check_lazy () {
		for (var i = lazy_imgs.length - 1; i >= 0; i--) {
			var img = lazy_imgs[i]
			if (img.src == location.origin + '/images/lazy.svg' && img.getBoundingClientRect().top - 100 < window.innerHeight) {
				(function(img){
					img.onload = ()=>{
						img.classList.remove('lazy-img')
					}
				})(img)
				img.src = img.dataset.lazy
			}
		}
	}
	var lazy_imgs = []
	window.addEventListener('DOMContentLoaded', ()=>{
		lazy_imgs = Array.prototype.slice.call(document.querySelectorAll('img[data-lazy]'))
		setTimeout(()=>{
			check_lazy()
		}, 200)
	})
	window.addEventListener('scroll', ()=>{
		check_lazy()
	})
	// lazy load END

	var a = document.querySelectorAll('a')
	for (var i = a.length - 1; i >= 0; i--) {
		a[i].onclick = function(){
			var href = this.getAttribute('href')
			if (href[0] == '#') {
				var destination = document.querySelector(href)
				scrollIt(destination)
				return false
			}
		}
	}

	function scrollIt(destination, duration = 500, easing = 'easeInOutCubic', callback) {

		const easings = {
			easeInOutCubic(t) {
				return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
			},
		};

		const start = window.scrollY;
		const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();

		const documentHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
		const windowHeight = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
		const destinationOffset = typeof destination === 'number' ? destination : destination.offsetTop;
		const destinationOffsetToScroll = Math.round(documentHeight - destinationOffset < windowHeight ? documentHeight - windowHeight : destinationOffset);

		if ('requestAnimationFrame' in window === false) {
			window.scroll(0, destinationOffsetToScroll);
			if (callback) {
				callback();
			}
			return;
		}

		function scroll() {
			const now = 'now' in window.performance ? performance.now() : new Date().getTime();
			const time = Math.min(1, ((now - startTime) / duration));
			const timeFunction = easings[easing](time);
			window.scroll(0, Math.ceil((timeFunction * (destinationOffsetToScroll - start)) + start));

			if (Math.abs(window.scrollY - destinationOffsetToScroll) < 2) {
				if (callback) {
					callback();
				}
				return;
			}

			requestAnimationFrame(scroll);
		}

		scroll();
	}


	const Cart = new function () {

		const event_cart_change = (type)=>{

			var event = new CustomEvent('cartchange', { 
				'detail': {
					cart: this.cart,
					count: this.count(),
					sum: this.sum(),
					type: type,
				},
			})
			window.dispatchEvent(event)
		}

		const save_cart = ()=>{

			localStorage.cart = JSON.stringify(Array.from(this.cart.entries()))
		}

		const get_cart = ()=>{

			var cart = localStorage.cart
			if (!cart)
				return new Map()
			return new Map(JSON.parse(cart))
		}

		const get_key = (id)=>{
			let key = id
			for (let k of this.cart.keys()) {
				if (JSON.stringify(k) == JSON.stringify(id)) {
					key = k
				}
			}
			return key
		}


		this.cart = get_cart()

		/**
		  * @param {int/object} id - you can use {id: 1, attribute: 1} as id
		  * @param {int} count
		  * @param {object} data
		  * @returns {void}
		  */
		this.add = (id, count, data = {})=>{

			let key = get_key(id)

			if (this.cart.has(key)) {
				
				const new_count = this.cart.get(key).count + count

				if (new_count < 1) {

					this.remove(key)

				} else {

					this.cart.set(key, {
						count: new_count,
						data: data,
					})
				}

			} else {

				this.cart.set(key, {
					count: count,
					data: data,
				})
			}

			event_cart_change('add')
			save_cart()
		}

		/**
		  * @param {int/object} id - you can use {id: 1, attribute: 1} as id
		  * @returns {object} count and data
		  */
		this.get = (id)=>{

			return this.cart.get(get_key(id))
		}

		/** 
		  * @param {int/object} id - you can use {id: 1, attribute: 1} as id
		  * @returns {void}
		  */
		this.remove = (id)=>{

			this.cart.delete(get_key(id))
			event_cart_change('remove')
			save_cart()
		}

		/** 
		  * @returns {void}
		  */
		this.clear = ()=>{

			this.cart.clear()
			event_cart_change('clear')
			save_cart()
		}

		/**
		  * @returns {int} number of cart items
		  */
		this.count = ()=>{

			return this.cart.size
		}

		/**
		  * @returns {int} sum of cart items numbers
		  */
		this.sum = ()=>{

			let sum = 0

			for (let [key, value] of this.cart.entries()) {
				sum += value.count
			}
			return sum
		}
	}
	
// })
</script>
<style>
	.lazy-img {
		object-fit: scale-down !important;
		object-position: center !important;
		background-size: auto !important;
		background-position: center !important;
		background-repeat: no-repeat !important;
	}
</style>