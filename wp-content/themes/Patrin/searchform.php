<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="assistive-text">جستجو</label>
	<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="جستجو کنید..." />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="جستجو" />
</form>
