    @include('header')

    <section class="hero-section">
	    <div class="container">
		    <div class="row">
			    <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
				    <div class="promo pe-md-3 pe-lg-5">
					    <h1 class="headline mb-3">
						    أنشيء مكتبك الان وانشرها لجميع طلابك في المدرسة   
					    </h1><!--//headline-->
					    <div class="subheadline mb-4">
						    هو موقع متخصص في المكتبة الرقمية بشكل خاص فقط للمستخدمين الذين تضيفهم داخل حسابك, انشر الكتب القيمة والأكثر أهمية بشكل خاص لمجموعتك
						    
					    </div><!--//subheading-->
					    
					    <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
						    <div class="col-12 col-md-auto">
						        <a class="btn btn-primary w-100" href="{{ URL::to('/register') }}">اشترك الان</a>
						    </div>
						    <!-- <div class="col-12 col-md-auto">
						        <a class="btn btn-secondary scrollto w-100" href="#benefits-section">Learn More</a>
						    </div> -->
					    </div><!--//cta-holder-->
					    
					    <div class="hero-quotes mt-5">
						    <div id="quotes-carousel" class="quotes-carousel carousel slide carousel-fade mb-5" data-bs-ride="carousel" data-bs-interval="8000">
								<ol class="carousel-indicators">
									<li data-bs-target="#quotes-carousel" data-bs-slide-to="0" class=""></li>
									<li data-bs-target="#quotes-carousel" data-bs-slide-to="1" class=""></li>
									<li data-bs-target="#quotes-carousel" data-bs-slide-to="2" class="active" aria-current="true"></li>
								</ol>
							  
							    <div class="carousel-inner">
								    <div class="carousel-item">
								        <blockquote class="quote p-4 theme-bg-light">
									        "Excellent Book! Add your book reviews here consectetur adipiscing elit. Aliquam euismod nunc porta urna facilisis tempor. Praesent mauris neque, viverra quis erat vitae, auctor imperdiet nisi."     
								        </blockquote><!--//item-->
								        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
									        <div class="col-12 col-md-auto text-center text-md-start">
									            <img class="source-profile" src="{{asset('assets/images/profiles/profile-1.png')}}" alt="image">
									        </div><!--//col-->
									        <div class="col source-info text-center text-md-start">
										        <div class="source-name">James Doe</div>
										        <div class="soure-title">Co-Founder, Startup Week</div>
										    </div><!--//col-->
								        </div><!--//source-->
								    </div><!--//carousel-item-->
								    <div class="carousel-item">
								        <blockquote class="quote p-4 theme-bg-light">
									        "Highly recommended consectetur adipiscing elit. Proin et auctor dolor, sed venenatis massa. Vestibulum ullamcorper lobortis nisi non placerat praesent mauris neque"     
								        </blockquote><!--//item-->
								        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
									        <div class="col-12 col-md-auto text-center text-md-start">
									            <img class="source-profile" src="{{asset('assets/images/profiles/profile-2.png')}}" alt="image">
									        </div><!--//col-->
									        <div class="col source-info text-center text-md-start">
										        <div class="source-name">Jean Doe</div>
										        <div class="soure-title">Co-Founder, Startup Week</div>
										    </div><!--//col-->
								        </div><!--//source-->
								    </div><!--//carousel-item-->
								    <div class="carousel-item active">
								        <blockquote class="quote p-4 theme-bg-light">
									        "Awesome! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod nunc porta urna facilisis tempor. Praesent mauris neque, viverra quis erat vitae."     
								        </blockquote><!--//item-->
								        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
									        <div class="col-12 col-md-auto text-center text-md-start">
									            <img class="source-profile" src="{{asset('assets/images/profiles/profile-3.png')}}" alt="image">
									        </div><!--//col-->
									        <div class="col source-info text-center text-md-start">
										        <div class="source-name">Andy Doe</div>
										        <div class="soure-title">Frontend Developer, Company Lorem</div>
										    </div><!--//col-->
								        </div><!--//source-->
								    </div><!--//carousel-item-->
								</div><!--//carousel-inner-->
							</div><!--//quotes-carousel-->
							
					    </div><!--//hero-quotes-->
				    </div><!--//promo-->
			    </div><!--col-->
			    <div class="col-12 col-md-5 mb-5 align-self-center">
				    <div class="book-cover-holder">
					    <img class="img-fluid book-cover" src="{{asset('assets/images/devbook-cover.png')}}" alt="book cover">
					    <div class="book-badge d-inline-block shadow">
						    New<br>Release
					    </div>
				    </div><!--//book-cover-holder-->
				    <div class="text-center"><a class="theme-link scrollto" href="#reviews-section">See all book reviews</a></div>
			    </div><!--col-->
		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//hero-section-->
    
    <section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
	    <div class="container py-5">
		    <h2 class="section-heading text-center mb-3">ما هي الخدمات المقدمة؟</h2>
		    <div class="section-intro single-col-max mx-auto text-center mb-5">وسلية آمنة لحفظ و عرض الكتب ومشاركتها مع مجموعة محددة </div>
		    <div class="row text-center">
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><svg class="svg-inline--fa fa-laptop-code fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="laptop-code" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M255.03 261.65c6.25 6.25 16.38 6.25 22.63 0l11.31-11.31c6.25-6.25 6.25-16.38 0-22.63L253.25 192l35.71-35.72c6.25-6.25 6.25-16.38 0-22.63l-11.31-11.31c-6.25-6.25-16.38-6.25-22.63 0l-58.34 58.34c-6.25 6.25-6.25 16.38 0 22.63l58.35 58.34zm96.01-11.3l11.31 11.31c6.25 6.25 16.38 6.25 22.63 0l58.34-58.34c6.25-6.25 6.25-16.38 0-22.63l-58.34-58.34c-6.25-6.25-16.38-6.25-22.63 0l-11.31 11.31c-6.25 6.25-6.25 16.38 0 22.63L386.75 192l-35.71 35.72c-6.25 6.25-6.25 16.38 0 22.63zM624 416H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33.02-17.47-32.77-32H16c-8.8 0-16 7.2-16 16v16c0 35.2 28.8 64 64 64h512c35.2 0 64-28.8 64-64v-16c0-8.8-7.2-16-16-16zM576 48c0-26.4-21.6-48-48-48H112C85.6 0 64 21.6 64 48v336h512V48zm-64 272H128V64h384v256z"></path></svg><!-- <i class="fas fa-laptop-code"></i> Font Awesome fontawesome.com --></div>
						    <h3 class="item-heading">مساحة تخزينية كافية</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">نتيح لك مساحة كافية لحفظ الكتب ومشاركتها مع مجموعتك الخاصة </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><svg class="svg-inline--fa fa-js-square fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="js-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM243.8 381.4c0 43.6-25.6 63.5-62.9 63.5-33.7 0-53.2-17.4-63.2-38.5l34.3-20.7c6.6 11.7 12.6 21.6 27.1 21.6 13.8 0 22.6-5.4 22.6-26.5V237.7h42.1v143.7zm99.6 63.5c-39.1 0-64.4-18.6-76.7-43l34.3-19.8c9 14.7 20.8 25.6 41.5 25.6 17.4 0 28.6-8.7 28.6-20.8 0-14.4-11.4-19.5-30.7-28l-10.5-4.5c-30.4-12.9-50.5-29.2-50.5-63.5 0-31.6 24.1-55.6 61.6-55.6 26.8 0 46 9.3 59.8 33.7L368 290c-7.2-12.9-15-18-27.1-18-12.3 0-20.1 7.8-20.1 18 0 12.6 7.8 17.7 25.9 25.6l10.5 4.5c35.8 15.3 55.9 31 55.9 66.2 0 37.8-29.8 58.6-69.7 58.6z"></path></svg><!-- <i class="fab fa-js-square"></i> Font Awesome fontawesome.com --></div>
						    <h3 class="item-heading">متصفح كتب مميز و جميل</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">نتيح لك عرض الكتب بشكل أنيق و جميل </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><svg class="svg-inline--fa fa-rocketchat fa-w-18" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="rocketchat" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M284.046,224.8a34.114,34.114,0,1,0,34.317,34.113A34.217,34.217,0,0,0,284.046,224.8Zm-110.45,0a34.114,34.114,0,1,0,34.317,34.113A34.217,34.217,0,0,0,173.6,224.8Zm220.923,0a34.114,34.114,0,1,0,34.317,34.113A34.215,34.215,0,0,0,394.519,224.8Zm153.807-55.319c-15.535-24.172-37.31-45.57-64.681-63.618-52.886-34.817-122.374-54-195.666-54a405.975,405.975,0,0,0-72.032,6.357,238.524,238.524,0,0,0-49.51-36.588C99.684-11.7,40.859.711,11.135,11.421A14.291,14.291,0,0,0,5.58,34.782C26.542,56.458,61.222,99.3,52.7,138.252c-33.142,33.9-51.112,74.776-51.112,117.337,0,43.372,17.97,84.248,51.112,118.148,8.526,38.956-26.154,81.816-47.116,103.491a14.284,14.284,0,0,0,5.555,23.34c29.724,10.709,88.549,23.147,155.324-10.2a238.679,238.679,0,0,0,49.51-36.589A405.972,405.972,0,0,0,288,460.14c73.313,0,142.8-19.159,195.667-53.975,27.371-18.049,49.145-39.426,64.679-63.619,17.309-26.923,26.07-55.916,26.07-86.125C574.394,225.4,565.634,196.43,548.326,169.485ZM284.987,409.9a345.65,345.65,0,0,1-89.446-11.5l-20.129,19.393a184.366,184.366,0,0,1-37.138,27.585,145.767,145.767,0,0,1-52.522,14.87c.983-1.771,1.881-3.563,2.842-5.356q30.258-55.68,16.325-100.078c-32.992-25.962-52.778-59.2-52.778-95.4,0-83.1,104.254-150.469,232.846-150.469s232.867,67.373,232.867,150.469C517.854,342.525,413.6,409.9,284.987,409.9Z"></path></svg><!-- <i class="fab fa-rocketchat"></i> Font Awesome fontawesome.com --></div>
						    <h3 class="item-heading">الامان والخصوصية</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">الهدف من الموقع هو مشاركة الكتب  بطريقة آمنة وبخصوصية ولحفظ الحقوق</div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div>
			    
			    
			    <!--//item-->
		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//benefits-section-->
    
    <section id="content-section" class="content-section">
	    <div class="container">
		    <div class="single-col-max mx-auto">
		    <h2 class="section-heading text-center mb-5">ماذا تحتوي المنصة</h2>
			    <div class="row">
				    <div class="col-12 col-md-6">
					    <div class="figure-holder mb-5">
						    <img class="img-fluid" src="{{asset('assets/images/devbook-devices.png')}}" alt="image">
					    </div><!--//figure-holder-->
				    </div><!--//col-->
				    <div class="col-12 col-md-6 mb-5">
					    <div class="key-points mb-4 text-center">
						    <ul class="key-points-list list-unstyled mb-4 mx-auto d-inline-block text-start">
							    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg><!-- <i class="fas fa-check-circle me-2"></i> Font Awesome fontawesome.com -->أضف كتب إلى مكتبتك الخاصة </li>
							    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg><!-- <i class="fas fa-check-circle me-2"></i> Font Awesome fontawesome.com -->أضف مشرفين للتحكم بالمكتبة الخاصة بك</li>
							    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg><!-- <i class="fas fa-check-circle me-2"></i> Font Awesome fontawesome.com -->إضافة أعضاء للمكتبة الخاصة</li>
							    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg><!-- <i class="fas fa-check-circle me-2"></i> Font Awesome fontawesome.com -->فقط من سمحت لهم بالوصول للمكتبة</li>
							    <li><svg class="svg-inline--fa fa-check-circle fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg><!-- <i class="fas fa-check-circle me-2"></i> Font Awesome fontawesome.com -->العديد من المميزات الاخرى</li>
							    
							    
							    
						    </ul>
						    <div class="text-center"><a class="btn btn-primary" href="{{ URL::to('/register') }}">اشترك الان</a></div>
					    </div><!--//key-points-->
					    
				    </div><!--//col-12-->   
			    </div><!--//row-->
		    </div><!--//single-col-max-->
	    </div><!--//container-->
    </section><!--//content-section-->
    
    <section id="audience-section" class="audience-section py-5">
	    <div class="container">
		    <h2 class="section-heading text-center mb-4">من يستفيد من المنصة؟</h2>
		    <div class="section-intro single-col-max mx-auto text-center mb-5">كانت الكتب سابقا يتم تداولها إما عن طريق الشراء مباشرة, او المشاركة من خلال المكتبات العامة او المكتبات الخاصة مثل مكتبات المدارس و الشركات الخاصة وغيرها, وفي ظل جائحة كورونا توقفت خدمة مشاركة الكتب في المكتبات العامة او في مكتبات المدرسة حفاظاً على سلامة الجميع, ومن هنا ظهرت الحوجة للمكتبة الالكترونية لتلبي احتياجات الجميع ,ولتتيح للمدارس والشركات وغيرها مشاركة الكتب بشكل خاص لأفراد المؤسسة بدون نشر الكتب خارج الموقع , ومع الحفاظ على سلامة منسوبيها, أيضا الوصول إليها من أي مكان في أي وقت بسهولة</div><!--//section-intro-->		    
      <!--//audience-->
	    </div><!--//container-->
    </section><!--//audience-section-->
    
    <section id="form-section" class="form-section">
	    <div class="container">
		    <div class="lead-form-wrapper single-col-max mx-auto theme-bg-light rounded p-5">
			    <h2 class="form-heading text-center">أضف بريدك الالكتروني للاطلاع على الجديد</h2>
			    <div class="form-intro text-center mb-3">اشترك بالقائمة البريدية للحصول على آخر المستجدات<br>نوفر لكم عروض خاصة عبر الايميل</div>
			    <div class="form-wrapper mx-auto">					
					<form class="signup-form row g-2 align-items-center">
	                    <div class="col-12 col-lg-9">
	                        <label class="sr-only" for="semail">Email</label>
	                        <input type="email" id="semail" name="semail1" class="form-control me-md-1 semail" placeholder="بريدك الالكتروني">
	                    </div>
	                    <div class="col-12 col-lg-3">
	                        <button type="submit" class="btn btn-primary btn-submit w-100">أرسل</button>
	                    </div>
	                </form><!--//signup-form-->
			    </div><!--//form-wrapper-->
		    </div><!--//lead-form-wrapper-->
	    </div><!--//container-->
    </section><!--//form-section-->
    
    <section id="reviews-section" class="reviews-section py-5">
	    <div class="container">
		    <h2 class="section-heading text-center">رأي المستخدمين</h2>
		    <div class="section-intro text-center single-col-max mx-auto mb-5">نشاركك ببعض الآراء لمستخدي المنصة</div>
		    <div class="row justify-content-center">
			    <div class="item col-12 col-lg-4 p-3 mb-4">
				    <div class="item-inner theme-bg-light rounded p-4">
					    
					    <blockquote class="quote">
					        "Excellent Book! Add your book review here consectetur adipiscing elit. Aliquam euismod nunc porta urna facilisis tempor. "     
				        </blockquote><!--//item-->
				        <div class="source row gx-md-3 gy-3 gy-md-0">
					        <div class="col-12 col-md-auto text-center text-md-start">
					            <img class="source-profile" src="{{asset('assets/images/profiles/profile-1.png')}}" alt="image">
					        </div><!--//col-->
					        <div class="col source-info text-center text-md-start">
						        <div class="source-name">James Doe</div>
						        <div class="soure-title">Co-Founder, Startup Week</div>
						    </div><!--//col-->
				        </div><!--//source-->
				        <div class="icon-holder"><svg class="svg-inline--fa fa-quote-right fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fas fa-quote-right"></i> Font Awesome fontawesome.com --></div>
				    </div><!--//inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-lg-4 p-3 mb-4">
				    <div class="item-inner theme-bg-light rounded p-4">
					    <blockquote class="quote">
					        "Great Book! Add your book review here consectetur adipiscing elit. Aliquam euismod nunc porta urna facilisis tempor. Praesent mauris neque."     
				        </blockquote><!--//item-->				        
				        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
					        <div class="col-12 col-md-auto text-center text-md-start">
					            <img class="source-profile" src="{{asset('assets/images/profiles/profile-2.png')}}" alt="image">
					        </div><!--//col-->
					        <div class="col source-info text-center text-md-start">
						        <div class="source-name">Jean Doe</div>
						        <div class="soure-title">Co-Founder, Company Tristique</div>
						    </div><!--//col-->
				        </div><!--//source-->
				        
				         <div class="icon-holder"><svg class="svg-inline--fa fa-quote-right fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fas fa-quote-right"></i> Font Awesome fontawesome.com --></div>
				    </div><!--//inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-lg-4 p-3 mb-4">
				    <div class="item-inner theme-bg-light rounded p-4">
					    <blockquote class="quote">
					        "Excellent Book! Add your book review here consectetur adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula tempor imperdiet."     
				        </blockquote><!--//item-->
				        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
					        <div class="col-12 col-md-auto text-center text-md-start">
					            <img class="source-profile" src="{{asset('assets/images/profiles/profile-3.png')}}" alt="image">
					        </div><!--//col-->
					        <div class="col source-info text-center text-md-start">
						        <div class="source-name">Tom Doe</div>
						        <div class="soure-title">Product Designer, Company Lorem</div>
						    </div><!--//col-->
				        </div><!--//source-->
				         <div class="icon-holder"><svg class="svg-inline--fa fa-quote-right fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fas fa-quote-right"></i> Font Awesome fontawesome.com --></div>
				    </div><!--//inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-lg-4 p-3 mb-4">
				    <div class="item-inner theme-bg-light rounded p-4">
					    <blockquote class="quote">
					        "Another book review here consectetur adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula tempor imperdiet."     
				        </blockquote><!--//item-->
				        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
					        <div class="col-12 col-md-auto text-center text-md-start">
					            <img class="source-profile" src="{{asset('assets/images/profiles/profile-4.png')}}" alt="image">
					        </div><!--//col-->
					        <div class="col source-info text-center text-md-start">
						        <div class="source-name">Alice Doe</div>
						        <div class="soure-title">App Developer, Company Ipsum</div>
						    </div><!--//col-->
				        </div><!--//source-->
				        <div class="icon-holder"><svg class="svg-inline--fa fa-quote-right fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fas fa-quote-right"></i> Font Awesome fontawesome.com --></div>
				    </div><!--//inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-lg-4 p-3 mb-4">
				    <div class="item-inner theme-bg-light rounded p-4">
					    <blockquote class="quote">
					        "Another book review here consectetur adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula tempor imperdiet."     
				        </blockquote><!--//item-->
				        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
					        <div class="col-12 col-md-auto text-center text-md-start">
					            <img class="source-profile" src="{{asset('assets/images/profiles/profile-5.png')}}" alt="image">
					        </div><!--//col-->
					        <div class="col source-info text-center text-md-start">
						        <div class="source-name">Sam Doe</div>
						        <div class="soure-title">Co-Founder, Company Integer</div>
						    </div><!--//col-->
				        </div><!--//source-->
				        <div class="icon-holder"><svg class="svg-inline--fa fa-quote-right fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fas fa-quote-right"></i> Font Awesome fontawesome.com --></div>
				    </div><!--//inner-->
			    </div><!--//item-->
		    </div><!--//row-->
		    <div class="text-center">
		        <a class="btn btn-primary" href="#">انضم الآن</a>
		    </div>
	    </div><!--//container-->
    </section><!--//reviews-section-->
    
    <section id="author-section" class="author-section section theme-bg-primary py-5">
	    <div class="container py-3">
		    <div class="author-profile text-center mb-5">
			    <img class="author-pic" src="{{asset('assets/images/profiles/author-profile.png')}}" alt="image">
		    </div><!--//author-profile-->
		    <h2 class="section-heading text-center text-white mb-3">كلمة مؤسس المنصة</h2>
		    <div class="author-bio single-col-max mx-auto">
			    <p>برؤية واضحة وخطى ثابتة وخريطة متخمة بالأفكار العقارية المتطورة تتوالى المسيرة الناجحة لشركة مصبح القابضة في رسم صورة حضارية تجعل منها رائدة في مجال الخدمات والمجالات التي تعمل بها, ليس على مستوى الدولة فحسب, بل على مستوي العالم العربي ودول عالمية أخرى. تلك المسيرة التي توليت ادارتها منذ سنة 1995 مع أبنائي وجميع فرق العمل في الشركة وذلك لنحقق طموح واردنا من صغرنا وهو رفع راية وطننا الإمارات, وان نكون اصحاب الريادة في مجال عملنا وان نكون سفراء لبلدنا في الخارج في مجال الخدمات التي نقدمها ،ولا شك ان ما تحقق من انجاز وتطور كان ورائه سواعد فتيه وعقول نيرة ساعدت على تطور الشركة ،ودائبت على السهر من اجل نجاحها وإزدهارها.</p>
			    
			    <div class="author-links text-center pt-4">
			        <h5 class="text-white mb-4">تابعنا</h5>
				    <ul class="social-list list-unstyled">
					    <li class="list-inline-item"><a href="https://twitter.com/3rdwave_themes"><svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter"></i> Font Awesome fontawesome.com --></a></li>
					    <li class="list-inline-item"><a href="https://github.com/xriley"><svg class="svg-inline--fa fa-github-alt fa-w-15" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 512" data-fa-i2svg=""><path fill="currentColor" d="M186.1 328.7c0 20.9-10.9 55.1-36.7 55.1s-36.7-34.2-36.7-55.1 10.9-55.1 36.7-55.1 36.7 34.2 36.7 55.1zM480 278.2c0 31.9-3.2 65.7-17.5 95-37.9 76.6-142.1 74.8-216.7 74.8-75.8 0-186.2 2.7-225.6-74.8-14.6-29-20.2-63.1-20.2-95 0-41.9 13.9-81.5 41.5-113.6-5.2-15.8-7.7-32.4-7.7-48.8 0-21.5 4.9-32.3 14.6-51.8 45.3 0 74.3 9 108.8 36 29-6.9 58.8-10 88.7-10 27 0 54.2 2.9 80.4 9.2 34-26.7 63-35.2 107.8-35.2 9.8 19.5 14.6 30.3 14.6 51.8 0 16.4-2.6 32.7-7.7 48.2 27.5 32.4 39 72.3 39 114.2zm-64.3 50.5c0-43.9-26.7-82.6-73.5-82.6-18.9 0-37 3.4-56 6-14.9 2.3-29.8 3.2-45.1 3.2-15.2 0-30.1-.9-45.1-3.2-18.7-2.6-37-6-56-6-46.8 0-73.5 38.7-73.5 82.6 0 87.8 80.4 101.3 150.4 101.3h48.2c70.3 0 150.6-13.4 150.6-101.3zm-82.6-55.1c-25.8 0-36.7 34.2-36.7 55.1s10.9 55.1 36.7 55.1 36.7-34.2 36.7-55.1-10.9-55.1-36.7-55.1z"></path></svg><!-- <i class="fab fa-github-alt"></i> Font Awesome fontawesome.com --></a></li> 
			            <li class="list-inline-item"><a href="https://medium.com/@3rdwave_themes"><svg class="svg-inline--fa fa-medium-m fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="medium-m" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M71.5 142.3c.6-5.9-1.7-11.8-6.1-15.8L20.3 72.1V64h140.2l108.4 237.7L364.2 64h133.7v8.1l-38.6 37c-3.3 2.5-5 6.7-4.3 10.8v272c-.7 4.1 1 8.3 4.3 10.8l37.7 37v8.1H307.3v-8.1l39.1-37.9c3.8-3.8 3.8-5 3.8-10.8V171.2L241.5 447.1h-14.7L100.4 171.2v184.9c-1.1 7.8 1.5 15.6 7 21.2l50.8 61.6v8.1h-144v-8L65 377.3c5.4-5.6 7.9-13.5 6.5-21.2V142.3z"></path></svg><!-- <i class="fab fa-medium-m"></i> Font Awesome fontawesome.com --></a></li>
			            
			            <li class="list-inline-item"><a href="https://themes.3rdwavemedia.com/"><svg class="svg-inline--fa fa-globe-europe fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="globe-europe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg=""><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm200 248c0 22.5-3.9 44.2-10.8 64.4h-20.3c-4.3 0-8.4-1.7-11.4-4.8l-32-32.6c-4.5-4.6-4.5-12.1.1-16.7l12.5-12.5v-8.7c0-3-1.2-5.9-3.3-8l-9.4-9.4c-2.1-2.1-5-3.3-8-3.3h-16c-6.2 0-11.3-5.1-11.3-11.3 0-3 1.2-5.9 3.3-8l9.4-9.4c2.1-2.1 5-3.3 8-3.3h32c6.2 0 11.3-5.1 11.3-11.3v-9.4c0-6.2-5.1-11.3-11.3-11.3h-36.7c-8.8 0-16 7.2-16 16v4.5c0 6.9-4.4 13-10.9 15.2l-31.6 10.5c-3.3 1.1-5.5 4.1-5.5 7.6v2.2c0 4.4-3.6 8-8 8h-16c-4.4 0-8-3.6-8-8s-3.6-8-8-8H247c-3 0-5.8 1.7-7.2 4.4l-9.4 18.7c-2.7 5.4-8.2 8.8-14.3 8.8H194c-8.8 0-16-7.2-16-16V199c0-4.2 1.7-8.3 4.7-11.3l20.1-20.1c4.6-4.6 7.2-10.9 7.2-17.5 0-3.4 2.2-6.5 5.5-7.6l40-13.3c1.7-.6 3.2-1.5 4.4-2.7l26.8-26.8c2.1-2.1 3.3-5 3.3-8 0-6.2-5.1-11.3-11.3-11.3H258l-16 16v8c0 4.4-3.6 8-8 8h-16c-4.4 0-8-3.6-8-8v-20c0-2.5 1.2-4.9 3.2-6.4l28.9-21.7c1.9-.1 3.8-.3 5.7-.3C358.3 56 448 145.7 448 256zM130.1 149.1c0-3 1.2-5.9 3.3-8l25.4-25.4c2.1-2.1 5-3.3 8-3.3 6.2 0 11.3 5.1 11.3 11.3v16c0 3-1.2 5.9-3.3 8l-9.4 9.4c-2.1 2.1-5 3.3-8 3.3h-16c-6.2 0-11.3-5.1-11.3-11.3zm128 306.4v-7.1c0-8.8-7.2-16-16-16h-20.2c-10.8 0-26.7-5.3-35.4-11.8l-22.2-16.7c-11.5-8.6-18.2-22.1-18.2-36.4v-23.9c0-16 8.4-30.8 22.1-39l42.9-25.7c7.1-4.2 15.2-6.5 23.4-6.5h31.2c10.9 0 21.4 3.9 29.6 10.9l43.2 37.1h18.3c8.5 0 16.6 3.4 22.6 9.4l17.3 17.3c3.4 3.4 8.1 5.3 12.9 5.3H423c-32.4 58.9-93.8 99.5-164.9 103.1z"></path></svg><!-- <i class="fas fa-globe-europe"></i> Font Awesome fontawesome.com --></a></li>
			        </ul><!--//social-list-->
			    </div><!--//author-links-->
			    
		    </div><!--//author-bio-->
		    
	    </div><!--//container-->
    </section><!--//author-section-->
    
    
    @include('footer')