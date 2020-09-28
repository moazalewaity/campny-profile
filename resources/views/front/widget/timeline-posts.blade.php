<aside id="timeline-posts-widget-3" class="widget timeline-posts">            
	<div class="widget-title-wrap">
		<div class="bk-header"><div class="widget-title"><h3>{title}</h3></div></div>            
    </div>
	<ul>
		<!-- START BLOCK : post_row -->
        <li>
			<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
				<a itemprop="url" href="{url_title}">
					<div class="meta"><div class="post-date"><i class="fa fa-clock-o"></i>{dateformat}</div></div>                     
					<h3 itemprop="name">{title}</h3>
				</a>
				<meta itemprop="author" content="1">
                <span style="display: none;" itemprop="author" itemscope itemtype="https://schema.org/Person">
                	<meta itemprop="name" content="{author_name}">
                </span>
                <meta itemprop="headline " content="{title}">
                <meta itemprop="datePublished" content="{datePublished}">
                <meta itemprop="dateModified" content="{dateModified}">
                <meta itemscope itemprop="mainEntityOfPage" content="" itemType="https://schema.org/WebPage" itemid="{url_title}"/>
                <span style="display: none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                	<span style="display: none;" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    	<meta itemprop="url" content="{site_logo}">
                    </span>
                    <meta itemprop="name" content="{site_title}">
                </span>
                <span style="display: none;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                	<meta itemprop="url" content="{post_image_path}max-width/{image}">
                    <meta itemprop="width" content="1024"><meta itemprop="height" content="1024">
                </span>
                <meta itemprop="interactionCount" content="UserComments:{comments}"/>	
            </div>
       </li>
       <!-- END BLOCK : post_row -->
	</ul>
    <div class="readmore"><a href="{dep_url_title}">{TransLang-more}</a></div>
</aside>