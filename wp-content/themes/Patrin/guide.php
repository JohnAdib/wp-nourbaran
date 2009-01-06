<?php
function theme_guide(){
add_theme_page( 'Theme guide','توضیحات پوسته','edit_themes', 'theme-documentation', 'w2f_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function w2f_theme_guide(){
		echo '
		
<div id="welcome-panel" class="about-wrap">

	<div class="wpbadge" style="float:left; margin-right:30px; "><img src="'. get_template_directory_uri() . '/screenshot.png" width="250" height="200" /></div>

	<div class="welcome-panel-content">
	
	<h1>به پوسته ی  پاترین خوش آمدید</h1>
	
	<p class="about-text"> پوسته ی پاترین بر روی وردپرس 3 به بالا به درستی کار میکند. از ویژگی های این پوسته پس زمینه سفارشی، منوی سفارشی، عکس شاخص، نوار کناری پویا می باشد. هم چنین در این پوسته می توانید رنگ های محیط را سفارشی نمایید.</p>
		
		<div class="changelog ">
		
		<h3>حقوق استفاده</h3>
			<p>این پوسته توسط جواد عوض زاده عضو گروه سرنا با استفاده از تکنولوژی پی اچ پی پنج و سی اس اس سه توسعه داده شده است. لطفا موارد زیر را رعایت فرمایید:</p>
			<ul>
				<li>نام طراح از حقوق محفوظ بوده و لطفا آن را از پوسته پاک نکنید.</li>
				<li>تمام حقوق این طرح برای گروه سرنا محفوظ می باشد.</li>
				<li>شما اجازه ویرایش این طرح را برای تنها برای مصارف شخصی دارید.</li>
				<li>شما بدون کسب اجازه از طراح اجازه فروش این طرح را ندارید</li>
			</ul>
		</div>

	<p class="welcome-panel-dismiss">پوسته وردپرس توسعه داده شده توسط <a href="http://www.evazzadeh.com">جواد عوض زاده</a> عضو <a href="http://www.serena.ir">گروه سرنا</a>.</p>

	</div>
	</div>
		
		';
}