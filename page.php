<?php
/**
 * The template for displaying pages
 *
 * @package Vtrois
 * @version 2.4
 */
$page_side_bar = kratos_option('page_side_bar');
$page_side_bar = (empty($page_side_bar)) ? 'right_side' : $page_side_bar;
get_header();
get_header('banner'); ?>
<div id="kratos-blog-post" style="background:<?php echo kratos_option('background_index_color'); ?>">
	<div class="container">
		<div class="row">
			<?php if( $page_side_bar == 'left_side' ){ ?>
				<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
	                <div id="sidebar">
	                    <?php dynamic_sidebar('sidebar_tool'); ?>
	                </div>
	            </aside>
			<?php } ?>
            <section id="main" class='<?php echo ($page_side_bar == 'single') ? 'col-md-12' : 'col-md-9'; ?>'>
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<div class="kratos-hentry kratos-post-inner clearfix">
						<header class="kratos-entry-header">
							<h1 class="kratos-entry-title text-center"><?php the_title(); ?></h1>
						</header>
						<div class="kratos-post-content"><?php the_content(); ?></div>
						<?php if( kratos_option('page_like_donate') || kratos_option('page_share') ) {?>
						<footer class="kratos-entry-footer clearfix">
								<div class="post-like-donate text-center clearfix" id="post-like-donate">
								<?php if ( kratos_option( 'page_like_donate' ) ) : ?>
					   			<a href="<?php echo kratos_option('donate_links'); ?>" class="Donate"><i class="fa fa-bitcoin"></i> 打赏</a>
					   			<?php endif; ?>
								<?php if ( kratos_option( 'page_share' ) ) : ?>
								<a href="javascript:;"  class="Share" ><i class="fa fa-share-alt"></i> 分享</a>
									<?php require_once( get_template_directory() . '/inc/share.php'); ?>
								<?php endif; ?>
					    		</div>
						</footer>
						<?php }?>
					</div>
						<?php if ( kratos_option( 'page_cc' ) ) : ?>
						<div class="kratos-hentry kratos-copyright text-center clearfix">
							<blockquote>本文采用 「<a href="http://creativecommons.org/licenses/by-sa/4.0/" target="_blank">CC BY-NC-SA 4.0</a>」创作共享协议，转载请标注以下信息：<br>
				               原文出处：周志鹏博客 <a title="WordPress文章目录插件" href="//www.ludou.org/wordpress-content-index-plugin.html">https://www.ludou.org/wordpress-content-index-plugin.html</a>
				              </blockquote>
						</div>
						<?php endif; ?>
						<?php comments_template(); ?>
				</article>
			<?php endwhile;?>
			</section>
			<?php if($page_side_bar == 'right_side'){ ?>
			<aside id="kratos-widget-area" class="col-md-3 hidden-xs hidden-sm scrollspy">
                <div id="sidebar">
                    <?php dynamic_sidebar('sidebar_tool'); ?>
                </div>
            </aside>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>